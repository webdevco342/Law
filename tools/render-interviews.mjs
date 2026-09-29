// Rebuild only the supplied interview archive. Videos are copied, never encoded.
import fs from 'node:fs/promises';
import path from 'node:path';
import {fileURLToPath} from 'node:url';
const root=path.resolve(path.dirname(fileURLToPath(import.meta.url)),'..');
const escape=value=>String(value??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const external=url=>{try {const u=new URL(url);return u.protocol==='https:'&&['youtube.com','www.youtube.com','m.youtube.com','youtu.be'].includes(u.hostname);}catch{return false;}};
export function renderInterviews(data) {
  const items=data.filter(item=>item&&typeof item==='object'&&(item.videoSource||external(item.externalUrl))).sort((a,b)=>Number(!!b.featured)-Number(!!a.featured)||(a.order??0)-(b.order??0));
  return `      <!-- interviews:start -->
      <div class="interview-archive">
${items.map((item,index)=>{
    const lead=index===0,local=!!item.videoSource,url=item.videoSource||item.externalUrl,title=item.title||(lead?'Featured Interview':`Interview ${String(index+1).padStart(2,'0')}`);
    const width=Math.max(1,Math.floor(Number(item.width)||1280)),height=Math.max(1,Math.floor(Number(item.height)||720)),duration=Math.floor(item.durationSeconds||0);
    const facts=[item.category?`<span>${escape(item.category)}</span>`:'',item.date?`<time datetime="${escape(item.date)}">${escape(item.date)}</time>`:'',duration?`<span class="interview-duration" aria-label="Duration: ${Math.floor(duration/60)} minutes, ${duration%60} seconds">${String(Math.floor(duration/60)).padStart(2,'0')}:${String(duration%60).padStart(2,'0')}</span>`:''].filter(Boolean).join('\n            ');
    return `        <article class="interview${lead?' interview--featured':''}">
          <div class="interview-frame" style="--interview-ratio: ${width} / ${height}">
            ${local?`<video controls playsinline preload="none" width="${width}" height="${height}"${item.poster?` poster="${escape(item.poster)}"`:''} aria-label="${escape(title)}" tabindex="0">
              <source src="${escape(url)}" type="${escape(item.mimeType||'video/mp4')}">
              <p>Your browser cannot play this video. <a href="${escape(url)}">Open the original video</a>.</p>
            </video>`:`<a class="interview-external" href="${escape(url)}" aria-label="Watch ${escape(title)} on YouTube">${item.poster?`<img src="${escape(item.poster)}" alt="" width="${width}" height="${height}" loading="lazy">`:`Watch ${escape(title)} on YouTube`}</a>`}
          </div>
          <div class="interview-details">
            <div>${lead?'<p class="eyebrow interview-label">01 / SELECTED RECORDING</p>':''}<h3>${escape(title)}</h3>${item.description?`<p class="interview-description">${escape(item.description)}</p>`:''}</div>
            <div class="interview-facts">
              ${facts}
              <a class="interview-open" href="${escape(url)}" aria-label="${local?'Open original video':'Watch on YouTube'}: ${escape(title)}">${local?'Open video':'Watch video'} <span aria-hidden="true">↗</span></a>
            </div>
          </div>
          <p class="interview-status" role="status" aria-live="polite"></p>
        </article>`;
  }).join('\n')}
      </div>
      <!-- interviews:end -->`;
}
if(process.argv[1]&&path.resolve(process.argv[1])===fileURLToPath(import.meta.url)){
  const data=JSON.parse(await fs.readFile(path.join(root,'assets/interviews.json'),'utf8'));
  const file=path.join(root,'insights-media.html');let html=await fs.readFile(file,'utf8');
  const block=renderInterviews(data);
  const pattern=html.includes('<!-- interviews:start -->')?/      <!-- interviews:start -->[\s\S]*?      <!-- interviews:end -->/:/      <div class="hub-media-empty">[\s\S]*?\n      <\/div>/;
  if(!pattern.test(html))throw new Error('Expected interview collection or placeholder is missing');
  await fs.writeFile(file,html.replace(pattern,block));
  for(const relative of ['assets/interviews.json','interview-archive.css','interview-archive.js'])await fs.copyFile(path.join(root,relative),path.join(root,'wordpress/qav-advocate',relative));
  console.log(`Rendered ${data.length} interview entries; synchronized collection assets.`);
}
