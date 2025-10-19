# 🌏 UKIYO — Tema WordPress personalizado

**UKIYO** es un tema de WordPress desarrollado a medida para una agencia de viajes consciente, especializada en experiencias auténticas, sostenibles y personalizadas.  
El diseño combina minimalismo, elegancia y narrativa emocional para ofrecer una experiencia inmersiva y coherente con la filosofía de la marca.

---

## 🧭 Estructura del proyecto

ukiyo/
├── assets/
│   ├── css/
│   │   ├── main.css          # Tipografía global, colores, layout base
│   │   └── tailwind.css      # Configuración de Tailwind
│   ├── js/
│   │   └── main.js           # Scripts del tema
│   ├── fonts/                # Fuentes Telma y Satoshi
│   └── images/               # Imágenes del sitio
│
├── templates/
│   └── partials/             # Cabeceras, footers, bloques reutilizables
│
├── page-home.php             # Página principal
├── page-destinos.php         # Página de destinos
├── page-experiences.php      # Página de experiencias
├── page-pricing.php          # Página de precios
├── page-about.php            # Página “Nosotros”
├── page-reviews.php          # Página de reseñas
│
├── functions.php             # Encolado de scripts, menús, imágenes, etc.
├── header.php / footer.php   # Estructura global
├── style.css                 # Metadata del tema (WordPress)
└── README.md

---

## ⚙️ Requisitos

- **WordPress 6.0+**
- **PHP 8.0+**
- **TailwindCSS 3+**
- **Node.js 18+** (opcional, si recompilas estilos)
- Servidor local (MAMP / XAMPP / Local WP)

---

## 🚀 Instalación local

1. Clona el repositorio dentro de `/wp-content/themes/`:
   ```bash
   cd wp-content/themes/
   git clone https://github.com/Sergiogh10/Ukiyo_theme.git

2. Activa el tema desde el panel de Wordpress

3. Si modificas estilos:
npm install
npx tailwindcss -i ./assets/css/tailwind.css -o ./assets/css/main.css --watch

## 💡 Características principales
	•	Diseño minimalista y emocional, con fuentes Satoshi y Telma.
	•	Totalmente responsive (móvil, tablet, escritorio).
	•	Hero sections dinámicas con fondos, degradados y overlays.
	•	Sistema de páginas:
	•	🏠 Homepage (introducción a la marca)
	•	🌍 Destinos (presentación visual por país)
	•	✨ Experiencias (mapa interactivo + países)
	•	💬 Reseñas (testimonios visuales de viajeros)
	•	💼 Pricing (niveles de servicio con CTA de reserva)
	•	SEO optimizado: estructura semántica, etiquetas limpias y tiempos de carga rápidos.
	•	Colores personalizables desde Tailwind Config.

## 🧱 Prácticas recomendadas
	•	No edites directamente main.css generado por Tailwind.
Trabaja sobre tailwind.css y recompila.
	•	Mantén imágenes optimizadas (.jpg o .webp) antes de subirlas.
	•	Usa la convención font-satoshi y font-telma para tipografía.
	•	Crea nuevos templates duplicando los existentes para mantener consistencia.

⸻

## 📸 Créditos
	•	Diseño y desarrollo: Sergio García
	•	Fotografía: colaboradores locales y libres de derechos (Pexels/Unsplash)
	•	Tipografía: Satoshi & Telma

⸻

## 🪶 Filosofía

“Vivir el mundo flotante” — Ukiyo

Creemos en viajar sin prisa, en la belleza de lo efímero y en conectar con las culturas desde el respeto.
Cada destino es una historia; cada historia, una transformación.


## Licencia

Este tema está protegido por derechos de autor © 2025 Sergio García.
No está permitida su distribución comercial sin consentimiento del autor.