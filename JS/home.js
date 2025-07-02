document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carrusel-slide');
    const dots = document.querySelectorAll('.carrusel-dot');
    const prevBtns = document.querySelectorAll('.carrusel-prev');
    const nextBtns = document.querySelectorAll('.carrusel-next');
    let current = 0;
    let animating = false;

    // Asegura que el contenedor padre tenga posición relativa y altura fija
    const slideParent = slides[0].parentElement;
    slideParent.style.position = "relative";
    // Calcula la altura máxima de los slides y la aplica al contenedor
    let maxHeight = 0;
    slides.forEach(slide => {
        slide.style.position = "absolute";
        slide.style.width = "100%";
        slide.style.top = 0;
        slide.style.left = 0;
        slide.style.transition = "transform 0.5s cubic-bezier(.22,1,.36,1), opacity 0.5s";
        slide.style.boxSizing = "border-box";
        slide.style.display = "block";
        // Medir altura real
        const prevDisplay = slide.style.display;
        slide.style.display = "block";
        const h = slide.offsetHeight;
        if (h > maxHeight) maxHeight = h;
        slide.style.display = prevDisplay;
    });
    slideParent.style.height = maxHeight + "px";
    // Inicializa solo el primer slide visible
    slides.forEach((slide, i) => {
        slide.style.display = i === 0 ? "block" : "none";
        if (i === 0) slide.style.position = "relative";
    });

    function showSlide(idx, direction = 1) {
        if (animating || idx === current) return;
        animating = true;
        const outClass = direction === 1 ? "slide-out-left" : "slide-out-right";
        const inClass = direction === 1 ? "slide-in-right" : "slide-in-left";
        const prev = slides[current];
        const next = slides[idx];

        // Prepara el slide entrante
        next.style.display = "block";
        next.classList.add(inClass);

        // Anima el slide saliente
        prev.classList.add(outClass);

        // Actualiza dots
        dots.forEach((dot, i) => {
            dot.style.background = i === idx ? '#0d6dfa' : '#e3e8f0';
        });

        setTimeout(() => {
            prev.style.display = "none";
            prev.classList.remove(outClass);
            next.classList.remove(inClass);
            // Asegura que el slide activo sea relative para stacking correcto
            slides.forEach((s, i) => s.style.position = "absolute");
            next.style.position = "relative";
            current = idx;
            animating = false;
        }, 500);
    }

    prevBtns.forEach(btn => {
        btn.onclick = function() {
            showSlide((current - 1 + slides.length) % slides.length, -1);
        };
    });
    nextBtns.forEach(btn => {
        btn.onclick = function() {
            showSlide((current + 1) % slides.length, 1);
        };
    });
    dots.forEach((dot, i) => {
        dot.onclick = () => {
            if (i !== current) showSlide(i, i > current ? 1 : -1);
        };
    });
});