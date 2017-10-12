<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php

    if(empty($_GET['email'])){
        $email=null;}
    else{
        $email= $_GET['email'];
    }
    if(empty($_GET['category'])){
        $category = null;
    }
    else{
        $category = $_GET['category'];
    }
    if(empty($_GET['Sort'])){
        $Sort = null;
    }
    else{
        $Sort = $_GET['Sort'];
    }
	if(empty($_GET['Sortby'])){
        $SortBy = null;
    }
    else{
        $SortBy = $_GET['Sortby'];
    }
	
    // permalinks
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
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><h1>Plocket</h1></a>
                </div>
                <ul class="nav">
                    <li class="active"><a href="#"> Home </a></li>
                    <li><a href="Login.PHP"> Login Page </a></li>
                    <li><a href="#"> Page 2 </a></li>
                    <li><a href="add.php"> Add Item</a></li>
                </ul>

            </div>
        </nav>


        <form class="search" action="index.PHP" method="GET">
            <input class="searchTerm" type="search" name="query" placeholder="Search for something" />
            <select id="mySelect" name="category">
                <option value="Fordon">Fordon</option>
                <option value="För Hemmet">För Hemmet</option>
                <option value="Personligt">Personligt</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Fritid Och Hobby">Fritid Och Hobby</option>
                <option value="Affärsverksamhet">Affärsverksamhet</option>
            </select>
			<select name="Sort">
                <option value="ASC">Ascending</option>
                <option value="Desc">Descending</option>
            </select>
			<select name="Sortby">
                <option value="Price">Price</option>
                <option value="date">Date</option>
            </select>
            <input class="searchButton" type="submit">
            <input type="hidden" name="email" value="<?php echo $email?>">
        </form>


        <div id="content">
            <div class="well">
                <table class="table">
                    <tr> <td>Title</td> <td>Email</td> <td>Telephone</td> <td>Name</td> <td>Category</td> <td>Price</td> <td>Date Of Upload </td> </tr>

                    <?php

                    if(isset($_GET['query']))
                    {
                        $query = $_GET['query'];
                    }
                    else
                    {
                        $query = null;
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
					if(isset($_GET['Sort'])){
						$Sort = $_GET['Sort'];
					}
					else{
						$Sort = null;
					}
					if(isset($_GET['Sortby'])){
						$SortBy = $_GET['Sortby'];
					}
					else{
						$SortBy = null;
			    	}

                    $statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')  
                                                          ORDER BY '%$SortBy%' '%$Sort%' ");
                    $statement ->bindParam(':email', $email);
                    $statement ->execute();

                        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                            $id = "annons.php/?id=".$row['ID'];
                            echo "<tr>";
                            echo "<td><a href='{$id}'>{$row['title']}</a></td>";
                            echo "<td><a href='?email={$row['email']}'>{$row['email']}</td>";
                            echo '<td>'.$row['telnr'].'</td>';
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['category']}</td>";
                            echo '<td>'.$row['price'].'</td>';
                            echo '<td>'.$row['date'].'</td>';
                        }

                        echo ("</tr>");
                    ?>
                </table>
            </div>

            <div class="well">
            <footer> footer</footer>
            </div>

        </div>
    </div>
</body>
