<?php
require_once 'inc/template.php';

function doLogin()
{
    global $log;
    $log[] = 'doLogin called';
    if (isset($_POST['nickname']) && isset($_POST['passwd'])) {
        $log[] = 'checking username for login';
    } else {
        $log[] = 'presenting login screen';
        render('inc/login.html');
        // require 'inc/login.html';
    }
}