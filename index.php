<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<head>


</head>

<body>
<form action="index.PHP" method="GET">
    <input type="search" name="query" />
	<select id="mySelect>
	<option value="Fordon">Fordon</option>
	<option value="För Hemmet">För Hemmet</option>
	<option value="Personligt">Personligt</option>
	<option value="Elektronik">Elektronik</option>
	<option value="Fritid Och Hobby">Fritid Och Hobby</option>
	<option value="Affärsverksamhet">Affärsverksamhet</option>
	</select>
</form>
<table>

    <tr> <td>Title</td> <td>Email</td> <td>Telephone</td> <td>Name</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>
    <?php
    
	
	
	
    if(isset($_GET['email']))
    {
        $email = $_GET['email'];

    }
	//else if($ null){}
    else
    {
        $email = null;
    }
    if(isset($_GET["category"]))
    {
        $category = $_GET['category'];

    }
    else
    {
        $category = null;
    }
	 if(isset($_GET['query']))
    {
		$category= $_GET['mySelect'];
        $query = $_GET['query'];

    }
    else
    {
        $query = null;
    }

    $statement  = $db->prepare("SELECT * FROM annons WHERE Category LIKE '%$category%' AND (title LIKE '%$query%' OR name LIKE '%$query%' OR description LIKE '%$query%')  ORDER BY date DESC");
    $statement ->bindParam(':email', $email);
    $statement ->execute();
	
	
	
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        echo ("<tr>");
	   echo '<td>'.$row['title'].'</td>';
        echo "<td><a href='?email={$row['email']}'>{$row['email']}</td>";
        echo '<td>'.$row['telnr'].'</td>';
        echo "<td>{$row['name']}</td>";
        echo "<td><a href='?category={$row['category']}'>{$row['category']}</td>";
        echo '<td>'.$row['description'].'</td>';
        echo '<td>'.$row['picture'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['date'].'</td>';


    }
	
	
    echo ("</tr>");
    ?>
</table>

</body>
