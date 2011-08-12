<?php

 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Background colour setting
    $name = 'theme_darkb/backgroundcolor';
    $title = get_string('backgroundcolor','theme_darkb');
    $description = get_string('backgroundcolordesc', 'theme_darkb');
    $default = '#F7F6F1';
    $previewconfig = array('selector'=>'.block .content', 'style'=>'backgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $settings->add($setting);
    
    // Logo file setting
    $name = 'theme_darkb/logo';
    $title = get_string('logo','theme_darkb');
    $description = get_string('logodesc', 'theme_darkb');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);
    
    // Block region width
    $name = 'theme_darkb/regionwidth';
    $title = get_string('regionwidth','theme_darkb');
    $description = get_string('regionwidthdesc', 'theme_darkb');
    $default = 200;
    $choices = array(150=>'150px', 170=>'170px', 200=>'200px', 240=>'240px', 290=>'290px', 350=>'350px', 420=>'420px');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
    
    // alwayslangmenu setting
    $name = 'theme_darkb/alwayslangmenu';
    $title = get_string('alwayslangmenu','theme_darkb');
    $description = get_string('alwayslangmenudesc', 'theme_darkb');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $settings->add($setting);
    
    // Foot note setting
    $name = 'theme_darkb/footnote';
    $title = get_string('footnote','theme_darkb');
    $description = get_string('footnotedesc', 'theme_darkb');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

    // Custom CSS file
    $name = 'theme_darkb/customcss';
    $title = get_string('customcss','theme_darkb');
    $description = get_string('customcssdesc', 'theme_darkb');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $settings->add($setting);

// link color setting
	$name = 'theme_darkb/linkcolor';
	$title = get_string('linkcolor','theme_darkb');
	$description = get_string('linkcolordesc', 'theme_darkb');
	$default = '#113759';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

// main color setting
	$name = 'theme_darkb/maincolor';
	$title = get_string('maincolor','theme_darkb');
	$description = get_string('maincolordesc', 'theme_darkb');
	$default = '#0a1f33';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);


}