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

?>

<head>


</head>

<body>

<table>

    <tr> <td>Title</td> <td>Telephone</td> <td>Name</td> <td>Title</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>
    <?php

    if(isset($_GET['email']))
    {
        $email = $_GET['email'];

    }
    else
    {
        $email = null;
    }

    if(isset($_GET['name']))
    {
        $name = $_GET['name'];

    }
    else
    {
        $name = null;
    }

    if(isset($_GET['title']))
    {
        $title = $_GET['title'];

    }
    else
    {
        $title = null;
    }

    if(isset($_GET['category']))
    {
        $category = $_GET['category'];

    }
    else
    {
        $category = null;
    }

    $statement  = $db->prepare("SELECT * FROM annons WHERE Email LIKE '%$email%' 
                                AND Name LIKE '%$name%' 
                                AND Title LIKE '%$title%'
                                AND Category LIKE '%$category%'                              
                                ORDER BY date DESC");
    $statement ->bindParam(':email', $email);
    $statement ->execute();
	
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $id = "annons.php/?id=".$row['ID'];
        echo "<tr>";
        echo "<td><a href='{$id}'>{$row['title']}</a></td>";
        echo "<td>{$row['email']}</td>";
        echo '<td>'.$row['telnr'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['category'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td>'.$row['picture'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['date'].'</td>';
    }

    echo ("</tr>");
    ?>
</table>

<a href="add.php">Add Item</a>
</body>
