document.addEventListener('DOMContentLoaded', function () {
  const links = Array.from(document.querySelectorAll('[data-portal-nav] a[href^="#"]'));
  const sections = Array.from(document.querySelectorAll('[data-portal-section]'));
  const routeMapElements = Array.from(document.querySelectorAll('[data-portal-route-map]'));
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

  const dayGalleries = Array.from(document.querySelectorAll('[data-day-gallery]'));

  if (dayGalleries.length) {
    dayGalleries.forEach(function (gallery) {
      const slides = Array.from(gallery.querySelectorAll('[data-day-gallery-slide]'));
      const prevButton = gallery.querySelector('[data-day-gallery-prev]');
      const nextButton = gallery.querySelector('[data-day-gallery-next]');
      const status = gallery.querySelector('[data-day-gallery-status]');
      const intervalMs = parseInt(gallery.getAttribute('data-gallery-interval') || '2000', 10);
      let activeIndex = slides.findIndex(function (slide) {
        return slide.classList.contains('is-active');
      });
      let timerId = null;

      if (!slides.length) {
        return;
      }

      if (activeIndex < 0) {
        activeIndex = 0;
      }

      const updateGallery = function () {
        slides.forEach(function (slide, index) {
          const isActive = index === activeIndex;
          slide.classList.toggle('is-active', isActive);
          slide.hidden = !isActive;
        });

        if (status) {
          status.textContent = (activeIndex + 1) + '/' + slides.length;
        }
      };

      const goToIndex = function (index) {
        activeIndex = (index + slides.length) % slides.length;
        updateGallery();
      };

      const restartAutoplay = function () {
        if (timerId) {
          window.clearInterval(timerId);
          timerId = null;
        }

        if (slides.length < 2 || Number.isNaN(intervalMs) || intervalMs < 1000) {
          return;
        }

        timerId = window.setInterval(function () {
          goToIndex(activeIndex + 1);
        }, intervalMs);
      };

      if (prevButton) {
        prevButton.addEventListener('click', function () {
          goToIndex(activeIndex - 1);
          restartAutoplay();
        });
      }

      if (nextButton) {
        nextButton.addEventListener('click', function () {
          goToIndex(activeIndex + 1);
          restartAutoplay();
        });
      }

      gallery.addEventListener('mouseenter', function () {
        if (timerId) {
          window.clearInterval(timerId);
          timerId = null;
        }
      });

      gallery.addEventListener('mouseleave', function () {
        restartAutoplay();
      });

      updateGallery();
      restartAutoplay();
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

  const activityRails = Array.from(document.querySelectorAll('[data-portal-activity-rail]'));

  if (activityRails.length) {
    activityRails.forEach(function (rail) {
      const wrapper = rail.closest('.portal-day-activities');
      const prevButton = wrapper ? wrapper.querySelector('[data-activity-prev]') : null;
      const nextButton = wrapper ? wrapper.querySelector('[data-activity-next]') : null;
      const cards = Array.from(rail.querySelectorAll('.portal-day-activity'));

      if (!cards.length || !prevButton || !nextButton) {
        return;
      }

      const getScrollAmount = function () {
        const firstCard = cards[0];
        if (!firstCard) {
          return rail.clientWidth;
        }

        const railStyles = window.getComputedStyle(rail);
        const gapValue = railStyles.columnGap || railStyles.gap || '0';
        const gap = parseFloat(gapValue) || 0;

        return firstCard.getBoundingClientRect().width + gap;
      };

      prevButton.addEventListener('click', function () {
        rail.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
      });

      nextButton.addEventListener('click', function () {
        const maxScrollLeft = rail.scrollWidth - rail.clientWidth - 8;

        if (rail.scrollLeft >= maxScrollLeft) {
          rail.scrollTo({ left: 0, behavior: 'smooth' });
          return;
        }

        rail.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
      });
    });
  }

  const proposalChangeToggles = Array.from(document.querySelectorAll('[data-proposal-change-toggle]'));
  const proposalResponseForms = Array.from(document.querySelectorAll('[data-proposal-response-form]'));

  if (proposalChangeToggles.length) {
    proposalChangeToggles.forEach(function (toggle) {
      toggle.addEventListener('click', function () {
        const formId = toggle.getAttribute('aria-controls');
        const form = formId ? document.getElementById(formId) : null;
        const relatedToggles = formId ? Array.from(document.querySelectorAll('[data-proposal-change-toggle][aria-controls="' + formId + '"]')) : [];

        if (!form) {
          return;
        }

        const isHidden = form.hasAttribute('hidden');

        toggle.classList.remove('is-animated');
        window.requestAnimationFrame(function () {
          toggle.classList.add('is-animated');
        });

        if (isHidden) {
          form.removeAttribute('hidden');
          form.classList.add('is-open');
          relatedToggles.forEach(function (item) {
            item.setAttribute('aria-expanded', 'true');
          });

          const textarea = form.querySelector('textarea');
          if (textarea) {
            window.setTimeout(function () {
              textarea.focus();
            }, 60);
          }

          return;
        }

        form.setAttribute('hidden', 'hidden');
        form.classList.remove('is-open');
        relatedToggles.forEach(function (item) {
          item.setAttribute('aria-expanded', 'false');
        });
      });
    });
  }

  if (proposalResponseForms.length) {
    proposalResponseForms.forEach(function (form) {
      form.addEventListener('submit', function (event) {
        const mode = form.getAttribute('data-proposal-response-form') || '';
        const submitButton = form.querySelector('[data-proposal-submit-button]') || form.querySelector('button[type="submit"]');

        if (!submitButton || form.dataset.isSubmitting === '1') {
          return;
        }

        event.preventDefault();
        form.dataset.isSubmitting = '1';
        submitButton.classList.add('is-submitting');

        if ('approve' === mode) {
          submitButton.classList.add('is-celebrating');
        }

        window.setTimeout(function () {
          form.submit();
        }, 'approve' === mode ? 520 : 320);
      });
    });
  }

  const proposalChangeForms = Array.from(document.querySelectorAll('[data-proposal-change-form]'));

  if (proposalChangeForms.length) {
    proposalChangeForms.forEach(function (form) {
      form.addEventListener('submit', function (event) {
        const submitButton = form.querySelector('[data-proposal-change-submit]');

        if (!submitButton || form.dataset.isSubmitting === '1') {
          return;
        }

        event.preventDefault();
        form.dataset.isSubmitting = '1';
        submitButton.classList.add('is-submitting');

        window.setTimeout(function () {
          form.submit();
        }, 320);
      });
    });
  }

  const activityModalTriggers = Array.from(document.querySelectorAll('[data-activity-modal-open]'));
  const activityModals = Array.from(document.querySelectorAll('[data-activity-modal]'));
  let activeActivityModal = null;

  const closeActivityModal = function (modal) {
    if (!modal) {
      return;
    }

    modal.setAttribute('hidden', 'hidden');
    document.body.classList.remove('portal-modal-open');
    activeActivityModal = null;
  };

  const openActivityModal = function (modal) {
    if (!modal) {
      return;
    }

    activityModals.forEach(function (item) {
      if (item !== modal) {
        item.setAttribute('hidden', 'hidden');
      }
    });

    modal.removeAttribute('hidden');
    document.body.classList.add('portal-modal-open');
    activeActivityModal = modal;
  };

  if (activityModalTriggers.length && activityModals.length) {
    activityModalTriggers.forEach(function (trigger) {
      const modalId = trigger.getAttribute('data-activity-modal-open');
      const modal = modalId ? document.getElementById(modalId) : null;

      if (!modal) {
        return;
      }

      trigger.addEventListener('click', function () {
        openActivityModal(modal);
      });
    });

    activityModals.forEach(function (modal) {
      const hero = modal.querySelector('[data-activity-modal-hero]');
      const thumbs = Array.from(modal.querySelectorAll('[data-activity-modal-thumb]'));

      modal.querySelectorAll('[data-activity-modal-close]').forEach(function (button) {
        button.addEventListener('click', function () {
          closeActivityModal(modal);
        });
      });

      if (hero && thumbs.length) {
        thumbs.forEach(function (thumb) {
          thumb.addEventListener('click', function () {
            const imageUrl = thumb.getAttribute('data-image-url');

            if (!imageUrl) {
              return;
            }

            hero.setAttribute('src', imageUrl);
            thumbs.forEach(function (item) {
              item.classList.remove('is-active');
            });
            thumb.classList.add('is-active');
          });
        });
      }
    });

    document.addEventListener('keydown', function (event) {
      if ('Escape' === event.key && activeActivityModal) {
        closeActivityModal(activeActivityModal);
      }
    });
  }

  const packingChecklists = Array.from(document.querySelectorAll('[data-portal-packing-checklist]'));

  if (packingChecklists.length) {
    packingChecklists.forEach(function (card) {
      const list = card.querySelector('[data-packing-list]');
      const form = card.querySelector('[data-packing-form]');
      const input = form ? form.querySelector('input[name="packing_item"]') : null;
      const progressText = card.querySelector('[data-packing-progress-text]');
      const progressBar = card.querySelector('[data-packing-progress-bar]');
      const tripId = card.getAttribute('data-trip-id') || 'default';
      const storageKey = 'ukiyoPortalPackingChecklist:' + tripId;
      let defaultItems = [];

      if (!list) {
        return;
      }

      try {
        defaultItems = JSON.parse(card.getAttribute('data-default-items') || '[]');
      } catch (error) {
        defaultItems = [];
      }

      const normalizeItems = function (items) {
        if (!Array.isArray(items)) {
          return [];
        }

        return items.reduce(function (acc, item, index) {
          const label = item && item.label ? String(item.label).trim() : '';
          if (!label) {
            return acc;
          }

          acc.push({
            id: item && item.id ? String(item.id) : 'item-' + index,
            label: label,
            checked: !!(item && item.checked),
            custom: !!(item && item.custom)
          });

          return acc;
        }, []);
      };

      const escapeHtml = function (value) {
        return String(value)
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#039;');
      };

      const loadItems = function () {
        try {
          const storedItems = JSON.parse(window.localStorage.getItem(storageKey) || '[]');
          const normalizedStoredItems = normalizeItems(storedItems);

          if (normalizedStoredItems.length) {
            return normalizedStoredItems;
          }
        } catch (error) {
          return normalizeItems(defaultItems);
        }

        return normalizeItems(defaultItems);
      };

      let items = loadItems();

      const saveItems = function () {
        try {
          window.localStorage.setItem(storageKey, JSON.stringify(items));
        } catch (error) {
          // Ignore storage failures and keep the checklist functional in-memory.
        }
      };

      const updateProgress = function () {
        const total = items.length;
        const completed = items.filter(function (item) {
          return item.checked;
        }).length;
        const percentage = total ? (completed / total) * 100 : 0;

        if (progressText) {
          progressText.textContent = completed + '/' + total;
        }

        if (progressBar) {
          progressBar.style.width = percentage + '%';
        }
      };

      const renderItems = function () {
        if (!items.length) {
          list.innerHTML = '<p class="portal-packing-list__empty">Añade aquí lo que quieras recordar antes de cerrar la maleta.</p>';
          updateProgress();
          return;
        }

        list.innerHTML = items.map(function (item) {
          return '' +
            '<div class="portal-packing-item' + (item.checked ? ' is-checked' : '') + '" data-packing-id="' + escapeHtml(item.id) + '">' +
              '<label class="portal-packing-item__main">' +
                '<input type="checkbox" data-packing-check ' + (item.checked ? 'checked' : '') + ' />' +
                '<span class="portal-packing-item__label">' + escapeHtml(item.label) + '</span>' +
              '</label>' +
              (item.custom ? '<button class="portal-packing-item__remove" type="button" data-packing-remove aria-label="Eliminar elemento">Quitar</button>' : '') +
            '</div>';
        }).join('');

        updateProgress();
      };

      list.addEventListener('change', function (event) {
        const checkbox = event.target.closest('[data-packing-check]');
        if (!checkbox) {
          return;
        }

        const row = checkbox.closest('[data-packing-id]');
        if (!row) {
          return;
        }

        items = items.map(function (item) {
          if (item.id === row.getAttribute('data-packing-id')) {
            return {
              id: item.id,
              label: item.label,
              checked: checkbox.checked,
              custom: item.custom
            };
          }

          return item;
        });

        saveItems();
        renderItems();
      });

      list.addEventListener('click', function (event) {
        const removeButton = event.target.closest('[data-packing-remove]');
        if (!removeButton) {
          return;
        }

        const row = removeButton.closest('[data-packing-id]');
        if (!row) {
          return;
        }

        items = items.filter(function (item) {
          return item.id !== row.getAttribute('data-packing-id');
        });

        saveItems();
        renderItems();
      });

      if (form && input) {
        form.addEventListener('submit', function (event) {
          const value = input.value.trim();

          event.preventDefault();

          if (!value) {
            input.focus();
            return;
          }

          items.push({
            id: 'custom-' + Date.now(),
            label: value,
            checked: false,
            custom: true
          });

          input.value = '';
          saveItems();
          renderItems();
          input.focus();
        });
      }

      renderItems();
    });
  }

  if (routeMapElements.length) {
    const escapeMapHtml = function (value) {
      return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    };

    const buildPopupHtml = function (point, index) {
      const title = escapeMapHtml(point.sequenceLabel || 'Parada ' + (index + 1));
      const label = escapeMapHtml(point.label || '');
      const meta = point.meta ? '<br><small>' + escapeMapHtml(point.meta) + '</small>' : '';
      const description = point.description ? '<br>' + escapeMapHtml(point.description) : '';

      return '<strong>' + title + '</strong><br>' + label + meta + description;
    };

    const parseMapUrl = function (value) {
      if (!value) {
        return null;
      }

      const raw = String(value).trim();
      if (!raw) {
        return null;
      }

      const directCoords = raw.match(/^\s*(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)\s*$/);
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

        const llValue = url.searchParams.get('ll') || url.searchParams.get('destination');
        if (llValue) {
          const llCoords = llValue.match(/(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)/);
          if (llCoords) {
            return {
              lat: parseFloat(llCoords[1]),
              lng: parseFloat(llCoords[2])
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
            sequenceLabel: point.sequenceLabel || '',
            description: point.description || '',
            meta: point.meta || '',
            lat: parseFloat(results[0].lat),
            lng: parseFloat(results[0].lon)
          };
        })
        .catch(function () {
          return null;
        });
    };

    const geocodeWithMapbox = function (point, options) {
      const token = mapConfig.mapboxToken || '';
      const query = point.searchQuery || point.query || point.label || '';
      const params = new URLSearchParams({
        q: query,
        access_token: token,
        limit: '1',
        language: 'es',
        autocomplete: 'false'
      });
      const proximity = options && options.proximity ? options.proximity : null;

      if (proximity && !Number.isNaN(proximity.lng) && !Number.isNaN(proximity.lat)) {
        params.set('proximity', proximity.lng + ',' + proximity.lat);
      }

      return fetch('https://api.mapbox.com/search/geocode/v6/forward?' + params.toString())
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
            sequenceLabel: point.sequenceLabel || '',
            description: point.description || '',
            meta: point.meta || '',
            lat: parseFloat(feature.center[1]),
            lng: parseFloat(feature.center[0])
          };
        })
        .catch(function () {
          return null;
        });
    };

    const resolvePoint = function (point, options) {
      const exactLat = parseFloat(point.lat);
      const exactLng = parseFloat(point.lng);

      if (!Number.isNaN(exactLat) && !Number.isNaN(exactLng)) {
        return Promise.resolve({
          label: point.label || point.query,
          sequenceLabel: point.sequenceLabel || '',
          description: point.description || '',
          meta: point.meta || '',
          lat: exactLat,
          lng: exactLng
        });
      }

      const mapUrlCoords = parseMapUrl(point.mapUrl);
      if (mapUrlCoords && !Number.isNaN(mapUrlCoords.lat) && !Number.isNaN(mapUrlCoords.lng)) {
        return Promise.resolve({
          label: point.label || point.query,
          sequenceLabel: point.sequenceLabel || '',
          description: point.description || '',
          meta: point.meta || '',
          lat: mapUrlCoords.lat,
          lng: mapUrlCoords.lng
        });
      }

      if (mapConfig.provider === 'mapbox' && mapConfig.mapboxToken) {
        return geocodeWithMapbox(point, options);
      }

      return geocodeWithLeafletFallback(point);
    };

    const resolvePointsSequentially = function (points) {
      const resolvedPoints = [];

      return points.reduce(function (chain, point) {
        return chain.then(function () {
          let proximity = null;

          if (resolvedPoints.length) {
            const previousPoint = resolvedPoints[resolvedPoints.length - 1];
            if (previousPoint && previousPoint.context && previousPoint.context === point.context) {
              proximity = {
                lat: previousPoint.lat,
                lng: previousPoint.lng
              };
            }
          }

          return resolvePoint(point, { proximity: proximity }).then(function (resolvedPoint) {
            if (resolvedPoint) {
              resolvedPoint.context = point.context || '';
            }

            resolvedPoints.push(resolvedPoint || null);
          });
        });
      }, Promise.resolve()).then(function () {
        return resolvedPoints;
      });
    };

    routeMapElements.forEach(function (routeMapElement, mapIndex) {
      let routePoints = [];

      try {
        routePoints = JSON.parse(routeMapElement.getAttribute('data-route-points') || '[]');
      } catch (error) {
        routePoints = [];
      }

      if (!routePoints.length) {
        return;
      }

      const routeMode = routeMapElement.getAttribute('data-route-mode') === 'markers' ? 'markers' : 'route';
      const minimumPoints = routeMode === 'markers' ? 1 : 2;

      resolvePointsSequentially(routePoints).then(function (resolvedPoints) {
        const validPoints = resolvedPoints.filter(Boolean);

        if (validPoints.length < minimumPoints) {
          routeMapElement.innerHTML = routeMode === 'markers'
            ? '<p class="portal-route-map__empty">No hemos podido mostrar los puntos clave con las ubicaciones actuales.</p>'
            : '<p class="portal-route-map__empty">No hemos podido dibujar la ruta con las ubicaciones actuales.</p>';
          return;
        }

        if (mapConfig.provider === 'mapbox' && window.mapboxgl && mapConfig.mapboxToken) {
          mapboxgl.accessToken = mapConfig.mapboxToken;

          const map = new mapboxgl.Map({
            container: routeMapElement,
            style: mapConfig.mapboxStyle || 'mapbox://styles/mapbox/streets-v12',
            center: [validPoints[0].lng, validPoints[0].lat],
            zoom: routeMode === 'markers' ? 8 : 4
          });

          map.addControl(new mapboxgl.NavigationControl(), 'top-left');

          map.on('load', function () {
            const coordinates = validPoints.map(function (point) {
              return [point.lng, point.lat];
            });
            const sourceId = 'ukiyo-route-' + mapIndex;
            const layerId = 'ukiyo-route-line-' + mapIndex;

            if (routeMode === 'route') {
              map.addSource(sourceId, {
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
                id: layerId,
                type: 'line',
                source: sourceId,
                layout: {
                  'line-join': 'round',
                  'line-cap': 'round'
                },
                paint: {
                  'line-color': '#FF8C42',
                  'line-width': 4
                }
              });
            }

            validPoints.forEach(function (point, index) {
              const markerElement = document.createElement('div');
              const popupTitle = point.sequenceLabel || 'Parada ' + (index + 1);
              markerElement.className = 'portal-mapbox-marker';
              markerElement.innerHTML = '<span>' + (routeMode === 'markers' ? '•' : index + 1) + '</span>';

              new mapboxgl.Marker(markerElement)
                .setLngLat([point.lng, point.lat])
                .setPopup(new mapboxgl.Popup({ offset: 18 }).setHTML(buildPopupHtml(point, index)))
                .addTo(map);
            });

            const bounds = new mapboxgl.LngLatBounds();
            coordinates.forEach(function (coord) {
              bounds.extend(coord);
            });

            if (routeMode === 'markers' && coordinates.length === 1) {
              map.easeTo({
                center: coordinates[0],
                zoom: 10
              });
            } else {
              map.fitBounds(bounds, {
                padding: 40
              });
            }
          });
        } else if (window.L) {
          const map = L.map(routeMapElement, {
            scrollWheelZoom: false
          }).setView([20, 0], routeMode === 'markers' ? 8 : 2);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
          }).addTo(map);

          const latLngs = validPoints.map(function (point) {
            return [point.lat, point.lng];
          });
          let boundsTarget = null;

          if (routeMode === 'route') {
            boundsTarget = L.polyline(latLngs, {
              color: '#FF8C42',
              weight: 4,
              opacity: 0.9
            }).addTo(map);
          }

          validPoints.forEach(function (point, index) {
            const popupTitle = point.sequenceLabel || 'Parada ' + (index + 1);
            const marker = L.circleMarker([point.lat, point.lng], {
              radius: 8,
              color: '#ffffff',
              weight: 2,
              fillColor: '#FF8C42',
              fillOpacity: 1
            }).addTo(map);

            marker.bindPopup(buildPopupHtml(point, index));
          });

          if (!boundsTarget && routeMode === 'markers' && latLngs.length === 1) {
            map.setView(latLngs[0], 10);
          } else if (boundsTarget) {
            map.fitBounds(boundsTarget.getBounds(), {
              padding: [32, 32]
            });
          } else {
            map.fitBounds(L.latLngBounds(latLngs), {
              padding: [32, 32]
            });
          }
        }
      });
    });
  }
});
