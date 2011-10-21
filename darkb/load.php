<?php  // $Id: index.php 68 2009-07-31 18:23:01Z dlandau $

    // this is the 'my moodle' page

    require_once('../../config.php');
    require_once($CFG->libdir.'/blocklib.php');
    require_once($CFG->dirroot.'/course/lib.php');
    require_once($CFG->dirroot.'/my/pagelib.php');
    
   // require_login();
    
     if (isguest()) {
     echo "<ul><li>Please login to see your courses</li></ul>";
     exit();
     
     }
    
    
    function print_overviewmy($courses) {

    global $CFG, $USER;

    $htmlarray = array();
    if ($modules = get_records('modules')) {
        foreach ($modules as $mod) {
            if (file_exists(dirname(dirname(__FILE__)).'/mod/'.$mod->name.'/lib.php')) {
                include_once(dirname(dirname(__FILE__)).'/mod/'.$mod->name.'/lib.php');
                $fname = $mod->name.'_print_overview';
                if (function_exists($fname)) {
                    $fname($courses,$htmlarray);
                }
            }
        }
    }
  $countr = 0;
    foreach ($courses as $course) {
       // print_simple_box_start('center', '100%', '', 5, "coursebox");
      $countr++;
      
     
      
        echo "<div ><ul>";
     
        $linkcss = '';
        if (empty($course->visible)) {
            $linkcss = 'class="dimmed"';
        }
        print_heading('<li><a title="'. format_string($course->fullname).'" '.$linkcss.' href="'.$CFG->wwwroot.'/course/view.php?id='.$course->id.'">'. format_string($course->fullname).'</a></li>');
        
        if (array_key_exists($course->id,$htmlarray)) {
      
            foreach ($htmlarray[$course->id] as $modname => $html) {
           		
                echo $html;
            }
        }
        //print_simple_box_end();
        echo "</ul></div>";
        if($countr == 4 || $countr == 8 || $countr == 12 || $countr == 16 || $countr == 20) {
      echo "<div class='row'><ul style='width: 625px;'><li><hr></li></ul></div>";
      }
    }
}
    
    
    
    
    
    
     $courses_limit = 21;
    if (!empty($CFG->mycoursesperpage)) {
        $courses_limit = $CFG->mycoursesperpage;
    }
    $courses = get_my_courses($USER->id, 'visible DESC,sortorder ASC', '*', false, $courses_limit);
    $site = get_site();
    $course = $site; //just in case we need the old global $course hack

    if (array_key_exists($site->id,$courses)) {
        unset($courses[$site->id]);
    }

    foreach ($courses as $c) {
        if (isset($USER->lastcourseaccess[$c->id])) {
            $courses[$c->id]->lastaccess = $USER->lastcourseaccess[$c->id];
        } else {
            $courses[$c->id]->lastaccess = 0;
        }
    }
    
    if (empty($courses)) {
        print_simple_box(get_string('nocourses','my'),'center');
    } else {
        print_overviewmy($courses);
    }
    
    // if more than 20 courses
    if (count($courses) > 20) {
        echo '<br />...';  
    }
    ?>


