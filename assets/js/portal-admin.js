jQuery(function ($) {
  function syncEmailPreview($composer) {
    const $htmlField = $composer.find('[data-email-html]').first();
    const $preview = $composer.find('[data-email-preview]').first();

    if (!$htmlField.length || !$preview.length) {
      return;
    }

    let html = String($htmlField.val() || '');

    $composer.find('[data-email-token]').each(function () {
      const token = String($(this).data('emailToken') || '');
      const value = String($(this).val() || '');

      if (token) {
        html = html.split(token).join(value);
      }
    });

    $preview.attr('srcdoc', html);
    $composer.find('[data-email-placeholder-count]').text($composer.find('[data-email-token]').length);
  }

  function getNextIndex($container) {
    let max = -1;
    $container.children('[data-index]').each(function () {
      const value = parseInt($(this).attr('data-index'), 10);
      if (!Number.isNaN(value) && value > max) {
        max = value;
      }
    });
    return max + 1;
  }

  function renderImagePreview($preview, attachments) {
    $preview.empty();
    attachments.forEach(function (attachment) {
      if (attachment.type === 'image') {
        const url = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
        $preview.append($('<img>', { src: url, alt: attachment.filename || '' }));
      }
    });
  }

  function renderFilePreview($preview, attachments) {
    $preview.text('');
    if (attachments[0]) {
      $preview.text(attachments[0].filename || attachments[0].title || '');
    }
  }

  function replaceTokens(template, replacements) {
    let html = template;

    Object.keys(replacements).forEach(function (token) {
      html = html.replace(new RegExp(token, 'g'), replacements[token]);
    });

    return html;
  }

  function normalizeMapPointLine(parts) {
    return parts.filter(function (value) {
      return String(value || '').trim() !== '';
    }).join(' | ');
  }

  function appendMapPointToTextarea($textarea, point) {
    if (!$textarea.length || !point || !point.name) {
      return;
    }

    const normalizedLine = normalizeMapPointLine([
      point.name,
      point.url || '',
      point.lat || '',
      point.lng || ''
    ]);

    const currentLines = String($textarea.val() || '')
      .split(/\r?\n/)
      .map(function (line) {
        return String(line || '').trim();
      })
      .filter(Boolean);

    const alreadyExists = currentLines.some(function (line) {
      const parts = line.split('|').map(function (value) {
        return String(value || '').trim().toLowerCase();
      });
      const lineLabel = parts[0] || '';
      const lineUrl = parts[1] || '';
      const lineLat = parts[2] || '';
      const lineLng = parts[3] || '';

      return (point.url && lineUrl === String(point.url).trim().toLowerCase())
        || (lineLabel === String(point.name).trim().toLowerCase() && lineLat === String(point.lat || '').trim() && lineLng === String(point.lng || '').trim());
    });

    if (alreadyExists) {
      return;
    }

    currentLines.push(normalizedLine);
    $textarea.val(currentLines.join('\n')).trigger('change');
  }

  function renderMapPointSearchResults($builder, results) {
    const $results = $builder.find('[data-map-points-results]').first();

    if (!$results.length) {
      return;
    }

    $results.empty();

    if (!Array.isArray(results) || !results.length) {
      $results.append(
        $('<div>', { class: 'ukiyo-map-points-empty', text: 'No hemos encontrado resultados con esa búsqueda.' })
      );
      return;
    }

    results.forEach(function (result) {
      const $row = $('<div>', { class: 'ukiyo-map-points-result' });
      const $copy = $('<div>');
      const metaParts = [];

      if (result.address) {
        metaParts.push(result.address);
      }

      if (result.lat && result.lng) {
        metaParts.push(result.lat + ', ' + result.lng);
      }

      $copy.append($('<strong>', { text: result.name || 'Lugar sin nombre' }));
      $copy.append($('<span>', { text: metaParts.join(' · ') }));

      $row.append($copy);
      $row.append(
        $('<button>', {
          type: 'button',
          class: 'button button-secondary ukiyo-map-point-add',
          text: 'Añadir'
        }).data('mapPoint', result)
      );

      $results.append($row);
    });
  }

  function renderMapPointSearchStatus($builder, message) {
    const $results = $builder.find('[data-map-points-results]').first();

    if (!$results.length) {
      return;
    }

    $results.empty().append(
      $('<div>', { class: 'ukiyo-map-points-empty', text: message })
    );
  }

  function initSortables(scope) {
    $(scope).find('[data-ukiyo-repeater]').each(function () {
      const $repeater = $(this);

      if ($repeater.data('ui-sortable')) {
        return;
      }

      $repeater.sortable({
        items: '> .ukiyo-repeater-item',
        handle: '.ukiyo-sort-handle',
        placeholder: 'ui-state-highlight'
      });
    });
  }

  function getEditorSettings() {
    return {
      tinymce: {
        wpautop: true,
        branding: false,
        menubar: false,
        toolbar1: 'bold italic underline bullist numlist link unlink undo redo',
        toolbar2: '',
        height: 220
      },
      quicktags: {
        buttons: 'strong,em,link,ul,ol,li,close'
      },
      mediaButtons: false
    };
  }

  function initRichEditors(scope) {
    if (!window.wp || !wp.editor || typeof wp.editor.initialize !== 'function') {
      return;
    }

    $(scope).find('textarea.ukiyo-rich-textarea').each(function () {
      const $textarea = $(this);
      const editorId = $textarea.attr('id');

      if (!editorId || $textarea.data('richReady')) {
        return;
      }

      wp.editor.initialize(editorId, getEditorSettings());
      $textarea.data('richReady', true);
    });
  }

  function destroyRichEditors($scope) {
    if (!window.wp || !wp.editor || typeof wp.editor.remove !== 'function') {
      return;
    }

    $scope.find('textarea.ukiyo-rich-textarea').each(function () {
      const editorId = $(this).attr('id');
      if (editorId) {
        try {
          wp.editor.remove(editorId);
        } catch (error) {
          // Ignore missing editor instances.
        }
      }
    });
  }

  function appendTemplate($container, templateHtml, replacements) {
    const html = replaceTokens(templateHtml, replacements);
    const $item = $(html);

    $container.append($item);
    initSortables($item);
    initRichEditors($item);

    return $item;
  }

  function updatePlaceSummary($place) {
    const placeName = String($place.find('.ukiyo-place-name').first().val() || '').trim() || 'Nuevo lugar';
    const stayDays = String($place.find('.ukiyo-place-stay-days').first().val() || '').trim() || '1';
    const accommodationCount = $place.find('.ukiyo-repeater-item--stay').length;
    let accommodation = 'Alojamiento por definir';

    if (accommodationCount === 1) {
      accommodation = String($place.find('.ukiyo-repeater-item--stay .ukiyo-place-accommodation').first().val() || '').trim() || '1 alojamiento';
    } else if (accommodationCount > 1) {
      accommodation = accommodationCount + ' alojamientos';
    }

    $place.find('.ukiyo-place-summary-text').first().text(placeName);
    $place.find('.ukiyo-place-summary-meta').first().text(stayDays + ' día(s) · ' + accommodation);
  }

  function updateStaySummary($stay) {
    const name = String($stay.find('.ukiyo-place-accommodation').first().val() || '').trim() || 'Nuevo alojamiento';
    const startDay = String($stay.find('.ukiyo-stay-start-day').first().val() || '').trim() || '1';
    const endDay = String($stay.find('.ukiyo-stay-end-day').first().val() || '').trim() || startDay;
    const normalizedEndDay = parseInt(endDay, 10) < parseInt(startDay, 10) ? startDay : endDay;

    $stay.find('.ukiyo-stay-summary-text').first().text(name);
    $stay.find('.ukiyo-stay-summary-meta').first().text('Días ' + startDay + '-' + normalizedEndDay);
  }

  function updateDaySummary($day) {
    const dayNumber = String($day.find('.ukiyo-day-number').first().val() || '').trim() || '1';
    const dayTitle = String($day.find('.ukiyo-day-title').first().val() || '').trim() || 'Nuevo día';

    $day.find('.ukiyo-day-summary-text').first().text(dayTitle);
    $day.find('.ukiyo-day-summary-meta').first().text('Día ' + dayNumber);
  }

  function updateActivitySummary($activity) {
    const title = String($activity.find('[name$="[title]"]').first().val() || '').trim() || 'Nueva actividad';
    const location = String($activity.find('[name$="[location_name]"]').first().val() || '').trim() || 'Ubicación por definir';

    $activity.find('.ukiyo-activity-summary-text').first().text(title);
    $activity.find('.ukiyo-activity-summary-meta').first().text(location);
  }

  function updateAllSummaries(scope) {
    $(scope).find('.ukiyo-itinerary-place').each(function () {
      updatePlaceSummary($(this));
    });

    $(scope).find('.ukiyo-repeater-item--nested').not('.ukiyo-repeater-item--activity').each(function () {
      const $item = $(this);

      if ($item.hasClass('ukiyo-repeater-item--stay')) {
        updateStaySummary($item);
        return;
      }

      updateDaySummary($item);
    });

    $(scope).find('.ukiyo-repeater-item--activity').each(function () {
      updateActivitySummary($(this));
    });
  }

  function updateProposalVisibility() {
    const accessType = String($('#ukiyo_portal_access_type').val() || 'private');
    const isProposal = accessType === 'proposal';

    $('[data-ukiyo-proposal-box]').prop('hidden', !isProposal);
  }

  initSortables(document);
  initRichEditors(document);
  updateAllSummaries(document);
  updateProposalVisibility();

  $('[data-ukiyo-email-composer]').each(function () {
    syncEmailPreview($(this));
  });

  $('.ukiyo-add-row').on('click', function () {
    const templateId = $(this).data('template');
    const target = $(this).data('target');
    const $container = $(target);
    const template = $('#' + templateId).html();
    const index = getNextIndex($container);

    const $item = appendTemplate($container, template, {
      '__INDEX__': index
    });

    if ($item.is('details')) {
      $container.children('details').not($item).prop('open', false);
      $item.prop('open', true);
    }

    updateAllSummaries($item);
  });

  $(document).on('click', '.ukiyo-add-nested-row', function () {
    const $button = $(this);
    const templateId = $button.data('template');
    const targetSelector = $button.data('target');
    const parentPrefix = String($button.data('parentPrefix') || '');
    const parentMatch = parentPrefix.match(/ukiyo_portal_itinerary\[(.+?)\]\[(days|accommodations)\]/);
    const parentKey = parentMatch ? parentMatch[1] : '';
    const $container = $button.closest('.ukiyo-itinerary-place').find(targetSelector).first();
    const template = $('#' + templateId).html();
    const index = getNextIndex($container);

    const $item = appendTemplate($container, template, {
      '__PARENT__': parentKey,
      '__INDEX__': index
    });

    if ($item.is('details')) {
      $container.children('details').not($item).prop('open', false);
      $item.prop('open', true);
    }

    updateAllSummaries($button.closest('.ukiyo-itinerary-place'));
  });

  $(document).on('click', '.ukiyo-add-day-activity-row', function () {
    const $button = $(this);
    const templateId = $button.data('template');
    const targetSelector = $button.data('target');
    const parentPrefix = String($button.data('parentPrefix') || '');
    const prefixMatch = parentPrefix.match(/ukiyo_portal_itinerary\[(.+?)\]\[days\]\[(.+?)\]\[activities\]/);
    const placeKey = prefixMatch ? prefixMatch[1] : '';
    const dayKey = prefixMatch ? prefixMatch[2] : '';
    const $container = $button.closest('.ukiyo-repeater-item--nested').find(targetSelector).first();
    const template = $('#' + templateId).html();
    const index = getNextIndex($container);

    const $item = appendTemplate($container, template, {
      '__PLACE__': placeKey,
      '__DAY__': dayKey,
      '__INDEX__': index
    });

    if ($item.is('details')) {
      $container.children('details').not($item).prop('open', false);
      $item.prop('open', true);
    }

    updateAllSummaries($button.closest('.ukiyo-repeater-item--nested'));
  });

  $(document).on('click', '.ukiyo-remove-row', function () {
    const $row = $(this).closest('.ukiyo-repeater-item');
    const $place = $row.closest('.ukiyo-itinerary-place');
    destroyRichEditors($row);
    $row.remove();
    updateAllSummaries($place.length ? $place : document);
  });

  $(document).on('input change', '.ukiyo-place-name, .ukiyo-place-stay-days', function () {
    updatePlaceSummary($(this).closest('.ukiyo-itinerary-place'));
  });

  $(document).on('input change', '.ukiyo-repeater-item--stay input, .ukiyo-repeater-item--stay textarea', function () {
    const $stay = $(this).closest('.ukiyo-repeater-item--stay');
    updateStaySummary($stay);
    updatePlaceSummary($stay.closest('.ukiyo-itinerary-place'));
  });

  $(document).on('input change', '.ukiyo-day-number, .ukiyo-day-title', function () {
    updateDaySummary($(this).closest('.ukiyo-repeater-item--nested'));
  });

  $(document).on('input change', '.ukiyo-repeater-item--activity input, .ukiyo-repeater-item--activity textarea', function () {
    updateActivitySummary($(this).closest('.ukiyo-repeater-item--activity'));
  });

  $(document).on('click', '.ukiyo-close-panel', function (event) {
    event.preventDefault();

    const $details = $(this).closest('details');
    if ($details.length) {
      $details.prop('open', false);
    }
  });

  $(document).on('input', '#ukiyo-portal-user-search', function () {
    const query = String($(this).val() || '').toLowerCase();
    $('.ukiyo-user-item').each(function () {
      const haystack = String($(this).data('search') || '');
      $(this).toggle(haystack.indexOf(query) !== -1);
    });
  });

  $(document).on('change', '#ukiyo_portal_access_type', function () {
    updateProposalVisibility();
  });

  $(document).on('click', '.ukiyo-copy-link', function (event) {
    event.preventDefault();

    const $button = $(this);
    const $input = $button.closest('.ukiyo-inline-actions').find('[data-ukiyo-copy-source]').first();
    const value = String($input.val() || '');

    if (!value) {
      return;
    }

    const fallbackCopy = function () {
      $input.trigger('focus').trigger('select');
      document.execCommand('copy');
    };

    if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
      navigator.clipboard.writeText(value).then(function () {
        $button.text('Copiado');
        window.setTimeout(function () {
          $button.text('Copiar enlace');
        }, 1400);
      }).catch(fallbackCopy);
      return;
    }

    fallbackCopy();
  });

  $(document).on('click', '.ukiyo-regenerate-proposal-link', function (event) {
    event.preventDefault();

    const confirmed = window.confirm('Se va a generar un enlace nuevo y el actual dejará de funcionar. ¿Quieres continuar?');

    if (!confirmed) {
      return;
    }

    const $button = $(this);
    const $box = $button.closest('.ukiyo-link-box');
    const $flag = $box.find('[data-ukiyo-regenerate-token-input]').first();
    const $submit = $('#publish').first();

    if ($flag.length) {
      $flag.val('1');
    }

    $button.prop('disabled', true).text('Regenerando...');

    if ($submit.length) {
      $submit.trigger('click');
      return;
    }

    const $form = $('#post').first();

    if ($form.length) {
      $form.trigger('submit');
    }
  });

  $(document).on('click', '.ukiyo-portal-media', function (event) {
    event.preventDefault();

    const $button = $(this);
    const multiple = String($button.data('multiple')) === 'true';
    const library = $button.data('library');
    const $wrapper = $button.closest('.ukiyo-field');
    const $input = $wrapper.find('.ukiyo-media-input').first();
    const $imagePreview = $wrapper.find('.ukiyo-image-preview, .ukiyo-gallery-preview').first();
    const $filePreview = $wrapper.find('.ukiyo-file-preview').first();

    const frame = wp.media({
      title: multiple ? 'Seleccionar elementos' : 'Seleccionar elemento',
      button: { text: multiple ? 'Usar selección' : 'Usar elemento' },
      multiple: multiple,
      library: library ? { type: library } : {}
    });

    frame.on('select', function () {
      const attachments = frame.state().get('selection').toJSON();
      const ids = attachments.map(function (attachment) {
        return attachment.id;
      });

      $input.val(multiple ? ids.join(',') : (ids[0] || ''));

      if ($imagePreview.length) {
        renderImagePreview($imagePreview, attachments);
      }

      if ($filePreview.length) {
        renderFilePreview($filePreview, attachments);
      }
    });

    frame.open();
  });

  $(document).on('click', '.ukiyo-clear-media', function (event) {
    event.preventDefault();
    const $wrapper = $(this).closest('.ukiyo-field');
    $wrapper.find('.ukiyo-media-input').val('');
    $wrapper.find('.ukiyo-image-preview, .ukiyo-gallery-preview, .ukiyo-file-preview').empty();
  });

  $(document).on('input change', '[data-ukiyo-email-composer] [data-email-html], [data-ukiyo-email-composer] [data-email-token]', function () {
    syncEmailPreview($(this).closest('[data-ukiyo-email-composer]'));
  });

  $(document).on('click', '.ukiyo-map-points-search-button', function (event) {
    event.preventDefault();

    const config = window.ukiyoPortalAdmin || {};
    const $button = $(this);
    const $builder = $button.closest('[data-map-points-builder]');
    const $place = $button.closest('.ukiyo-itinerary-place');
    const $query = $builder.find('.ukiyo-map-points-query').first();
    const query = String($query.val() || '').trim();
    const builderContext = String($builder.data('mapPointsContext') || '').trim();
    const destinationContext = String($('#ukiyo_portal_destination').val() || '').trim();
    const placeContext = builderContext === 'route'
      ? destinationContext
      : String($place.find('.ukiyo-place-name').first().val() || '').trim();

    if (!query) {
      $query.trigger('focus');
      return;
    }

    if (!config.ajaxUrl || !config.nonce || !config.placesApiConfigured) {
      window.alert('Falta configurar la API de Google Places.');
      return;
    }

    const originalLabel = $button.text();
    $button.prop('disabled', true).text('Buscando...');
    renderMapPointSearchStatus($builder, 'Buscando lugares...');

    $.post(config.ajaxUrl, {
      action: 'ukiyo_portal_search_google_places',
      nonce: config.nonce,
      query: query,
      place_context: placeContext
    }).done(function (response) {
      if (!response || !response.success || !response.data) {
        const message = response && response.data && response.data.message ? response.data.message : 'No se han podido recuperar resultados.';
        window.alert(message);
        return;
      }

      renderMapPointSearchResults($builder, response.data.results || []);
    }).fail(function (xhr) {
      const message = xhr && xhr.responseJSON && xhr.responseJSON.data && xhr.responseJSON.data.message
        ? xhr.responseJSON.data.message
        : 'No se han podido recuperar resultados.';
      window.alert(message);
    }).always(function () {
      $button.prop('disabled', false).text(originalLabel);
    });
  });

  $(document).on('keydown', '.ukiyo-map-points-query', function (event) {
    if (event.key !== 'Enter') {
      return;
    }

    event.preventDefault();
    $(this).closest('[data-map-points-builder]').find('.ukiyo-map-points-search-button').first().trigger('click');
  });

  $(document).on('click', '.ukiyo-map-point-add', function (event) {
    event.preventDefault();

    const $button = $(this);
    const point = $button.data('mapPoint') || {};
    const $field = $button.closest('.ukiyo-map-points-field');
    const $place = $button.closest('.ukiyo-itinerary-place');
    const $textarea = $field.length
      ? $field.find('.ukiyo-map-points-textarea').first()
      : $place.find('.ukiyo-map-points-textarea').first();

    appendMapPointToTextarea($textarea, point);
    $button.text('Añadido').prop('disabled', true);
  });

  $(document).on('click', '.ukiyo-google-maps-autofill', function (event) {
    event.preventDefault();

    const config = window.ukiyoPortalAdmin || {};
    const $button = $(this);
    const context = String($button.data('autofillContext') || 'recommendation');
    const $row = context === 'accommodation'
      ? $button.closest('.ukiyo-repeater-item--stay')
      : $button.closest('.ukiyo-repeater-item');
    const $urlField = $row.find('.ukiyo-google-maps-url').first();
    const $nameField = context === 'accommodation'
      ? $row.find('.ukiyo-place-accommodation').first()
      : (context === 'activity'
        ? $row.find('.ukiyo-day-title').first()
        : $row.find('[name$="[name]"]').first());
    const url = String($urlField.val() || '').trim();
    const fallbackName = String($nameField.val() || '').trim();

    if (!url) {
      window.alert('Pega primero un enlace de Google Maps.');
      return;
    }

    if (!config.ajaxUrl || !config.nonce || !config.placesApiConfigured) {
      window.alert('Falta configurar la API de Google Places.');
      return;
    }

    const originalLabel = $button.text();
    $button.prop('disabled', true).text('Buscando...');

    $.post(config.ajaxUrl, {
      action: 'ukiyo_portal_autofill_google_place',
      nonce: config.nonce,
      google_maps_url: url,
      fallback_name: fallbackName
    }).done(function (response) {
      if (!response || !response.success || !response.data) {
        const message = response && response.data && response.data.message ? response.data.message : 'No se han podido recuperar los datos de Google.';
        window.alert(message);
        return;
      }

      const data = response.data;
      const setFieldValue = function (fieldName, value) {
        const $field = $row.find('[name$="[' + fieldName + ']"]').first();
        if ($field.length && value) {
          $field.val(value);
        }
      };

      if (context === 'recommendation') {
        setFieldValue('name', data.name || '');
        setFieldValue('rating', data.rating || '');
        setFieldValue('url', data.url || url);

        const $ctaField = $row.find('[name$="[cta_label]"]').first();
        if ($ctaField.length && !$ctaField.val()) {
          $ctaField.val('Abrir en Google Maps');
        }
      } else if (context === 'accommodation') {
        const $accommodationName = $row.find('.ukiyo-place-accommodation').first();
        const $ratingField = $row.find('[name$="[rating]"]').first();
        const $sourceField = $row.find('[name$="[rating_source]"]').first();
        const $mapsField = $row.find('.ukiyo-accommodation-maps-url').first();

        if ($accommodationName.length && data.name) {
          $accommodationName.val(data.name);
        }

        if ($ratingField.length && data.rating) {
          $ratingField.val(data.rating);
        }

        if ($sourceField.length && !$sourceField.val()) {
          $sourceField.val('Google');
        }

        if ($mapsField.length && (data.url || url)) {
          $mapsField.val(data.url || url);
        }
      } else if (context === 'activity') {
        const $titleField = $row.find('.ukiyo-day-title').first();
        const $linkField = $row.find('.ukiyo-activity-maps-url').first();

        if ($titleField.length && (!$titleField.val() || data.name)) {
          $titleField.val(data.name || $titleField.val());
        }

        if ($linkField.length && (data.url || url)) {
          $linkField.val(data.url || url);
        }
      } else if (context === 'day-location') {
        const $locationField = $row.find('[name$="[location_name]"]').first();
        const $addressField = $row.find('[name$="[location_address]"]').first();
        const $linkField = $row.find('.ukiyo-day-location-maps-url').first();
        const $latField = $row.find('.ukiyo-location-lat').first();
        const $lngField = $row.find('.ukiyo-location-lng').first();

        if ($locationField.length && data.name) {
          $locationField.val(data.name);
        }

        if ($addressField.length && data.address) {
          $addressField.val(data.address);
        }

        if ($linkField.length && (data.url || url)) {
          $linkField.val(data.url || url);
        }

        if ($latField.length && data.lat) {
          $latField.val(data.lat);
        }

        if ($lngField.length && data.lng) {
          $lngField.val(data.lng);
        }
      } else if (context === 'activity-item') {
        const $titleField = $row.find('[name$="[title]"]').first();
        const $locationField = $row.find('[name$="[location_name]"]').first();
        const $addressField = $row.find('[name$="[location_address]"]').first();
        const $linkField = $row.find('.ukiyo-activity-item-maps-url').first();
        const $latField = $row.find('.ukiyo-map-lat').first();
        const $lngField = $row.find('.ukiyo-map-lng').first();

        if ($titleField.length && (!$titleField.val() || data.name)) {
          $titleField.val(data.name || $titleField.val());
        }

        if ($locationField.length && data.name) {
          $locationField.val(data.name);
        }

        if ($addressField.length && data.address) {
          $addressField.val(data.address);
        }

        if ($linkField.length && (data.url || url)) {
          $linkField.val(data.url || url);
        }

        if ($latField.length && data.lat) {
          $latField.val(data.lat);
        }

        if ($lngField.length && data.lng) {
          $lngField.val(data.lng);
        }
      }

      updateAllSummaries($row);
    }).fail(function (xhr) {
      const message = xhr && xhr.responseJSON && xhr.responseJSON.data && xhr.responseJSON.data.message
        ? xhr.responseJSON.data.message
        : 'No se han podido recuperar los datos de Google.';
      window.alert(message);
    }).always(function () {
      $button.prop('disabled', false).text(originalLabel);
    });
  });
});
