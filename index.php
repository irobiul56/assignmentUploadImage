<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">

</head>
<body>
    
<?php

/**
 * Upload form submit
 */

 if (isset($_POST['upload'])) {
    $file =  $_FILES['photo'];
  
    //get file info

    $file_name = time(). '_'. rand() . '_' . $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_type = $file['type'];

    if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/png' || $file_type =='image/gif') {
        move_uploaded_file($file_tmp_name, 'photos/' .$file_name );
        $msg = "<p class = \" alert alert-success\">Image Uploaded success</p>";
    }else{
        $msg = "<p class = \" alert alert-danger\">Invalid image file format</p>";
    }
 }



?>





<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <?php
                    echo  $msg ?? '';
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="my-3">
                            <div class="file-content">
                            <input name="photo" type="file" id="fileupload">
                            <label for="fileupload"> <img src="https://scontent.fdac5-1.fna.fbcdn.net/v/t39.30808-6/276144091_10222041538407285_5936786730072045721_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=5cd70e&_nc_eui2=AeELojFw6DgH-V73pxrSFSQbXM9NuZzX9Y9cz025nNf1j96ARDqDVO--_CSv1CRKl2hB0DJyaKjK8H78yheDwa4N&_nc_ohc=CzPhO7lPv20AX_wkDF1&_nc_ht=scontent.fdac5-1.fna&oh=00_AT_mn0hqXoUFELpRb48gqvBXP2cC5Rh59-Fyf4WXWfYekA&oe=624E4E52" alt=""></label>
                            </div>
                        </div>

                        <div class="preview">
                            <img class= "shadow" id="preview_photo" src="" alt="">
                        </div>
                        <div class="my-3">
                            <input name="upload" class="btn btn-primary" type="submit" value="Upload Photo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

$('#fileupload').change(function(e){
    $('#preview_photo').show();
    let file = URL.createObjectURL(e.target.files[0]);

    $('#preview_photo').attr('src', file);
})

</script>

</body>
</html>