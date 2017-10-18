<!DOCTYPE html>

<meta charset = "utf-8">
<?php
$db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<body>
    <div id = "main">

        <header id="header">

            <div class="max">
                <div class="logo">
                    <h1><a href="/teamproject3/">Plocket</a></h1>
                </div>


                <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="#"> Page </a> <a href=""> Add</a></nav>
            </div>
        </header>

        <div class="small-article clearfix">
            <form action="add.php" method="post" enctype="multipart/form-data">
                 <div class ="float-left addForm container">

                     <div class="row">
                         <div class="col">
                             <label for="email">Email</label>

                         </div>
                         <div class="col">
                             <label for="phone">Phone</label>

                         </div>
                     </div>

                     <div class="row">
                         <div class="col">
                            <input name ="email" type="text" >
                         </div>
                         <div class="col">
                            <input name ="phone" type="text">
                         </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col">
                             <label for="name">Your name</label>

                         </div>
                         <div class="col">
                             <label for="title">Title of product</label>

                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                            <input name="name" type="text">
                         </div>
                         <div class="col">
                            <input name="title" type="text">
                         </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col">
                             <label for="desc">Description</label>
                         </div>
                         <div class="col">
                             <label for="price">Price</label>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col">
                            <input name="desc" type="text">
                         </div>
                         <div class="col">
                            <input name="price" type="text">
                         </div>

                     </div>
                     <br>
                     <div class="row">
                         <div class="col">

                             <label for="password">Password</label>
                         </div>
                         <div class="col">

                             <label for="category">Category</label>

                         </div>

                     </div>

                     <div class="row">
                         <div class="col">
                             <input name="password" type="text">

                         </div><div class="col">
                             <select name="category">
                                 <option value="Fordon">Fordon</option>
                                 <option value="För Hemmet">För Hemmet</option>
                                 <option value="Personligt">Personligt</option>
                                 <option value="Elektronik">Elektronik</option>
                                 <option value="Fritid Och Hobby">Fritid Och Hobby</option>
                                 <option value="Affärsverksamhet">Affärsverksamhet</option>
                             </select>
                         </div>
                     </div>
                    
                     <div class="row">
                        <div class="col">
                            <br>
                            <label for=""> Photo (png,jpg,jpeg) </label> 
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col">
                            
                                <input type="file" name="fileToUpload" id="fileToUpload">  
                            
                        </div>
                    </div>

                <div class ="float-right">
                    <input type="submit">
                </div>
            </form>
        </div>
        <footer> footer</footer>
    </div>

</body>




<?php

// UPLOAD PICTURE

    // get unique string
    function getGUID(){
        if (function_exists('com_create_guid'))
            {
                return com_create_guid();
            }
            else
            {
                   mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                   $charid = strtoupper(md5(uniqid(rand(), true)));
                   $hyphen = chr(45);// "-"
                   $uuid = chr(123)// "{"
                  .substr($charid, 0, 8).$hyphen
                  .substr($charid, 8, 4).$hyphen
                  .substr($charid,12, 4).$hyphen
                  .substr($charid,16, 4).$hyphen
                  .substr($charid,20,12)
                  .chr(125);// "}"
    
         return $uuid;
        }
    }

$guid = getGUID();




if($_SERVER['REQUEST_METHOD'] === "POST"){
       $info = $_FILES["fileToUpload"]["name"];
    //$ext = $info['extension'];
    $newname = $guid . ".png";
    $uploadOk = 1;
    $imageFileType = pathinfo($info,PATHINFO_EXTENSION);
    $target = 'uploads/'.$newname;
    
    
 
     //Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo '<script language="javascript">';
                echo 'alert("File size to big.")';
                echo '</script>';
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($uploadOk == 1 && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo '<script language="javascript">';
                echo 'alert("Only .jpg, .jpeg, & .png allowed.")';
                echo '</script>';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    //if ($uploadOk == 0) {
    //            echo '<script language="javascript">';
    //            echo 'alert("There was an error uploading your photo.")';
    //            echo '</script>';
    // if everything is ok, try to upload file
    //} 
    else {
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
        
                    echo '<script language="javascript">';
                    echo 'alert("Your photo has successfully been uploaded.")';
                    echo '</script>';
        } else {
                //echo '<script language="javascript">';
                //echo 'alert("There was an error uploading your photo.")';
                //echo '</script>';
        }
    }
}


if((empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['name']) or empty($_POST['title']) or empty($_POST['category']) or empty($_POST['desc']) or empty($_POST['price']))){
}
else{
    
    if($uploadOk == 1){
        $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $password = $_POST['password'];
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $picture = $newname;
    $date = date("Y-m-d", time());
    $db->query("INSERT INTO `annons` (`ID`, `email`, `telnr`, `name`, `title`, `category`, `description`, `picture`, `price`, `date`, `password`) 
                      VALUES (NULL, '$email', '$phone', '$name', '$title', '$category', '$desc', '$picture', '$price', '$date', '$password')");
    }
    else{
                echo '<script language="javascript">';
                echo 'alert("You must choose a picture!")';
                echo '</script>';
    }

    
}




 
?>