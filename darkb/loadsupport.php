<?php
/**
 * help.php - Displays help page.
 *
 * Prints a very simple page and includes
 * page content or a string from elsewhere.
 * Usually this will appear in a popup
 * See {@link helpbutton()} in {@link lib/moodlelib.php}
 *
 * @author Martin Dougiamas
 * @version $Id: help.php 68 2009-07-31 18:23:01Z dlandau $
 * @package moodlecore
 */
require_once('../../config.php');
if (isguest()) {
     echo "<ul><li>Please login.</li></ul>";
     exit();
     }
   
?>


<ul>
<li><b>Shortcut Keys</b></li>
<li>Ctrl + m = Open Messages Window</li>
<li>Ctrl + h = Return to moodle homepage</li>
<li>Ctrl + e = toggle editing on/off</li>
<li>Ctrl + b = Scroll window to bottom of page</li>
<li>Ctrl + g = Scroll window to top of page</li>
<li>Ctrl + s = Scroll window to current topic</li>
</ul>
<?php
 if (isadmin()) {
     echo"
<ul>
<li><b>Admin Shortcut Keys</b></li>
<li>Ctrl + shift + l = Open live logs</li>
<li>Ctrl + shift + u = Search Users</li>
<li>Ctrl + shift  + n = Notifications</li>
<li>Ctrl + shift + m = Manage Modules</li>
<li>Ctrl + shift + b = Manage Blocks</li>
</ul>
";
}
?>