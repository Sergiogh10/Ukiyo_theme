document.addEventListener("DOMContentLoaded", function () {
    var mapElement = document.getElementById("map");
    if (!mapElement) return; // seguridad

    var map = L.map('map', {
        center: [20, 0],
        zoom: 2,
        scrollWheelZoom: false
    });

    // Tiles satélite Esri
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        
    }).addTo(map);

    // Icono SVG con la U
    function getUkiyoIcon() {
        return L.divIcon({
            className: "",
            html: `
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="#8B4513" stroke="white" stroke-width="4"/>
                    <text x="50" y="65" text-anchor="middle" font-size="50" font-family="Crimson Text, serif" fill="white">U</text>
                </svg>
            `,
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -35]
        });
    }

    // Marcadores
    L.marker([9.7489, -83.7534], { icon: getUkiyoIcon() }).addTo(map)
        .bindPopup("<b>Costa Rica</b><br>Agricultura Regenerativa y Bosques Nubosos");

    L.marker([4.7110, -74.0721], { icon: getUkiyoIcon() }).addTo(map)
        .bindPopup("<b>Colombia</b><br>Arte urbano en Bogotá y caficultura indígena");

    L.marker([-8.3405, 115.0920], { icon: getUkiyoIcon() }).addTo(map)
        .bindPopup("<b>Indonesia – Bali</b><br>Ceremonias sagradas y talleres tradicionales");

    L.marker([31.7917, -7.0926], { icon: getUkiyoIcon() }).addTo(map)
        .bindPopup("<b>Marruecos</b><br>Zocos de Marrakech y artesanía bereber");
});