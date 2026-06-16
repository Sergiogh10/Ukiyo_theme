<?php
/**
 * Category archive template.
 *
 * Delegates to home.php since the blog index already supports the
 * `is_category()` branch (filters, query, count). Keeping a single template
 * avoids duplicating the entire layout, hero CSS and JS reveal logic.
 */
require __DIR__ . '/home.php';
