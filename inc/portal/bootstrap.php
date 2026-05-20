<?php
/**
 * Bootstrap del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/register-cpt.php';
require_once __DIR__ . '/clients.php';
require_once __DIR__ . '/emails.php';
require_once __DIR__ . '/importer.php';
require_once __DIR__ . '/manual-feedbacks.php';
require_once __DIR__ . '/feedback.php';
require_once __DIR__ . '/metaboxes.php';
require_once __DIR__ . '/save-meta.php';
require_once __DIR__ . '/routes.php';
require_once __DIR__ . '/access-control.php';
