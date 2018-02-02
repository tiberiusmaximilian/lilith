<?php
require_once 'inc/session.php';

echo '<html>';
require_once 'inc/parts.php';
echo '<head>';
print_headers();
echo '</head><body>';
if (isset($_SESSION['nick'])) {
    // go on with the usual interaction
} else {
    $log[] = 'no nick in session';
    // login?
    $adminFile = 'admin.txt';
    if (file_exists($filename)) {
        // written, hence login
    } else {
        $log[]='going setup';
        require_once 'inc/setup.php';
    }
}
echo '</body></html>';

