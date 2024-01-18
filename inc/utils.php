<?php

/** Theme Options Page */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/** Index for indicators in services cards */
function manage_service_card_index($action = 'get', $value = 0) {
    static $index = 0;
    if ($action === 'set') {
        $index = $value;
    }
    return str_pad($index, 2, "0", STR_PAD_LEFT);
}
/** Remove <p> tags from CF7 */
add_filter('wpcf7_autop_or_not', '__return_false');

/** Excerpt */
function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
