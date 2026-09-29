// Deterministic resizing and format conversion only. No retouching or facial edits.
import { createRequire } from 'node:module';
const require = createRequire(new URL('../tmp/qa/package.json', import.meta.url));
const sharp = require('sharp');
import fs from 'node:fs/promises';
import path from 'node:path';
const source = process.argv[2];
if (!source) throw new Error('Supply the approved master JPEG path.');
const directory = path.resolve('assets/images');
await fs.mkdir(directory, { recursive: true });
await fs.copyFile(source, path.join(directory, 'qurat-ul-ain-viirik-master.jpeg'));
const metadata = await sharp(source).metadata();
// Remove only the supplied image's thin black top border. Keep all facial detail.
const region = { left: 0, top: 18, width: metadata.width, height: metadata.height - 18 };
for (const width of [480, 800, 1186]) {
  const base = sharp(source).rotate().extract(region).resize({ width, withoutEnlargement: true });
  await base.clone().avif({ quality: 72, effort: 5 }).toFile(`${directory}/portrait-${width}.avif`);
  await base.clone().webp({ quality: 88, effort: 5 }).toFile(`${directory}/portrait-${width}.webp`);
  await base.clone().jpeg({ quality: 91, mozjpeg: true }).toFile(`${directory}/portrait-${width}.jpg`);
}
console.log({ source: { width: metadata.width, height: metadata.height, bytes: (await fs.stat(source)).size }, derivatives: region });
