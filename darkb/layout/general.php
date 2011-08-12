<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$haslogo = (!empty($PAGE->theme->settings->logo));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}
if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">	
<div id="headerwrap"><div id="page-header"></div>
	<div id="headerinner">
	
	
	<?php if ($haslogo) {
                        echo html_writer::link(new moodle_url('/'), "<img src='".$PAGE->theme->settings->logo."' alt='logo' id='logo' />");
                    } else { ?>
                    <img src="<?php echo $OUTPUT->pix_url('logos', 'theme')?>" id="logo">
                    
             <?php       } ?>
	
	<?php if ($hascustommenu) { ?>
 					<div id="custommenu2"><div id="custommenu"><?php echo $custommenu; ?></div></div>
				<?php } ?>
	<div id="ebutton">
	<?php //if ($hasnavbar) { echo $PAGE->button; } ?>
	</div>			
		</div>
</div>					
<div id="jcontrols_button">
    <div class="jcontrolsleft">
        <?php if ($hasnavbar) { ?>
            <div class="navbar clearfix">
                <div class="breadcrumb"> <?php echo $OUTPUT->navbar();  ?></div>
            </div>
        <?php } ?>
    </div>
	<div class="jcontrolsright">
        <?php if ($hasheading) { 
            if (!empty($PAGE->theme->settings->alwayslangmenu)) {
                echo $OUTPUT->lang_menu();
            }
            echo $OUTPUT->login_info();
            echo $PAGE->headingmenu;
        } ?>
    </div>
</div>	
<div id="contentwrapper">	
	<!-- start OF moodle CONTENT -->
				<div id="page-content">
        			<div id="region-main-box">
            			<div id="region-post-box">
            
                				<div id="region-main-wrap">
                    				<div id="region-main">
                        				<div class="region-content">
         								<div id="mainpadder">
                            			<?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                            			</div>
                        				</div>
                    				</div>
                				</div>
                
                	<?php if ($hassidepre) { ?>
               		<div id="region-pre" class="block-region">
                    	<div class="region-content">
                   
        
                        	<?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    	</div>
                	</div>
                	<?php } ?>
                
                	<?php if ($hassidepost) { ?>
                 	<div id="region-post" class="block-region">
                    	<div class="region-content">
                   
                        	<?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    	</div>
                	</div>
                	<?php } ?>
                
            			</div>
        			</div>
   				 </div>
    <!-- END OF CONTENT --> 
</div>      

<br style="clear: both;"> 
 
<div id="footerwrapper">
    <div id="footerinner" style="text-align: center">
        <div id="footer-fix">
            <div id="page-footer"></div>
            <?php if ($hasfooter) { 
                echo "<div class='johndocsleft' style='float: none;'>";
                echo $OUTPUT->login_info();
                //echo $//OUTPUT->home_link();
                echo $OUTPUT->standard_footer_html();
                echo "</div>";
            ?>
            <div class="johndocs">
                <?php echo page_doc_link(get_string('moodledocslink')) ?>
            </div>
            <?php echo $footnote; ?>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
    
</div>
 
 
 
 </div>    		

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>