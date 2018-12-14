<?php
    include 'config.php';
    $currentDir = getcwd();
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    //$uploadPath = $currentDir ."\\uploads\\" . basename($_FILES["fileToUpload"]["name"]);
    //$escaped_path = str_replace('\\', '\\\\', $uploadPath);
    
    $path = "/admin-panel/uploads/" . basename($_FILES["fileToUpload"]["name"]);

    include('../include/session.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>ico2invest admin panel</title>
    <meta charset="utf-8">
    <!--Title-->
    <!--<link rel="icon" href="media/favicon.ico" sizes="16x16">-->
    <link rel="icon" href="../media/TitleLogo.png">
    <!--Meta`s-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/admin-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.menu-link').click(function(){
                $('.dashboard').slideToggle('slow');
            });
            $('.menu-link').click(function(){
                $('.menu-link').toggleClass('menu-link-active');
            });
        });
    </script>
</head>
<body>
<div id="container_upload_ico">
    <div class="header">
        <div class="header_left">
            <a href=""><img src="../media/logo.png" alt="logo" class="header_logo"></a>
        </div>
        <div class="header_right">
            <p class="show">Open Menu</p>
            <a class="menu-link">
                <span></span>
            </a>
        </div>
    </div>
    <div class="panel_body">
        <div class="dashboard">
            <ul class="menu">
                <a href="index"><li class="home">Home</li></a>
                <a href="update"><li class="update">Update</li></a>
                <a href="delete"><li class="delete">Delete/Restore</li></a>
                <a href="createNewICO"><li class="add">Add new ICO</li></a>
                <a href="../include/logout"><li class="add">Log Out</li></a>
            </ul>
        </div>
        <div class="text_area">
            <h1>You have created a new ICO</h1><br>
            <?php 
                if(isset($_POST["create_btn"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                if(isset($_POST['create_btn'])){
                    $name = $_POST['name'];
                    $api_id = $_POST['api_id'];
                    $custom_mark_id = $api_id;
                    $slug = $_POST['slug'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $ico_price = $_POST['ico_price'];
                    $current_price = $_POST['current_price'];
                    $ico_quantity = $_POST['ico_quantity'];
                    $description = $_POST['descrption'];
                    $short_description = $_POST['short_description'];
                    $positives = isset($_POST['positives'])?$_POST['positives']: NULL;
                    $negatives = isset($_POST['negatives'])?$_POST['negatives']: NULL;
                    //INSERT CUSTOM ICO
                    /*if(!empty($name) && !empty($api_id) && !empty($slug) && !empty($start_date) && !empty($end_date) && !empty($ico_price) && !empty($ico_quantity) && !empty($descrption) && !empty($short_description)){*/
                        $sql = "INSERT INTO ico_data(API_ID, NAME, ICO_SLUG, START_DATE, END_DATE, ICO_PRICE, ICO_QTY, CURRENT_PRICE, DESCRIPTION, SHORT_DESCRIPTION, ICO_STATUS) VALUES('$api_id', '$name', '$slug', '$start_date', '$end_date', '$ico_price', '$ico_quantity', '$current_price', '$description', '$short_description', 0)";

                        if(!mysqli_query($conn,$sql))
                        {
                            die('Error : ' . mysqli_error($conn));
                        }else{} 
                    /*}else{
                        echo "You have empty fields<br>";
                        echo $name . "<br>" . $api_id . "<br>" . $slug . "<br>" . $start_date . "<br>" . $end_date . "<br>" . $ico_price . "<br>" . $current_price . "<br>" . $ico_quantity . "<br>" . $description . "<br>" . $short_description . "<br>";
                    }*/

                    //INSERT POSITIVES
                    if($positives != NULL){
                        foreach($positives as $row => $col){
                            $sql = "INSERT INTO ico_marks(MARK_ID, STATUS, TITLE, INFO) VALUES('$custom_mark_id', '1', '".$col['title']."', '".$col['text']."')";

                            if(!mysqli_query($conn, $sql)){
                                die('Error : ' . mysqli_error($conn));
                            }else{}
                        }
                    }else {}

                    //INSERT POSITIVES
                    if($negatives != NULL){
                        foreach($negatives as $row => $col){
                            $sql = "INSERT INTO ico_marks(MARK_ID, STATUS, TITLE, INFO) VALUES('$custom_mark_id', '0', '".$col['title']."', '".$col['text']."')";

                            if(!mysqli_query($conn, $sql)){
                                die('Error : ' . mysqli_error($conn));
                            }else{}
                        }
                    }else {}

                    //INSERT IMAGE
                    $sql = "INSERT INTO ico_images(SLUG, URL) VALUES('$slug', '$path')";
                    if(!mysqli_query($conn,$sql))
                        {
                            die('Error : ' . mysqli_error($conn));
                        }else{}
                }
            ?>
        </div>
    </div>
</div>
<?php
    include '../include/footer.php';
?>
</body>
</html>