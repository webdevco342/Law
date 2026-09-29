// Rebuild only the supplied-video feature, leaving all other page sections intact.
import fs from 'node:fs/promises';
import path from 'node:path';
import {fileURLToPath} from 'node:url';
const root=path.resolve(path.dirname(fileURLToPath(import.meta.url)),'..');
const escape=value=>String(value??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const items=JSON.parse(await fs.readFile(path.join(root,'assets/featured-videos.json'),'utf8')).sort((a,b)=>Number(!!b.featured)-Number(!!a.featured));
const output=items.map(item=>{
  const local=!!item.video_url,url=item.video_url||item.external_url,title=item.title||'Featured Video',duration=Math.floor(item.duration_seconds||0);
  const metadata=[item.category?`<span>${escape(item.category)}</span>`:'',item.publication_date?`<time datetime="${escape(item.publication_date)}">${escape(item.publication_date)}</time>`:'',duration?`<span aria-label="Duration: ${Math.floor(duration/60)} minutes, ${duration%60} seconds">${String(Math.floor(duration/60)).padStart(2,'0')}:${String(duration%60).padStart(2,'0')}</span>`:''].filter(Boolean).join('\n            ');
  return `      <article class="media-feature">
        <div class="media-feature-frame">
          ${local?`<video controls playsinline preload="none" width="${Number(item.width)}" height="${Number(item.height)}"${item.poster?` poster="${escape(item.poster)}"`:''} aria-label="${escape(title)}" tabindex="0">
            <source src="${escape(url)}" type="${escape(item.mime_type||'video/mp4')}">
            <p>Your browser cannot play this video. <a href="${escape(url)}">Open the original video</a>.</p>
          </video>`:`<a class="media-feature-external" href="${escape(url)}" aria-label="Watch ${escape(title)}">${item.poster?`<img src="${escape(item.poster)}" alt="" width="${Number(item.width)}" height="${Number(item.height)}" loading="lazy">`:`Watch ${escape(title)}`}</a>`}
        </div>
        <div class="media-feature-details">
          <div><p class="eyebrow media-feature-label">${item.featured?'FEATURED RECORDING':'RECORDING'}</p><h3>${escape(title)}</h3>${item.description?`<p class="media-feature-description">${escape(item.description)}</p>`:''}</div>
          <div class="media-feature-facts">
            ${metadata}
            <a class="media-feature-open" href="${escape(url)}">${local?'Open video':'Watch video'} <span aria-hidden="true">↗</span></a>
          </div>
        </div>
        <p class="media-feature-status" role="status" aria-live="polite"></p>
      </article>`;
}).join('\n');
const block=`      <!-- featured-videos:start -->\n      <div class="media-features">\n${output}\n      </div>\n      <!-- featured-videos:end -->`;
const file=path.join(root,'insights-media.html');let html=await fs.readFile(file,'utf8');
if(html.includes('<!-- featured-videos:start -->'))html=html.replace(/      <!-- featured-videos:start -->[\s\S]*?      <!-- featured-videos:end -->/,block);
else {
  const pattern=/      <div class="hub-video-empty">[\s\S]*?\n      <\/div>/;
  if(!pattern.test(html))throw new Error('Expected video placeholder is missing');
  html=html.replace(pattern,block);
}
await fs.writeFile(file,html);
await fs.copyFile(path.join(root,'assets/featured-videos.json'),path.join(root,'wordpress/qav-advocate/assets/featured-videos.json'));
console.log(`Rendered ${items.length} supplied video feature(s).`);
