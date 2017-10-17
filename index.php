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
<head>

</head>

<body>
    <div id="main">
        <header id="header">

            <div class="max">
                <div class="logo">
                    <h1><a href="/teamproject3/">Plocket</a></h1>
                </div>

                <form class="search" action="index.PHP" method="GET">

                    <input class="searchTerm" type="search" name="query" placeholder="Search for something">

                    <input class="searchButton" type="submit">

                </form>

                <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="#"> Page </a> <a href="add.php"> Add</a></nav>
            </div>
        </header>

        <div class="sidebar">


            <a>Fordon</a>
            <a>För Hemmet</a>
            <a>Personligt</a>
            <a> Elektronik</a>
            <a> Fritid Och Hobby</a>
            <a> Affärsverksamhet</a>


        </div>


        <div id="content-small">

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
                                                          WHERE Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')");
                    $statement ->bindParam(':email', $email);
                    $statement ->execute();

                        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                            $id = "annons.php?id=".$row['ID'];

                            echo"
                                <div class='small-article'>
                                    <table class='table'>
                                         <tr> <td>Title</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> <td>Name</td> </tr>
                                
                                         <tr>
                                         <td><a href='{$id}'>{$row['title']}</a></td>
                                         <td>png.jpg</td>
                                         <td>{$row['price']}</td>
                                         <td>{$row['date']}</td>
                                         <td>{$row['name']}</td>
                                         </tr>
                                    </table>
                                </div>
                                    ";
                        }


                    ?>


            

        </div>

        <footer> footer</footer>

    </div>
</body>
</html>