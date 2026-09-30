import fs from 'node:fs/promises';
const full = s => s.replace(/Qurat-ul-Ain(?! Viirk)/g, 'Qurat-ul-Ain Viirk').replace(/QURAT-UL-AIN(?! VIIRK)/g, 'QURAT-UL-AIN VIIRK');
let html = full(await fs.readFile('tmp/approved-backup/index.html', 'utf8'));
html = html.replace('<link rel="stylesheet" href="style.css" />','<link rel="stylesheet" href="style.css" />\n<link rel="stylesheet" href="upgrade.css" />');
const start=html.indexOf('              <!-- Original architectural artwork');
const end=html.indexOf('              <div class="profile-caption">',start);
html=html.slice(0,start)+`              <!-- Supplied client portrait; original facial detail preserved. -->
              <picture class="client-portrait">
                <source type="image/avif" srcset="assets/images/portrait-480.avif 480w, assets/images/portrait-800.avif 800w, assets/images/portrait-1186.avif 1186w" sizes="(max-width: 700px) 90vw, (max-width: 1100px) 40vw, 440px">
                <source type="image/webp" srcset="assets/images/portrait-480.webp 480w, assets/images/portrait-800.webp 800w, assets/images/portrait-1186.webp 1186w" sizes="(max-width: 700px) 90vw, (max-width: 1100px) 40vw, 440px">
                <img src="assets/images/portrait-800.jpg" srcset="assets/images/portrait-480.jpg 480w, assets/images/portrait-800.jpg 800w, assets/images/portrait-1186.jpg 1186w" sizes="(max-width: 700px) 90vw, (max-width: 1100px) 40vw, 440px" width="1186" height="1582" alt="Qurat-ul-Ain Viirk, Advocate High Court" fetchpriority="high" decoding="async">
              </picture>
`+html.slice(end);
const desktop=/<nav class="desktop-nav"[\s\S]*?<\/nav>/;
const globalNavigation=`<a href="#about">Profile</a><a href="practice.html">Practice</a><a href="experience.html">Experience</a><a href="advocacy.html">Advocacy</a><a href="insights-media.html">Insights &amp; Media</a><a href="contact.html">Contact</a>`;
html=html.replace(desktop,`<nav class="desktop-nav" aria-label="Main navigation">${globalNavigation}</nav>`);
html=html.replace(/<nav aria-label="Mobile navigation">[\s\S]*?<\/nav>/, `<nav aria-label="Mobile navigation">${globalNavigation}</nav>`);
html=html.replace('Legal Drafting &amp; Due Diligence','Legal Drafting, Research &amp; Due Diligence');
const profileCopy=html.indexOf('<div class="profile-copy"');
const profileEnd=html.lastIndexOf('</div>',profileCopy);
html=html.slice(0,profileEnd)+`<dl class="profile-facts"><div><dt>HIGH COURT ENROLMENT</dt><dd>24 August 2009</dd></div><div><dt>BASED IN</dt><dd>Lahore, Pakistan</dd></div><div><dt>ADVOCACY FOCUS</dt><dd>Human rights &amp; women’s rights</dd></div></dl>`+html.slice(profileEnd);
// Insert after advocacy, before the existing capabilities section.
const capability=html.lastIndexOf('      <section',html.indexOf('class="section capabilities'));
if(capability<0) throw new Error('Capabilities section not found');
const empty=(kind,title,copy)=>`<div class="publication-empty"><span class="empty-index" aria-hidden="true">${kind==='insights'?'Aa':'▷'}</span><div><p class="eyebrow">${kind==='insights'?'THE LEGAL JOURNAL':'CONVERSATIONS & PERSPECTIVES'}</p><h3>${title}</h3><p>${copy}</p></div></div>`;
const section=(kind,num,title,intro,emptytitle,emptycopy)=>`<section class="section publication-section ${kind==='media'?'media-section':''}" id="${kind}" aria-labelledby="${kind}-title"><div class="container"><div class="section-label"><span>${num} / ${kind==='media'?'MEDIA & INTERVIEWS':'INSIGHTS & PERSPECTIVES'}</span><span>FROM THE PRACTICE</span></div><div class="publication-heading"><div><p class="eyebrow">${kind==='media'?'IN CONVERSATION':'THE LEGAL JOURNAL'}</p><h2 id="${kind}-title">${title}</h2><p>${intro}</p></div><a class="text-link" href="${kind}.html">${kind==='media'?'Explore Media':'View All Insights'} <span aria-hidden="true">↗</span></a></div><!-- QAV_${kind.toUpperCase()}_START -->${empty(kind,emptytitle,emptycopy)}<!-- QAV_${kind.toUpperCase()}_END --></div></section>`;
html=html.slice(0,capability)+section('insights','06','Law, considered.<br><em>Perspectives, shared.</em>','A space for legal analysis, professional reflections and informed discussion.','Insights are forthcoming.','New articles will appear here when published.')+section('media','07','Beyond the written word.','Interviews, conversations and legal commentary, brought together in one place.','Conversations, to come.','Published interviews and media appearances will be available here.')+html.slice(capability);
html=html.replace('06 / LEGAL CAPABILITIES','08 / LEGAL CAPABILITIES').replace('07 / LEGAL EDUCATION','09 / LEGAL EDUCATION').replace('08 / PROFESSIONAL FOUNDATIONS','10 / PROFESSIONAL FOUNDATIONS').replace('09 / BEGIN A CONVERSATION','11 / BEGIN A CONVERSATION');
html=html.replace('id="enquiry-form"','id="enquiry-form" data-contact-email="wicky.mechanier1446@gmail.com"');
html=html.replace('<a href="privacy.html">Privacy Notice</a','<a href="insights.html">Insights</a><a href="media.html">Media</a><a href="privacy.html">Privacy Notice</a');
await fs.writeFile('index.html',html);
let privacy=full(await fs.readFile('tmp/approved-backup/privacy.html','utf8'));
privacy=privacy.replace('<link rel="stylesheet" href="style.css" />','<link rel="stylesheet" href="style.css" /><link rel="stylesheet" href="upgrade.css" />').replace('This website does not set cookies or use analytics, advertising\n          scripts, embedded maps or social-media trackers. Fonts and artwork are\n          served with the website.','Public pages do not include analytics or advertising scripts. WordPress uses essential cookies for authenticated administration. Video providers load only after you choose to play an embedded video; their privacy practices then apply. Fonts and imagery are served with the website.');
await fs.writeFile('privacy.html',privacy);
let js=full(await fs.readFile('tmp/approved-backup/script.js','utf8'));
js=js.replace('const CONTACT_EMAIL = "wicky.mechanier1446@gmail.com";', 'const CONTACT_EMAIL = document.querySelector("#enquiry-form")?.dataset.contactEmail || "wicky.mechanier1446@gmail.com";');
js=js.replace('.map((link) => document.querySelector(link.getAttribute("href")))','.filter((link) => link.getAttribute("href").startsWith("#"))\n    .map((link) => document.getElementById(link.hash.slice(1)))');
js=js.replace('else link.removeAttribute("aria-current");','else if (link.hash) link.removeAttribute("aria-current");').replace('(min-width: 1101px)','(min-width: 1281px)');
await fs.writeFile('script.js',js);
for(const kind of ['insights','media']){
 const header=html.slice(0,html.indexOf('<main id="main"')).replace(/href="#(?!icon-)([\w-]+)"/g,'href="index.html#$1"');
 const footer=html.slice(html.indexOf('<footer class="site-footer')).replace(/href="#(?!icon-)([\w-]+)"/g,'href="index.html#$1"');
 await fs.writeFile(`${kind}.html`,header.replace(/<title>[\s\S]*?<\/title>/,`<title>${kind==='insights'?'Insights':'Media & Interviews'} | Qurat-ul-Ain Viirk</title>`)+`<main id="main" class="archive-main"><div class="container"><p class="eyebrow">QURAT-UL-AIN VIIRK / ${kind.toUpperCase()}</p><h1>${kind==='insights'?'Insights & perspectives.':'Media & interviews.'}</h1><p class="archive-intro">${kind==='insights'?'Legal analysis and reflections from the practice.':'Conversations and commentary on law and society.'}</p>${empty(kind,kind==='insights'?'Insights are forthcoming.':'Conversations, to come.','New publications will appear here when published.')}<a class="text-link" href="index.html#contact">Contact the office ↗</a></div></main>`+footer);
}
console.log('Approved static design upgraded; WordPress templates can now be generated.');
