// Regenerate only the selected-photo section from its replaceable content manifest.
// Native Node only; existing page content and navigation are preserved byte for byte.
import fs from 'node:fs/promises';
import path from 'node:path';
import {fileURLToPath} from 'node:url';
const root=path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const escape=value=>String(value??'').replace(/[&<>"']/g, c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const photos=JSON.parse(await fs.readFile(path.join(root,'assets/selected-media.json'),'utf8'))
  .sort((a,b)=>Number(!!b.featured)-Number(!!a.featured)||a.order-b.order);
const srcset=sources=>sources.map(source=>`${source.url} ${source.width}w`).join(', ');
function figure(photo,index){
  const sizes=index===0?'(max-width: 600px) calc(100vw - 48px), (max-width: 900px) 70vw, 48vw':'(max-width: 600px) calc(100vw - 60px), (max-width: 900px) 45vw, 23vw';
  return `    <figure class="selected-media-photo${index===0?' selected-media-featured':''}">
      <a href="${escape(photo.link||photo.url)}"${photo.link?'':' data-photo-viewer'} aria-label="${photo.link?'Explore photograph':'View full photograph'}: ${escape(photo.alt)}">
        <span class="selected-media-image"><picture>
          ${photo.sources?.webp?.length?`<source type="image/webp" srcset="${escape(srcset(photo.sources.webp))}" sizes="${sizes}">`:''}
          <img src="${escape(photo.url)}"${photo.sources?.jpeg?.length?` srcset="${escape(srcset(photo.sources.jpeg))}" sizes="${sizes}"`:''} alt="${escape(photo.alt)}" width="${Number(photo.width)}" height="${Number(photo.height)}" loading="lazy" decoding="async">
        </picture></span>
        <span class="selected-media-meta" aria-hidden="true"><span>${String(index+1).padStart(2,'0')}</span><span>${photo.link?'Explore photograph':'View photograph'} <svg viewBox="0 0 20 20"><path d="M4 16 16 4M4 4h12v12"/></svg></span></span>
      </a>${photo.caption?`\n      <figcaption>${escape(photo.caption)}</figcaption>`:''}
    </figure>`;
}
const supporting=photos.slice(1),split=Math.ceil(supporting.length/2);
const rails=[supporting.slice(0,split),supporting.slice(split)].map((rail,column)=>rail.length?`        <div class="selected-media-rail">\n${rail.map((p,i)=>figure(p,1+column*split+i)).join('\n')}\n        </div>`:'').join('\n');
const section=`  <!-- selected-media:start -->
  <section class="hub-section selected-media" id="selected-media" aria-labelledby="selected-media-title">
    <div class="container">
      <div class="selected-media-heading"><div><p class="eyebrow">IN PICTURES</p><h2 id="selected-media-title">Selected Media</h2></div><span class="selected-media-count">${String(photos.length).padStart(2,'0')} PHOTOGRAPHS</span></div>
      <div class="selected-media-composition">
${figure(photos[0],0)}
${rails}
      </div>
    </div>
  </section>
  <!-- selected-media:end -->`;
const file=path.join(root,'insights-media.html');let html=await fs.readFile(file,'utf8');
if(html.includes('<!-- selected-media:start -->'))html=html.replace(/  <!-- selected-media:start -->[\s\S]*?  <!-- selected-media:end -->/,section);
else html=html.replace('  <section class="hub-section hub-video-section',section+'\n\n  <section class="hub-section hub-video-section');
await fs.writeFile(file,html);
await fs.copyFile(path.join(root,'assets/selected-media.json'),path.join(root,'wordpress/qav-advocate/assets/selected-media.json'));
console.log(`Rendered ${photos.length} supplied photographs in Insights & Media.`);
