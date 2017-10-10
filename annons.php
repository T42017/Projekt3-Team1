<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
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

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

?>
<body>
<table>

<tr> <td>Title</td> <td>Telephone</td> <td>Name</td> <td>Title</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>

<?php

$statement  = $db->prepare("SELECT * FROM annons WHERE ID = $id");
$statement ->bindParam(':email', $email);
$statement ->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['email']}</td>";
    echo '<td>'.$row['telnr'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['category'].'</td>';
    echo '<td>'.$row['description'].'</td>';
    echo '<td>'.$row['picture'].'</td>';
    echo '<td>'.$row['price'].'</td>';
    echo '<td>'.$row['date'].'</td>';
}

?>




</table>
    </body>