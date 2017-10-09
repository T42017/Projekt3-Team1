<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<head>


</head>

<body>

<table>

    <tr>  <td>ID</td> <td>Email</td> <td>Tel</td> <td>Name</td> <td>Title</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td>  </tr>
    <?php
    $statement = $db->query('SELECT * FROM annons');
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        echo ("<tr>");
        foreach ($row as $item){
            echo ("<td>$item</td>");
        }


    }
    echo ("</tr>");
    ?>
</table>

</body>
