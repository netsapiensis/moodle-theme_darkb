<?php

function darkb_process_css($css, $theme) {

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