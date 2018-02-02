<?php
session_start([
    'gc_maxlifetime' => 86400,
]);
if(isset($_SESSION['count']))
    ++$_SESSION['count'];
    else
        $_SESSION['count']=1;
        $log[]='started';