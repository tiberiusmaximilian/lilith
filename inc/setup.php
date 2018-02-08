<?php
$log[] = 'setup.php';

function removeDir($name){
   $handle=opendir($name);
   /* This is the correct way to loop over the directory. */
   while (false !== ($entry = readdir($handle))) {
       if($entry[0]=='.')
           continue;
       $entry=$name.'/'.$entry;
       echo $entry.' ';
       if(is_dir($entry)){
           removeDir($entry);
       }else {
           unlink($entry);
       }
       
   }
   closedir($handle);
   rmdir($name);
}

function makeData()
{
    global $dataDir;
    echo '<ol>';
    echo '<li>'.$dataDir.' directory</li>';
    if (is_dir($dataDir)) {
        echo '<li>data directory exists</li>';
        removeDir($dataDir);
        
    } 
    
    {
        mkdir($dataDir, 0777, false) || die('no directory');
        echo '<li>data directory created</li>';
    }
    if (function_exists('posix_mkfifo')) {
        echo '<li>creating fifo</li>';
        posix_mkfifo('data/pipe', 0777) || die('couldn\'t create pipe');
        echo '<li>pipe created</li>';
    } else {
        echo '<li>function for creating pipe does not exist - install the posix extensions</li>';
    }
    
    echo '</ol>';
}

function doSetup()
{
    global $adminFile;
    if (isset($_POST['adminName'])) {
        makeData();
        file_put_contents($adminFile, $_POST['adminName']);
    } else {
        echo '<div id="centerbox"><h4>Enter the nickname of the first admin</h4><form method="post">' . '<input type="text" name="adminName" /></form> </div>';
    }
}