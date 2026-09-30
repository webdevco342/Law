import fs from 'node:fs/promises';
const target='wordpress/qav-advocate';
const detailOnly=process.argv.includes('--detail-pages-only');
const detailSlugs=['practice','experience','advocacy','contact'];
const phpString=s=>`'${s.replaceAll('\\','\\\\').replaceAll("'","\\'")}'`;
const html=await fs.readFile('index.html','utf8');
const asset=s=>s.replace(/(src|href)="(assets\/[^" ]+)"/g,`$1="<?php echo esc_url(qav_asset('$2')); ?>"`);
const pageLinks=s=>s.replace(/href="(index|practice|experience|advocacy|contact|insights-media|insights|media|privacy)\.html([^" ]*)"/g,(_,slug,suffix)=>{
 const parsed=new URL(`${slug}.html${suffix.replaceAll('&amp;','&')}`,'https://preview.invalid/');
 let expression=slug==='index'?"home_url('/')":['insights-media','insights','media'].includes(slug)?'qav_hub_url()':`qav_page_url('${slug}')`;
 if(parsed.searchParams.has('matter'))expression=`add_query_arg('matter',${phpString(parsed.searchParams.get('matter'))},${expression})`;
 if(parsed.hash)expression+=`.${phpString(parsed.hash)}`;
 return `href="<?php echo esc_url(${expression}); ?>"`;
});
const links=s=>pageLinks(s.replace(/href="#(?!icon-|main|disclaimer)([\w-]+)"/g,`href="<?php echo esc_url(qav_home_anchor('$1')); ?>"`));
const contact=s=>s.replaceAll('mailto:wicky.mechanier1446@gmail.com',"mailto:<?php echo esc_attr(qav_profile('email')); ?>").replaceAll('wicky.mechanier1446@gmail.com',"<?php echo esc_attr(qav_profile('email')); ?>").replaceAll('tel:+923137277355',"<?php echo esc_url(qav_tel('phone')); ?>").replaceAll('tel:+923035980803',"<?php echo esc_url(qav_tel('phone_secondary')); ?>").replaceAll('+92 313 7277355',"<?php echo esc_html(qav_profile('phone')); ?>").replaceAll('+92 303 5980803',"<?php echo esc_html(qav_profile('phone_secondary')); ?>").replace(/4B One Lahore, Qurban Police Lines,[\s\S]{0,35}?Jail Road, Lahore/g,"<?php echo nl2br(esc_html(qav_profile('address'))); ?>");
if(!detailOnly){
let header=html.slice(html.indexOf('<a class="skip-link"'),html.indexOf('<main id="main"'));
header=links(header);
header=header.replace(/(<nav class="desktop-nav"[^>]*>)[\s\S]*?<\/nav>/,'$1<?php qav_global_nav(); ?></nav>').replace(/(<nav aria-label="Mobile navigation">)[\s\S]*?<\/nav>/,'$1<?php qav_global_nav(); ?></nav>');
await fs.writeFile(`${target}/header.php`,`<?php if (!defined('ABSPATH')) exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#061a2f"><link rel="icon" type="image/svg+xml" href="<?php echo esc_url(qav_asset('assets/svg/favicon.svg')); ?>"><link rel="preload" href="<?php echo esc_url(qav_asset('assets/fonts/cormorant-garamond-medium.woff2')); ?>" as="font" type="font/woff2" crossorigin><link rel="preload" href="<?php echo esc_url(qav_asset('assets/fonts/manrope-variable.woff2')); ?>" as="font" type="font/woff2" crossorigin><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>${header}`);
let main=html.slice(html.indexOf('<main id="main"'),html.indexOf('<footer class="site-footer'));
main=main.replace(/<picture class="client-portrait">[\s\S]*?<\/picture>/,'<?php qav_portrait(true); ?>');
for(const [kind,type] of [['INSIGHTS','post'],['MEDIA','qav_media']])main=main.replace(new RegExp(`<!-- QAV_${kind}_START -->[\\s\\S]*?<!-- QAV_${kind}_END -->`),`<?php qav_home_publications('${type}'); ?>`);
main=contact(links(asset(main)));
const advisory=main.indexOf('class="section advisory-section"');
const practiceEnd=main.lastIndexOf('</div>',main.lastIndexOf('</section>',advisory));
main=main.slice(0,practiceEnd)+"<?php qav_practice_insights(); ?>"+main.slice(practiceEnd);
await fs.writeFile(`${target}/front-page.php`,`<?php get_header(); ?>${main}<?php get_footer(); ?>`);
let footer=html.slice(html.indexOf('<footer class="site-footer'),html.indexOf('</body>'));
footer=contact(links(footer));
await fs.writeFile(`${target}/footer.php`,`${footer}<?php wp_footer(); ?></body></html>`);
let privacy=await fs.readFile('privacy.html','utf8');privacy=privacy.slice(privacy.indexOf('<main'),privacy.indexOf('</main>')+7);
await fs.writeFile(`${target}/page-privacy.php`,`<?php get_header(); ?>${contact(pageLinks(privacy))}<?php get_footer(); ?>`);
const base=await fs.readFile('style.css','utf8');
await fs.writeFile(`${target}/style.css`,`/*\nTheme Name: Qurat-ul-Ain Viirk — Advocate\nAuthor: QAV Website\nDescription: An editorial legal practice theme with Insights and Media publishing.\nVersion: 1.0.0\nRequires at least: 6.6\nRequires PHP: 8.1\nLicense: GPL-2.0-or-later\nText Domain: qav-advocate\n*/\n${base}`);
for(const name of ['upgrade.css','script.js'])await fs.copyFile(name,`${target}/${name}`);
await fs.cp('assets',`${target}/assets`,{recursive:true,filter:src=>!src.endsWith('master.jpeg')});
console.log('WordPress theme templates and assets generated.');
}

// This targeted mode preserves the approved homepage/hub compositions and native
// publication queries. It can be rerun after edits to a dedicated static page.
const metadata={};
for(const slug of detailSlugs){
 const source=await fs.readFile(`${slug}.html`,'utf8');
 let main=source.match(/<main\b[\s\S]*?<\/main>/)?.[0];
 if(!main || main.includes('<!-- PAGE CONTENT -->'))throw new Error(`Incomplete ${slug}.html`);
 main=contact(pageLinks(asset(main)));
 const label=slug[0].toUpperCase()+slug.slice(1);
 await fs.writeFile(`${target}/page-${slug}.php`,`<?php\n/* Template Name: ${label} */\nif (!defined('ABSPATH')) exit;\nget_header(); ?>\n${main}\n<?php get_footer(); ?>\n`);
 await fs.copyFile(`${slug}.css`,`${target}/${slug}.css`);
 const decode=s=>s.replaceAll('&amp;','&').replaceAll('&#39;',"'").replaceAll('&quot;','"');
 metadata[slug]={label,title:decode(source.match(/<title>([\s\S]*?)<\/title>/)[1].trim()),description:decode(source.match(/<meta name="description" content="([^"]+)"/)[1])};
}
await fs.copyFile('detail-pages.css',`${target}/detail-pages.css`);
await fs.writeFile(`${target}/detail-page-data.php`,`<?php\nif (!defined('ABSPATH')) exit;\nreturn [\n${Object.entries(metadata).map(([slug,m])=>`    '${slug}' => ['label'=>${phpString(m.label)},'title'=>${phpString(m.title)},'description'=>${phpString(m.description)}],`).join('\n')}\n];\n`);
const nativeLinks=s=>pageLinks(s).replace(/qav_home_anchor\('(practice|experience|advocacy|contact)'\)/g,"qav_page_url('$1')");
const nativeMatterLinks=s=>s.replace(/href="<\?php echo esc_url\(qav_page_url\('contact'\)\); \?>"(\s+data-matter="([^"]+)")/g,(_,attributes,matter)=>`href="<?php echo esc_url(add_query_arg('matter',${phpString(matter.replaceAll('&amp;','&'))},qav_page_url('contact'))); ?>"${attributes}`);
let nativeHeader=nativeLinks(await fs.readFile(`${target}/header.php`,'utf8'));
nativeHeader=nativeHeader.replace(/(<nav class="desktop-nav"[^>]*>)[\s\S]*?<\/nav>/,'$1<?php qav_global_nav(); ?></nav>').replace(/(<nav aria-label="Mobile navigation">)[\s\S]*?<\/nav>/,'$1<?php qav_global_nav(); ?></nav>');
await fs.writeFile(`${target}/header.php`,nativeHeader);
let nativeFooter=nativeLinks(await fs.readFile(`${target}/footer.php`,'utf8')).replaceAll('qav_insights_url()','qav_hub_url()').replaceAll('qav_media_url()','qav_hub_url()');
nativeFooter=nativeFooter.replace(/(<nav aria-label="Footer navigation">)[\s\S]*?<\/nav>/,'$1<?php qav_global_nav(); ?></nav>');
nativeFooter=nativeMatterLinks(nativeFooter);
await fs.writeFile(`${target}/footer.php`,nativeFooter);
let nativeHome=nativeMatterLinks(nativeLinks(await fs.readFile(`${target}/front-page.php`,'utf8')));
nativeHome=nativeHome.replace(/(<p class="practice-note">[\s\S]*?<a\s+)href="[\s\S]*?"([\s\S]*?>)Start a conversation/,'$1href="<?php echo esc_url(qav_page_url(\'practice\')); ?>"$2Explore Practice');
for(const match of html.matchAll(/<a class="text-link[^\"]*home-destination-link"[^>]*>[\s\S]*?<\/a>/g)){
 const cta=pageLinks(match[0]);
 if(nativeHome.includes(cta))continue;
 const slug=match[0].match(/href="(experience|advocacy|contact)\.html"/)?.[1];
 const sectionPattern=new RegExp(`<section\\b(?=[^>]*\\bid="${slug}")[^>]*>[\\s\\S]*?<\\/section>`);
 const section=nativeHome.match(sectionPattern)?.[0];
 if(!section)throw new Error(`Homepage ${slug} section missing`);
 const updated=slug==='experience'
  ? section.replace(/(<div class="journey-mark">[\s\S]*?<\/div>)/,`$1\n              ${cta}`)
  : slug==='advocacy'
    ? section.replace(/(<\/div>\s*<\/div>\s*<\/div>\s*<\/section>)$/,`${cta}\n            $1`)
    : section.replace('<address class="contact-details">',`${cta}\n              <address class="contact-details">`);
 if(updated===section)throw new Error(`Homepage ${slug} CTA insertion failed`);
 nativeHome=nativeHome.replace(sectionPattern,()=>updated);
}
await fs.writeFile(`${target}/front-page.php`,nativeHome);
for(const template of ['page-insights-media.php','page-privacy.php','single.php']){
 const source=await fs.readFile(`${target}/${template}`,'utf8');
 await fs.writeFile(`${target}/${template}`,nativeLinks(source));
}
await fs.copyFile('script.js',`${target}/script.js`);
console.log('Dedicated WordPress pages, native navigation and homepage links synchronized.');
