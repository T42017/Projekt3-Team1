<!DOCTYPE html>

<meta charset = "utf-8">
<?php
$db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<html>
<body class="clearfix">

<header id="header">

    <div class="max">
        <div class="logo">
            <h1><a href="/teamproject3/">Plocket</a></h1>
        </div>


        <nav class="section" id="nav"><a href="Login.PHP"> Login </a>  <a href="add.php"> Add</a></nav>
    </div>
</header>

    <div id = "main" class="wrapper clearfix">


        <div id="content-big">
            <div class="article clearfix">
                <form action="" method="post">
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
                                <input name ="email" type="email" required>
                            </div>
                            <div class="col">
                                <input name ="phone" type="text" pattern="[0-9- ]+" required>
                            </div>
                        </div>

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
                                <input name="name" type="text" pattern="[a-zA-Z ]+" required>
                            </div>
                            <div class="col">
                                <input name="title" type="text" pattern="[a-zA-Z0-9_- ]+" required>
                            </div>
                        </div>

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
                                <input name="desc" type="text" pattern="[a-zA-Z0-9_- ]+" required>
                            </div>
                            <div class="col">
                                <input name="price" type="text"pattern="[0-9,. +" required>
                            </div>

                        </div>

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
                                <input name="password" type="text" pattern="[0-9a-zA-Z_]+" required>

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


                    </div>

                    <button class ="float-right"type="submit">Send</button>

                </form>

            </div>

        </div>
    </div>


</body>
<footer class="fixed-bottom"> footer</footer>




</html>



<?php

if((empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['name']) or empty($_POST['title']) or empty($_POST['category']) or empty($_POST['desc']) or empty($_POST['price']))){
}
else{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $password = $_POST['password'];
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $date = date("Y-m-d", time());
    $db->query("INSERT INTO `annons` (`ID`, `email`, `telnr`, `name`, `title`, `category`, `description`, `picture`, `price`, `date`, `password`) 
                      VALUES (NULL, '$email', '$phone', '$name', '$title', '$category', '$desc', 'jpg.png', '$price', '$date', '$password')");
}
?>