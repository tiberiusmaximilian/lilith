<?php
function render($name){
   $str=file_get_contents($name);
    
    $str2=preg_replace_callback('~\{\$([_[:alnum:]]+)\}~', function($m){
//         echo 'have match '.$m[1];
        if(isset($GLOBALS[$m[1]]))
            return $GLOBALS[$m[1]];
        else return $m[1];
    }, $str);
    echo $str2;
}