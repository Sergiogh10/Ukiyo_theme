<?php
/**
 * Rank Math bridge for the UKIYO theme.
 *
 * The theme's own SEO layer (inc/seo.php) only renders when no SEO plugin is
 * active. This file applies the theme's indexing rules through Rank Math's
 * filters so they hold while the plugin is active too.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enforces the theme noindex rules over Rank Math's computed robots meta.
 *
 * Covers category/tag/date/author archives, the `destino` taxonomy archives,
 * legal pages and utility forms — even when a term or post carries an explicit
 * "index" robots meta in the database.
 */
function ukiyo_rank_math_robots( $robots ) {
    if ( function_exists( 'ukiyo_should_noindex_current_request' ) && ukiyo_should_noindex_current_request() ) {
        $robots = array_values( array_diff( (array) $robots, [ 'index' ] ) );
        $robots[] = 'noindex';

        if ( ! in_array( 'follow', $robots, true ) ) {
            $robots[] = 'follow';
        }
    }

    return $robots;
}
add_filter( 'rank_math/frontend/robots', 'ukiyo_rank_math_robots', 20 );

/**
 * Keeps noindexed taxonomies out of the Rank Math sitemap.
 *
 * Rank Math excludes a taxonomy when this filter returns true.
 */
function ukiyo_rank_math_sitemap_exclude_taxonomy( $exclude, $taxonomy ) {
    // `category` is intentionally indexable (serves /blog/{slug}/ topical hubs)
    // and must stay in the sitemap.
    if ( in_array( $taxonomy, [ 'post_tag', 'destino' ], true ) ) {
        return true;
    }

    return $exclude;
}
add_filter( 'rank_math/sitemap/exclude_taxonomy', 'ukiyo_rank_math_sitemap_exclude_taxonomy', 20, 2 );

/**
 * Lets the theme's SEO overrides win over Rank Math's auto title.
 *
 * Rank Math precomputes the page title from its own settings; this filter
 * substitutes it with the theme override when one exists so a single edit in
 * inc/seo.php is enough to change every relevant page title in production.
 */
function ukiyo_rank_math_title( $title ) {
    if ( ! function_exists( 'ukiyo_get_current_seo_override' ) ) {
        return $title;
    }

    $override = ukiyo_get_current_seo_override();
    if ( ! empty( $override['title'] ) ) {
        return $override['title'];
    }

    return $title;
}
add_filter( 'rank_math/frontend/title', 'ukiyo_rank_math_title', 20 );

/**
 * Lets the theme's SEO overrides win over Rank Math's auto description.
 */
function ukiyo_rank_math_description( $description ) {
    if ( ! function_exists( 'ukiyo_get_current_seo_override' ) ) {
        return $description;
    }

    $override = ukiyo_get_current_seo_override();
    if ( ! empty( $override['description'] ) ) {
        return $override['description'];
    }

    return $description;
}
add_filter( 'rank_math/frontend/description', 'ukiyo_rank_math_description', 20 );

/**
 * Forces Rank Math's WebPage node to use the theme title/description.
 *
 * Keeps the JSON-LD name aligned with the visible <title> tag so search
 * engines see one consistent identifier per page.
 */
function ukiyo_rank_math_jsonld_webpage_name( $data, $jsonld ) {
    if ( ! function_exists( 'ukiyo_get_current_seo_override' ) ) {
        return $data;
    }

    $override = ukiyo_get_current_seo_override();

    if ( empty( $override['title'] ) || empty( $data['WebPage'] ) || ! is_array( $data['WebPage'] ) ) {
        return $data;
    }

    $data['WebPage']['name'] = $override['title'];

    if ( ! empty( $override['description'] ) ) {
        $data['WebPage']['description'] = $override['description'];
    }

    return $data;
}
add_filter( 'rank_math/json_ld', 'ukiyo_rank_math_jsonld_webpage_name', 20, 2 );

/**
 * Ensures `category` is included in Rank Math's sitemap and indexable.
 *
 * Rank Math reads its own taxonomy settings before exposing them in the
 * sitemap index. Forcing `category.sitemap` and `category.robots` to "index"
 * here means the user does not need to flip these flags from the admin UI.
 */
function ukiyo_rank_math_force_category_sitemap( $value, $option ) {
    if ( 'titles' !== $option || ! is_array( $value ) ) {
        return $value;
    }

    $value['tax_category_add_meta_box'] = 'on';
    $value['tax_category_custom_robots'] = 'on';
    $value['tax_category_robots']        = [ 'index' ];
    $value['tax_category_sitemap']       = 'on';
    $value['category_archive_title']     = isset( $value['category_archive_title'] ) ? $value['category_archive_title'] : '%term% %sep% %sitename%';

    return $value;
}
add_filter( 'rank_math/admin/get_module_settings', 'ukiyo_rank_math_force_category_sitemap', 10, 2 );

/**
 * Forces `category` into the sitemap even if Rank Math's taxonomy setting is off.
 */
function ukiyo_rank_math_include_category_sitemap( $taxonomies ) {
    if ( is_array( $taxonomies ) && ! in_array( 'category', $taxonomies, true ) ) {
        $taxonomies[] = 'category';
    }

    return $taxonomies;
}
add_filter( 'rank_math/sitemap/enabled_taxonomies', 'ukiyo_rank_math_include_category_sitemap', 20 );
