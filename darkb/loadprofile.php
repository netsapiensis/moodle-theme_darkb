
<?php
 require_once('../../config.php');
 require_once($CFG->dirroot.'/user/profile/lib.php');
    require_once($CFG->dirroot.'/tag/lib.php');
 $id      = optional_param('id',     0,      PARAM_INT);   // user id
    $course  = optional_param('course', SITEID, PARAM_INT);   // course id (defaults to Site)
    $enable  = optional_param('enable', '');                  // enable email
    $disable = optional_param('disable', '');                 // disable email


if (isguest()) {
     echo "<ul><li>Please login to see your profile.</li></ul>";
     exit();
     
     }
    if (empty($id)) {         // See your own profile by default
        require_login();
        $id = $USER->id;
       
    }

    if (! $user = get_record("user", "id", $id) ) {
        error("No such user in this course");
    }

    if (! $course = get_record("course", "id", $course) ) {
        error("No such course id");
    }
    
    /// Make sure the current user is allowed to see this user

    if (empty($USER->id)) {
       $currentuser = false;
    } else {
       $currentuser = ($user->id == $USER->id);
    }

    if ($course->id == SITEID) {
        $coursecontext = get_context_instance(CONTEXT_SYSTEM);   // SYSTEM context
    } else {
        $coursecontext = get_context_instance(CONTEXT_COURSE, $course->id);   // Course context
    }
    $usercontext   = get_context_instance(CONTEXT_USER, $user->id);       // User context
    $systemcontext = get_context_instance(CONTEXT_SYSTEM);   // SYSTEM context

    if (!empty($CFG->forcelogin) || $course->id != SITEID) {
        // do not force parents to enrol
        if (!get_record('role_assignments', 'userid', $USER->id, 'contextid', $usercontext->id)) {
            require_login($course->id);
        }
    }

    if (!empty($CFG->forceloginforprofiles)) {
        require_login();
        if (isguest()) {
            redirect("$CFG->wwwroot/login/index.php");
        }
    }
    
     if ($course->id != SITEID) {
        $user->lastaccess = false;
        if ($lastaccess = get_record('user_lastaccess', 'userid', $user->id, 'courseid', $course->id)) {
            $user->lastaccess = $lastaccess->timeaccess;
        }
    }
    
    $lasta = userdate($user->lastaccess)."&nbsp; (".format_time(time() - $user->lastaccess).")";
    $fullname = fullname($user, has_capability('moodle/site:viewfullnames', $coursecontext));
    $emailf = $user->email;

    
    echo '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id.'"><img src="'.$CFG->wwwroot.'/user/pix.php?file=/'.$USER->id.'/f1.jpg"  title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" /></a>'; 

echo "Username:";
echo format_text($user->description, FORMAT_MOODLE);
    echo "Name: $fullname <br>Last access: $lasta 
    <br>$emailf<br>
    <a href=\"{$CFG->wwwroot}/user/edit.php\">update profile</a>
    ";
    
?>

