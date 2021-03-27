<?php 

    $zip = new ZipArchive;
    $file = $zip->open('images2.zip');
    // Zip File Name
    if ($file === TRUE) {
  
        // Unzip Path
        $zip->extractTo('C:/wamp64/www/dx-intern-assessment/Assessments/2021/upload-extract-display/');
        $file = $zip->close('images2.zip');
        echo 'Unzipped Process Successful!';
    } 
    else {
    echo 'Unzipped Process failed';
    }

?>