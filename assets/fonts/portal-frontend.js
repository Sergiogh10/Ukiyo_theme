document.addEventListener('DOMContentLoaded', function () {
  const links = Array.from(document.querySelectorAll('[data-portal-nav] a[href^="#"]'));
  const sections = Array.from(document.querySelectorAll('[data-portal-section]'));
  const routeMapElement = document.querySelector('[data-portal-route-map]');
  const mapConfig = window.ukiyoPortalMapConfig || {};

  if (links.length && sections.length) {
    links.forEach(function (link) {
      link.addEventListener('click', function (event) {
        const target = document.querySelector(link.getAttribute('href'));
        if (!target) {
          return;
        }

        event.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }

        const id = entry.target.getAttribute('id');
        links.forEach(function (link) {
          link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
        });
      });
    }, {
      rootMargin: '-30% 0px -55% 0px',
      threshold: 0.1
    });

    sections.forEach(function (section) {
      observer.observe(section);
    });
  }

  const dayViewers = Array.from(document.querySelectorAll('[data-portal-day-viewer]'));

  if (dayViewers.length) {
    dayViewers.forEach(function (viewer) {
      const slides = Array.from(viewer.querySelectorAll('[data-day-slide]'));
      const prevButton = viewer.querySelector('[data-day-prev]');
      const nextButton = viewer.querySelector('[data-day-next]');
      const status = viewer.querySelector('[data-day-status]');
      let activeIndex = slides.findIndex(function (slide) {
        return slide.classList.contains('is-active');
      });

      if (!slides.length) {
        return;
      }

      if (activeIndex < 0) {
        activeIndex = 0;
      }

      const updateViewer = function () {
        slides.forEach(function (slide, index) {
          const isActive = index === activeIndex;
          slide.classList.toggle('is-active', isActive);
          slide.hidden = !isActive;
        });

        if (status) {
          const dayLabelElement = slides[activeIndex].querySelector('.portal-day-card__number');
          const dayLabel = dayLabelElement ? dayLabelElement.textContent.trim() : 'Día ' + (activeIndex + 1);
          status.textContent = dayLabel + ' · ' + (activeIndex + 1) + '/' + slides.length;
        }

        if (prevButton) {
          prevButton.disabled = activeIndex === 0;
        }

        if (nextButton) {
          nextButton.disabled = activeIndex === slides.length - 1;
        }
      };

      if (prevButton) {
        prevButton.addEventListener('click', function () {
          if (activeIndex > 0) {
            activeIndex -= 1;
            updateViewer();
          }
        });
      }

      if (nextButton) {
        nextButton.addEventListener('click', function () {
          if (activeIndex < slides.length - 1) {
            activeIndex += 1;
            updateViewer();
          }
        });
      }

      updateViewer();
    });
  }

  const recommendationCarousels = Array.from(document.querySelectorAll('[data-portal-rec-carousel]'));

  if (recommendationCarousels.length) {
    recommendationCarousels.forEach(function (carousel) {
      const pages = Array.from(carousel.querySelectorAll('[data-rec-page]'));
      const prevButton = carousel.querySelector('[data-rec-prev]');
      const nextButton = carousel.querySelector('[data-rec-next]');
      const status = carousel.querySelector('[data-rec-status]');
      let activeIndex = pages.findIndex(function (page) {
        return page.classList.contains('is-active');
      });

      if (!pages.length) {
        return;
      }

      if (activeIndex < 0) {
        activeIndex = 0;
      }

      const updateCarousel = function () {
        pages.forEach(function (page, index) {
          const isActive = index === activeIndex;
          page.classList.toggle('is-active', isActive);
          page.hidden = !isActive;
        });

        if (status) {
          status.textContent = (activeIndex + 1) + '/' + pages.length;
        }

        if (prevButton) {
          prevButton.disabled = activeIndex === 0;
        }

        if (nextButton) {
          nextButton.disabled = activeIndex === pages.length - 1;
        }
      };

      if (prevButton) {
        prevButton.addEventListener('click', function () {
          if (activeIndex > 0) {
            activeIndex -= 1;
            updateCarousel();
          }
        });
      }

      if (nextButton) {
        nextButton.addEventListener('click', function () {
          if (activeIndex < pages.length - 1) {
            activeIndex += 1;
            updateCarousel();
          }
        });
      }

      updateCarousel();
    });
  }

  if (routeMapElement) {
    let routePoints = [];

    try {
      routePoints = JSON.parse(routeMapElement.getAttribute('data-route-points') || '[]');
    } catch (error) {
      routePoints = [];
    }

    if (routePoints.length >= 2) {
      const parseMapUrl = function (value) {
        if (!value) {
          return null;
        }

        const raw = String(value).trim();
        if (!raw) {
          return null;
        }

        const directCoords = raw.match(/(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)/);
        if (directCoords) {
          return {
            lat: parseFloat(directCoords[1]),
            lng: parseFloat(directCoords[2])
          };
        }

        try {
          const url = new URL(raw);
          const decoded = decodeURIComponent(url.toString());

          const atMatch = decoded.match(/@(-?\d+(?:\.\d+)?),(-?\d+(?:\.\d+)?)/);
          if (atMatch) {
            return {
              lat: parseFloat(atMatch[1]),
              lng: parseFloat(atMatch[2])
            };
          }

          const embedMatch = decoded.match(/!3d(-?\d+(?:\.\d+)?)!4d(-?\d+(?:\.\d+)?)/);
          if (embedMatch) {
            return {
              lat: parseFloat(embedMatch[1]),
              lng: parseFloat(embedMatch[2])
            };
          }

          const queryValue = url.searchParams.get('q') || url.searchParams.get('query');
          if (queryValue) {
            const queryCoords = queryValue.match(/(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)/);
            if (queryCoords) {
              return {
                lat: parseFloat(queryCoords[1]),
                lng: parseFloat(queryCoords[2])
              };
            }
          }
        } catch (error) {
          return null;
        }

        return null;
      };

      const geocodeWithLeafletFallback = function (point) {
        const query = encodeURIComponent(point.searchQuery || point.query || point.label || '');
        return fetch('https://nominatim.openstreetmap.org/search?format=jsonv2&limit=1&q=' + query, {
          headers: {
            Accept: 'application/json'
          }
        })
          .then(function (response) {
            return response.json();
          })
          .then(function (results) {
            if (!Array.isArray(results) || !results[0]) {
              return null;
            }

            return {
              label: point.label || point.query,
              lat: parseFloat(results[0].lat),
              lng: parseFloat(results[0].lon)
            };
          })
          .catch(function () {
            return null;
          });
      };

      const geocodeWithMapbox = function (point) {
        const token = mapConfig.mapboxToken || '';
        const query = encodeURIComponent(point.searchQuery || point.query || point.label || '');

        return fetch('https://api.mapbox.com/geocoding/v5/mapbox.places/' + query + '.json?limit=1&access_token=' + encodeURIComponent(token))
          .then(function (response) {
            return response.json();
          })
          .then(function (results) {
            const feature = results && Array.isArray(results.features) ? results.features[0] : null;
            if (!feature || !Array.isArray(feature.center) || feature.center.length < 2) {
              return null;
            }

            return {
              label: point.label || point.query,
              lat: parseFloat(feature.center[1]),
              lng: parseFloat(feature.center[0])
            };
          })
          .catch(function () {
            return null;
          });
      };

      const resolvePoint = function (point) {
        const exactLat = parseFloat(point.lat);
        const exactLng = parseFloat(point.lng);

        if (!Number.isNaN(exactLat) && !Number.isNaN(exactLng)) {
          return Promise.resolve({
            label: point.label || point.query,
            lat: exactLat,
            lng: exactLng
          });
        }

        const mapUrlCoords = parseMapUrl(point.mapUrl);
        if (mapUrlCoords && !Number.isNaN(mapUrlCoords.lat) && !Number.isNaN(mapUrlCoords.lng)) {
          return Promise.resolve({
            label: point.label || point.query,
            lat: mapUrlCoords.lat,
            lng: mapUrlCoords.lng
          });
        }

        if (mapConfig.provider === 'mapbox' && mapConfig.mapboxToken) {
          return geocodeWithMapbox(point);
        }

        return geocodeWithLeafletFallback(point);
      };

      Promise.all(routePoints.map(resolvePoint)).then(function (resolvedPoints) {
        const validPoints = resolvedPoints.filter(Boolean);

        if (validPoints.length < 2) {
          routeMapElement.innerHTML = '<p class="portal-route-map__empty">No hemos podido dibujar la ruta con las ubicaciones actuales.</p>';
          return;
        }

        if (mapConfig.provider === 'mapbox' && window.mapboxgl && mapConfig.mapboxToken) {
          mapboxgl.accessToken = mapConfig.mapboxToken;

          const map = new mapboxgl.Map({
            container: routeMapElement,
            style: mapConfig.mapboxStyle || 'mapbox://styles/mapbox/streets-v12',
            center: [validPoints[0].lng, validPoints[0].lat],
            zoom: 4
          });

          map.addControl(new mapboxgl.NavigationControl(), 'top-left');

          map.on('load', function () {
            const coordinates = validPoints.map(function (point) {
              return [point.lng, point.lat];
            });

            map.addSource('ukiyo-route', {
              type: 'geojson',
              data: {
                type: 'Feature',
                geometry: {
                  type: 'LineString',
                  coordinates: coordinates
                }
              }
            });

            map.addLayer({
              id: 'ukiyo-route-line',
              type: 'line',
              source: 'ukiyo-route',
              layout: {
                'line-join': 'round',
                'line-cap': 'round'
              },
              paint: {
                'line-color': '#FF8C42',
                'line-width': 4
              }
            });

            validPoints.forEach(function (point, index) {
              const markerElement = document.createElement('div');
              markerElement.className = 'portal-mapbox-marker';
              markerElement.innerHTML = '<span>' + (index + 1) + '</span>';

              new mapboxgl.Marker(markerElement)
                .setLngLat([point.lng, point.lat])
                .setPopup(new mapboxgl.Popup({ offset: 18 }).setHTML('<strong>Parada ' + (index + 1) + '</strong><br>' + point.label))
                .addTo(map);
            });

            const bounds = new mapboxgl.LngLatBounds();
            coordinates.forEach(function (coord) {
              bounds.extend(coord);
            });

            map.fitBounds(bounds, {
              padding: 40
            });
          });
        } else if (window.L) {
          const map = L.map(routeMapElement, {
            scrollWheelZoom: false
          }).setView([20, 0], 2);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
          }).addTo(map);

          const latLngs = validPoints.map(function (point) {
            return [point.lat, point.lng];
          });

          const polyline = L.polyline(latLngs, {
            color: '#FF8C42',
            weight: 4,
            opacity: 0.9
          }).addTo(map);

          validPoints.forEach(function (point, index) {
            const marker = L.circleMarker([point.lat, point.lng], {
              radius: 8,
              color: '#ffffff',
              weight: 2,
              fillColor: '#FF8C42',
              fillOpacity: 1
            }).addTo(map);

            marker.bindPopup('<strong>Parada ' + (index + 1) + '</strong><br>' + point.label);
          });

          map.fitBounds(polyline.getBounds(), {
            padding: [32, 32]
          });
        }
      });
    }
  }
});
