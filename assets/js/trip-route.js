/* --------------------------------------------------------- */
/* UKIYO — TRIP ROUTE JS (Accordions + Sliders)              */
/* --------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", () => {

    /* ----------------------------------------------------- */
    /* 1) ACCORDION (Viatu style)                            */
    /* ----------------------------------------------------- */

    const accordions = document.querySelectorAll(".accordion-toggle");

    accordions.forEach((toggle) => {
        toggle.addEventListener("click", () => {
            const parent = toggle.closest(".tr-stop");
            const content = parent.querySelector(".accordion-content");

            const isOpen = parent.classList.contains("accordion-open");

            // Cerrar cualquiera abierto
            document.querySelectorAll(".tr-stop.accordion-open").forEach((openItem) => {
                if (openItem !== parent) {
                    openItem.classList.remove("accordion-open");
                    openItem.querySelector(".accordion-content").style.display = "none";
                }
            });

            // Alternar el actual
            if (isOpen) {
                parent.classList.remove("accordion-open");
                content.style.display = "none";
            } else {
                parent.classList.add("accordion-open");
                content.style.display = "block";
            }
        });
    });




    /* ----------------------------------------------------- */
    /* 2) ACTIVITIES SLIDER                                  */
    /* ----------------------------------------------------- */

    const activitySliders = document.querySelectorAll(".activities-slider");

    activitySliders.forEach((slider) => {
        const container = slider;
        const wrapper = container.closest(".relative");

        const btnPrev = wrapper.querySelector(".slider-btn.prev");
        const btnNext = wrapper.querySelector(".slider-btn.next");

        if (!btnPrev || !btnNext) return;

        const scrollAmount = 320; // ancho de card + gap

        btnPrev.addEventListener("click", () => {
            container.scrollBy({
                left: -scrollAmount,
                behavior: "smooth",
            });
        });

        btnNext.addEventListener("click", () => {
            container.scrollBy({
                left: scrollAmount,
                behavior: "smooth",
            });
        });
    });




    /* ----------------------------------------------------- */
    /* 3) GALLERY (Your Stay)                                */
    /* ----------------------------------------------------- */

    const stayGalleries = document.querySelectorAll(".ukiyo-gallery-wrapper");

    stayGalleries.forEach((wrapper) => {
        const gallery = wrapper.querySelector(".ukiyo-gallery");
        const prevBtn = wrapper.querySelector(".gallery-prev");
        const nextBtn = wrapper.querySelector(".gallery-next");

        if (!gallery || !prevBtn || !nextBtn) return;

        const getScrollAmount = () => {
            const card = gallery.querySelector("img");
            if (!card) return 320;
            return card.getBoundingClientRect().width + 14; // card width + gap
        };

        prevBtn.addEventListener("click", () => {
            gallery.scrollBy({
                left: -getScrollAmount(),
                behavior: "smooth",
            });
        });

        nextBtn.addEventListener("click", () => {
            gallery.scrollBy({
                left: getScrollAmount(),
                behavior: "smooth",
            });
        });
    });


});
