<?php
require_once 'inc/session.php';

echo '<html>';
require_once 'inc/parts.php';
echo '<head>';
print_headers();
echo '</head><body>';
$dataDir='data';
if (isset($_SESSION['nick'])) {
    // go on with the usual interaction
} else {
    $log[] = 'no nick in session';
    // login?
    $adminFile = 'data/admin.txt';
    if (file_exists($adminFile)) {
        // written, hence login
        $log[] = 'got a designated admin';
        require_once 'inc/login.php';
        doLogin();
    } else {
        $log[] = 'going setup';
        require_once 'inc/setup.php';
        doSetup();
    }
}
{
    // debug the log
    echo '<div id="log"><h5>Log:</h5><ol>';
    foreach ($log as $key => $val)
        echo '<li>' . $val . '</li>';
    echo '</ol></div>';
}
echo '</body></html>';

