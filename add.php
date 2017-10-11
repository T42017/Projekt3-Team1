<!DOCTYPE html>

<meta charset = "utf-8">
<?php
$db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<form action="" method="post">
    <label for="email">Email</label>
    <input name ="email" type="text" >

    <label for="phone">Phone</label>
    <input name ="phone" type="text">

    <label for="name">Your name</label>
    <input name="name" type="text">

    <label for="title">Title of product</label>
    <input name="title" type="text">

    <label for="category">Category</label>
    <select name="category">
        <option value="Fordon">Fordon</option>
        <option value="För Hemmet">För Hemmet</option>
        <option value="Personligt">Personligt</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Fritid Och Hobby">Fritid Och Hobby</option>
        <option value="Affärsverksamhet">Affärsverksamhet</option>
    </select>

    <label for="desc">Description</label>
    <input name="desc" type="text">

    <label for="price">Price</label>
    <input name="price" type="text">

    <input type="submit">
</form>


<?php


if((empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['name']) or empty($_POST['title']) or empty($_POST['category']) or empty($_POST['desc']) or empty($_POST['price']))){
}
else{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $date = date("Y-m-d", time());
    $db->query("INSERT INTO `annons` (`ID`, `email`, `telnr`, `name`, `title`, `category`, `description`, `picture`, `price`, `date`) 
                      VALUES (NULL, '$email', '$phone', '$name', '$title', '$category', '$desc', 'jpg.png', '$price', '$date')");
}
?>