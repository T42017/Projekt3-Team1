<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php

function GetPermaLink($skip = 0)
{
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);

    if(empty($elements[0]))
    {
        return null;
    }
    else
    {
        for($i=0; $i< $skip;$i++)
            array_shift($elements);

        $req = array_shift($elements);
        return strtolower($req);
    }
}



?>

<body>
    <div id="main">

        <div id="header">

            <div class="max">
                <div class="logo">
                    <h1><a href="/teamproject3/">Plocket</a></h1>
                </div>


                <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="#"> Page </a> <a href="add.php"> Add</a></nav>
            </div>
        </div>

        <div id="content-big">
            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            $statement  = $db->prepare("SELECT * FROM annons WHERE ID = $id");
            $statement ->execute();

            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                echo"      
                    <div class='big-article'>           
                            <table class='table'>
                            <tr> <td>Title</td> <td>Telephone</td> <td>Name</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>
                            <tr>
                            <td>{$row['title']}</a></td>
                            <td>{$row['telnr']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['category']}</td>
                            <td>{$row['description']}</td>
                            <td>png.jpg</td>
                            <td>{$row['price']}</td>
                            <td>{$row['date']}</td>
                            </tr>
                       </table>
                       </div>";
            }

            ?>


        </div>
<footer>footer</footer>
    </div>
 </body>