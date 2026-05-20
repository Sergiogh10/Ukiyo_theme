const fs = require("fs");
const path = require("path");
const sharp = require("sharp");
const { PDFDocument } = require("pdf-lib");

const root = process.cwd();
const outDir = "/private/tmp/ukiyo-food-carousel";
fs.mkdirSync(outDir, { recursive: true });

const W = 1080;
const H = 1920;
const cream = "#f6efe2";
const gold = "#e2a765";
const dark = "#17130f";

const img = (rel) => path.join(root, rel);

const slides = [
  {
    kicker: "JAVA · NOCHE",
    title: "Este restaurante no tiene reseñas en Google.",
    subtitle: "Solo tiene 40 años de historia familiar.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-angkringan-2.png"),
    mode: "cover",
  },
  {
    kicker: "SOPA NEGRA DE JAVA",
    title: "RAWON",
    subtitle: "Carne lenta, keluak oscuro y caldo profundo. Sabe a casa, humo y paciencia.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-gudeg.png"),
    mode: "split",
  },
  {
    kicker: "PAPUA",
    title: "PAPEDA",
    subtitle: "Textura de sago, pescado amarillo y una forma distinta de entender la mesa.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-nasi-kucing.png"),
    mode: "framed",
  },
  {
    kicker: "POSTRE QUE SE BEBE",
    title: "ES TELER",
    subtitle: "Aguacate, coco, jackfruit y hielo. Dulce, tropical y muy de calle.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-angkringan.png"),
    mode: "stack",
  },
  {
    kicker: "CASA VS HOTEL",
    title: "RENDANG",
    subtitle: "El de hotel impresiona. El de casa se queda contigo.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-nasi-kucing.png"),
    mode: "cover",
  },
  {
    kicker: "MERCADO",
    title: "TEMPEH GORENG",
    subtitle: "Crujiente, barato, cotidiano. Indonesia en un bocado.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-angkringan-2.png"),
    mode: "split",
  },
  {
    kicker: "CAFÉ SIN FILTRO",
    title: "KOPI TUBRUK",
    subtitle: "Poso en la taza, cucharilla lenta y conversación sin prisa.",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-img-0492.jpg"),
    mode: "framed",
  },
  {
    kicker: "GUÍA RÁPIDA",
    title: "MERCADOS\nNOCTURNOS",
    subtitle: "Java: Malioboro\nBali: Gianyar\nSumatra: Padang\nSulawesi: Makassar\nLombok: Ampenan",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-malioboro.png"),
    mode: "list",
  },
  {
    kicker: "UKIYO",
    title: "Comer donde comen ellos es la primera forma de viajar de verdad.",
    subtitle: "viajesukiyo.com",
    image: img("images/indonesia/java/best-yogyakarta/viajes-a-indonesia-java-best-yogyakarta-img-0477.jpg"),
    mode: "closing",
  },
];

function escapeXml(text) {
  return String(text)
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;");
}

function wrap(text, maxChars) {
  const words = String(text).split(/\s+/);
  const lines = [];
  let line = "";
  for (const word of words) {
    const next = line ? `${line} ${word}` : word;
    if (next.length > maxChars && line) {
      lines.push(line);
      line = word;
    } else {
      line = next;
    }
  }
  if (line) lines.push(line);
  return lines;
}

function textBlock({ x, y, width, kicker, title, subtitle, titleSize, subSize, align = "left", list = false }) {
  const anchor = align === "center" ? "middle" : "start";
  const tx = align === "center" ? x + width / 2 : x;
  const titleChars = Math.max(8, Math.floor(width / (titleSize * 0.52)));
  const subChars = Math.max(12, Math.floor(width / (subSize * 0.52)));
  const titleLines = String(title).includes("\n") ? String(title).split("\n") : wrap(title, titleChars);
  const subLines = list ? String(subtitle).split("\n") : wrap(subtitle, subChars);
  let cursor = y;
  const items = [];
  items.push(`<text x="${tx}" y="${cursor}" text-anchor="${anchor}" font-size="34" fill="${gold}" font-weight="700">${escapeXml(kicker)}</text>`);
  cursor += titleSize * 0.95;
  titleLines.forEach((line, i) => {
    items.push(`<text x="${tx}" y="${cursor + i * titleSize * 0.95}" text-anchor="${anchor}" font-size="${titleSize}" fill="${cream}" font-weight="700">${escapeXml(line)}</text>`);
  });
  cursor += titleLines.length * titleSize * 0.95 + subSize * 0.95;
  subLines.forEach((line, i) => {
    items.push(`<text x="${tx}" y="${cursor + i * subSize * (list ? 1.38 : 1.22)}" text-anchor="${anchor}" font-size="${subSize}" fill="#f4ddbc" font-weight="300">${escapeXml(line)}</text>`);
  });
  return items.join("");
}

function overlaySvg(slide, index) {
  const count = String(index + 1).padStart(2, "0");
  let content;
  let extra = "";
  if (slide.mode === "split") {
    content = textBlock({
      x: 430, y: 720, width: 570, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: slide.title.length > 14 ? 86 : 132, subSize: 42,
    });
    extra = `<rect x="632" y="0" width="448" height="1920" fill="${dark}" opacity="0.88"/><rect x="625" y="0" width="14" height="1920" fill="${cream}"/>`;
  } else if (slide.mode === "framed") {
    content = textBlock({
      x: 74, y: 1450, width: 910, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: 118, subSize: 42,
    });
    extra = `<rect x="64" y="160" width="952" height="1250" fill="none" stroke="${cream}" stroke-width="18"/>`;
  } else if (slide.mode === "stack") {
    content = textBlock({
      x: 64, y: 1200, width: 910, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: 112, subSize: 42,
    });
    extra = `<rect x="615" y="650" width="365" height="500" fill="none" stroke="${gold}" stroke-width="16" transform="rotate(4 797 900)"/>`;
  } else if (slide.mode === "list") {
    content = textBlock({
      x: 118, y: 1090, width: 845, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: 78, subSize: 44, list: true,
    });
    extra = `<rect x="72" y="960" width="936" height="760" fill="${dark}" opacity="0.78" stroke="${cream}" stroke-width="10"/>`;
  } else if (slide.mode === "closing") {
    content = textBlock({
      x: 120, y: 540, width: 840, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: 86, subSize: 42, align: "center",
    });
  } else {
    content = textBlock({
      x: 64, y: 1180, width: 925, kicker: slide.kicker, title: slide.title, subtitle: slide.subtitle,
      titleSize: slide.title.length > 40 ? 80 : 108, subSize: 43,
    });
  }
  return Buffer.from(`
  <svg width="${W}" height="${H}" viewBox="0 0 ${W} ${H}" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="fade" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0" stop-color="#17130f" stop-opacity="0.05"/>
        <stop offset="0.54" stop-color="#17130f" stop-opacity="0.45"/>
        <stop offset="1" stop-color="#17130f" stop-opacity="0.95"/>
      </linearGradient>
      <radialGradient id="warm" cx="20%" cy="18%" r="55%">
        <stop offset="0" stop-color="#e2a765" stop-opacity="0.34"/>
        <stop offset="1" stop-color="#e2a765" stop-opacity="0"/>
      </radialGradient>
      <style>
        text { font-family: Rowdies, Impact, Arial Black, sans-serif; }
        .brand,.num { font-size: 28px; fill: ${cream}; opacity: .82; font-weight: 400; }
        .kicker { font-size: 34px; fill: ${gold}; font-weight: 700; }
        .title { font-size: var(--title-size); fill: ${cream}; font-weight: 700; }
        .subtitle { font-size: var(--sub-size); fill: #f4ddbc; font-weight: 300; }
      </style>
    </defs>
    <rect width="${W}" height="${H}" fill="url(#fade)"/>
    <rect width="${W}" height="${H}" fill="url(#warm)"/>
    ${extra}
    <text x="64" y="88" class="brand">UKIYO</text>
    <text x="1016" y="88" text-anchor="end" class="num">${count}/09</text>
    <g style="--title-size: 100px; --sub-size: 42px">${content}</g>
    <rect x="${slide.mode === "closing" ? 400 : 64}" y="1858" width="${slide.mode === "closing" ? 280 : 220}" height="8" fill="${gold}"/>
  </svg>`);
}

async function coverImage(file, width, height) {
  return sharp(file)
    .resize(width, height, { fit: "cover" })
    .modulate({ saturation: 0.92, brightness: 0.88 })
    .linear(1.08, -8)
    .png()
    .toBuffer();
}

async function makeSlide(slide, index) {
  const base = sharp({
    create: { width: W, height: H, channels: 4, background: dark },
  });
  const composites = [];
  if (slide.mode === "split") {
    composites.push({ input: await coverImage(slide.image, 720, H), left: -60, top: 0 });
  } else if (slide.mode === "framed") {
    composites.push({ input: await coverImage(slide.image, 932, 1230), left: 74, top: 170 });
  } else if (slide.mode === "stack") {
    const framed = await sharp(slide.image)
      .resize(900, 720, { fit: "cover" })
      .extend({ top: 16, bottom: 16, left: 16, right: 16, background: cream })
      .rotate(-2, { background: { r: 0, g: 0, b: 0, alpha: 0 } })
      .png()
      .toBuffer();
    composites.push({ input: framed, left: 72, top: 96 });
  } else {
    composites.push({ input: await coverImage(slide.image, W, H), left: 0, top: 0 });
  }
  composites.push({ input: overlaySvg(slide, index), left: 0, top: 0 });
  return base.composite(composites).png().toBuffer();
}

async function main() {
  const pdf = await PDFDocument.create();
  for (let i = 0; i < slides.length; i += 1) {
    const png = await makeSlide(slides[i], i);
    const pngPath = path.join(outDir, `slide-${String(i + 1).padStart(2, "0")}.png`);
    fs.writeFileSync(pngPath, png);
    const embedded = await pdf.embedPng(png);
    const page = pdf.addPage([W, H]);
    page.drawImage(embedded, { x: 0, y: 0, width: W, height: H });
  }
  const pdfPath = path.join(outDir, "ukiyo-comer-donde-comen-ellos.pdf");
  fs.writeFileSync(pdfPath, await pdf.save());
  console.log(JSON.stringify({ pdfPath, outDir }, null, 2));
}

main().catch((error) => {
  console.error(error);
  process.exit(1);
});
