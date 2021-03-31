<?php 
// -------------------Extracting images from ZIP files ---------------------------------------------
if(isset($_POST["btn_zip"])){
    $zip = new ZipArchive; //Creates new ZipArchive object
    $filename = $_FILES["zip_file"]["name"];//Assign the filename to the $filename variable E.g. images.zip file
    $file = $zip->open($filename);//Open the file for reading
    
    if ($file === TRUE) {
        //Extract every file into the directory
        $zip->extractTo('C:/wamp64/www/dx-intern-assessment/Assessments/2021/upload-extract-display/imgupload/');
        //Close the ZipArchive
        $file = $zip->close($filename);
        
     
    }
    else {
    echo 'Unzipped Process failed';
    } 
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8d" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Engineering Internship Assessment</title>
  <meta name="description" content="The HTML5 Herald" />
  <meta name="author" content="Digi-X Internship Committee" />

  <link rel="stylesheet" href="style.css?v=1.0" />
  <link rel="stylesheet" href="custom.css?v=1.0" />
  
           
</head>

<body>

    <div class="top-wrapper">
        <img src="https://assets.website-files.com/5cd4f29af95bc7d8af794e0e/5cfe060171000aa66754447a_n-digi-x-logo-white-yellow-standard.svg" alt="digi-x logo" height="70" />
        <h1>Engineering Internship Assessment</h1>
    </div>

    <!-- DO NO REMOVE CODE STARTING HERE -->
    <div class="display-wrapper">
        <h2 style="margin-top:51px;">My images</h2>
        <div class="append-images-here">
            <p>No image found. Your extracted images should be here.</p>
            <!-- THE IMAGES SHOULD BE DISPLAYED INSIDE HERE -->
            <form method="post" enctype="multipart/form-data">
                <label>Upload ZIP file</label>
                <input type="file" name="zip_file"/>
                <input type="submit" name = "btn_zip" class="btn btn-info" value="Upload ZIP" />

                
                
                <br/>
            </form>
            <?php 
                    //-----------------------Reading and displaying images in the directory --------------------
                    $path = "imgupload/";
                    //Scan imgupload directory
                    $imgfiles = scandir($path);
                    //Iterate through each file in the directory
                    for($i = 0; $i < count($imgfiles); $i++){
                        if($imgfiles[$i] !='.' && $imgfiles[$i] !='..'){
                            //Fetching the data information e.g. extension
                            $imgfile = pathinfo($imgfiles[$i]);
                            $extension = $imgfile['extension'];
                            // Display images 
                            echo "<div style='padding:10px; float:left;'><img src='$path$imgfiles[$i]' style='width:200px;height:200px;'></div>";
                            
                            
                        }
                    }
                    
                ?>
            
        </div>
    </div>
    <!-- DO NO REMOVE CODE UNTIL HERE -->

</body>
</html>

