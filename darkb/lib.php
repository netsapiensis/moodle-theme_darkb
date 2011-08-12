<?php

function darkb_process_css($css, $theme) {
    
    if (!empty($theme->settings->backgroundcolor)) {
        $backgroundcolor = $theme->settings->backgroundcolor;
    } else {
        $backgroundcolor = null;
    }
    $css = darkb_set_backgroundcolor($css, $backgroundcolor);
    
    // Set the region width
    if (!empty($theme->settings->regionwidth)) {
        $regionwidth = $theme->settings->regionwidth;
    } else {
        $regionwidth = null;
    }
    $css = darkb_set_regionwidth($css, $regionwidth);
    
    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = darkb_set_linkcolor($css, $linkcolor);
    
     // Set the main color
    if (!empty($theme->settings->maincolor)) {
        $maincolor = $theme->settings->maincolor;
    } else {
        $maincolor = null;
    }
    $css = darkb_set_maincolor($css, $maincolor);
    
    // Set the custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = darkb_set_customcss($css, $customcss);
    
    
    return $css;
}



function darkb_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#113759';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function darkb_set_maincolor($css, $maincolor) {
    $tag = '[[setting:maincolor]]';
    $replacement = $maincolor;
    if (is_null($replacement)) {
        $replacement = '#0a1f33';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}


/**
 * Sets the background colour variable in CSS
 *
 * @param string $css
 * @param mixed $backgroundcolor
 * @return string
 */
function darkb_set_backgroundcolor($css, $backgroundcolor) {
    $tag = '[[setting:backgroundcolor]]';
    $replacement = $backgroundcolor;
    if (is_null($replacement)) {
        $replacement = '#F7F6F1';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}


/**
 * Sets the region width variable in CSS
 *
 * @param string $css
 * @param mixed $regionwidth
 * @return string
 */
function darkb_set_regionwidth($css, $regionwidth) {
    $tag = '[[setting:regionwidth]]';
    $doubletag = '[[setting:regionwidthdouble]]';
    $replacement = $regionwidth;
    if (is_null($replacement)) {
        $replacement = 200;
    }
    $css = str_replace($tag, $replacement.'px', $css);
    $css = str_replace($doubletag, ($replacement*2).'px', $css);
    $css = str_replace($tag, ($replacement+10).'px', $css);
    return $css;
}


/**
 * Sets the custom css variable in CSS
 *
 * @param string $css
 * @param mixed $customcss
 * @return string
 */
function darkb_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
