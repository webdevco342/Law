// Optional local preview. The website also opens directly from index.html.
import http from "node:http";
import { createReadStream } from "node:fs";
import { readFile, stat } from "node:fs/promises";
import path from "node:path";
import { fileURLToPath } from "node:url";

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const port = Number(process.env.PORT || 4173);
const mime = {
  ".html": "text/html; charset=utf-8",
  ".css": "text/css; charset=utf-8",
  ".js": "text/javascript; charset=utf-8",
  ".svg": "image/svg+xml",
  ".ico": "image/x-icon",
  ".ttf": "font/ttf",
  ".woff2": "font/woff2",
  ".png": "image/png",
  ".webp": "image/webp",
  ".avif": "image/avif",
  ".jpg": "image/jpeg",
  ".jpeg": "image/jpeg",
  ".mp4": "video/mp4",
};
http
  .createServer(async (request, response) => {
    try {
      const urlPath = decodeURIComponent(
        new URL(request.url, "http://localhost").pathname,
      );
      const file = path.resolve(
        root,
        `.${urlPath === "/" ? "/index.html" : urlPath}`,
      );
      if (!file.startsWith(root + path.sep) || !(await stat(file)).isFile())
        throw new Error("Not found");
      const ext = path.extname(file);
      if (!mime[ext] || urlPath.startsWith("/tmp/") || urlPath.startsWith("/."))
        throw new Error("Not found");
      // Local video playback and seeking use byte ranges without buffering the file.
      if (ext === ".mp4") {
        const { size } = await stat(file);
        const headers = { "Content-Type": mime[ext], "Accept-Ranges": "bytes", "X-Content-Type-Options": "nosniff" };
        const range = request.headers.range;
        let start = 0, end = size - 1;
        if (range) {
          const match = /^bytes=(\d*)-(\d*)$/.exec(range);
          if (!match || (!match[1] && !match[2])) {
            response.writeHead(416, { ...headers, "Content-Range": `bytes */${size}` });
            return response.end();
          }
          start = match[1] ? Number(match[1]) : Math.max(0, size - Number(match[2]));
          end = match[1] && match[2] ? Math.min(Number(match[2]), size - 1) : size - 1;
          if (!Number.isSafeInteger(start) || !Number.isSafeInteger(end) || start > end || start >= size) {
            response.writeHead(416, { ...headers, "Content-Range": `bytes */${size}` });
            return response.end();
          }
          headers["Content-Range"] = `bytes ${start}-${end}/${size}`;
        }
        response.writeHead(range ? 206 : 200, { ...headers, "Content-Length": end - start + 1 });
        if (request.method === "HEAD") return response.end();
        const stream = createReadStream(file, { start, end });
        stream.on("error", () => response.destroy());
        response.on("close", () => stream.destroy());
        return stream.pipe(response);
      }
      response.writeHead(200, {
        "Content-Type": mime[ext],
        "X-Content-Type-Options": "nosniff",
        "Cache-Control": "no-cache",
      });
      response.end(await readFile(file));
    } catch {
      response.writeHead(404, { "Content-Type": "text/plain" });
      response.end("Not found");
    }
  })
  .listen(port, "127.0.0.1", () =>
    console.log(`Website preview: http://127.0.0.1:${port}`),
  );
