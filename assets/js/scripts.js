document.addEventListener("DOMContentLoaded", () => {
    /* ===========================
       1. Menú móvil
    ============================ */
    const menuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    }

    /* ===========================
       2. Parallax (hero o elementos con clase .parallax-element)
    ============================ */
    const parallaxElements = Array.from(document.querySelectorAll(".parallax-element"));
    let parallaxTicking = false;

    if (parallaxElements.length) {
        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            const speed = scrolled * 0.3;

            parallaxElements.forEach(el => {
                el.style.transform = `translate3d(0, ${speed}px, 0)`;
            });

            parallaxTicking = false;
        };

        window.addEventListener("scroll", () => {
            if (parallaxTicking) {
                return;
            }

            parallaxTicking = true;
            window.requestAnimationFrame(updateParallax);
        }, { passive: true });
    }

    /* ===========================
       3. Scroll suave para anchors internos
    ============================ */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", e => {
            e.preventDefault();
            const target = document.querySelector(anchor.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    });

    /* ===========================
       4. Filtro de experiencias por región (mapa interactivo)
    ============================ */
    const markers = document.querySelectorAll("[data-region]");
    const cards = document.querySelectorAll(".experience-card");
    const resetBtn = document.getElementById("reset-experiences");

    markers.forEach(marker => {
        marker.addEventListener("click", () => {
            const region = marker.dataset.region;

            // Mostrar solo la card del país seleccionado
            cards.forEach(card => {
                if (card.dataset.region === region) {
                    card.classList.remove("hidden");
                } else {
                    card.classList.add("hidden");
                }
            });

            // Mostrar botón de reset
            if (resetBtn) resetBtn.classList.remove("hidden");
        });

        // Tooltips de los marcadores
        const tooltip = marker.querySelector(".tooltip");
        if (tooltip) {
            marker.addEventListener("mouseenter", () => {
                tooltip.classList.remove("opacity-0");
                tooltip.classList.add("opacity-100");
            });
            marker.addEventListener("mouseleave", () => {
                tooltip.classList.add("opacity-0");
                tooltip.classList.remove("opacity-100");
            });
        }
    });

    if (resetBtn) {
        resetBtn.addEventListener("click", () => {
            cards.forEach(card => card.classList.remove("hidden"));
            resetBtn.classList.add("hidden");
        });
    }
});
