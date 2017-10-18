<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="sliderstyle.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php
	
	$gid = $db->prepare("SELECT MAX(price) as max_price, MIN(price) as min_price FROM annons");
	$gid->execute();
	$row = $gid->fetch(PDO::FETCH_ASSOC);
	
	$maximumprice=$row["max_price"];
	$minimumprice=$row["min_price"];

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
        $sort = null;
    }
    else{
        $sort = $_GET['Sort'];
    }
	if(empty($_GET['query']))
    {
		$query = null;
    }
    else
    {
		$query = $_GET['query'];		
    }
	if(empty($_GET['max_price']))
    {
		$highprice= intval($maximumprice);
    }
    else
    {
		$highprice = intval($_GET['max_price']);		
    }
	if(empty($_GET['min_price']))
    {
		$lowprice = intval($minimumprice);
    }
    else
    {
		$lowprice =intval($_GET['min_price']);		
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


					<input type="hidden" name="category" value="<?php echo $category?>">
                    <input type="hidden" name="email" value="<?php echo $email?>">
					<input type="hidden" name="sort" value="<?php echo $sort?>">
					<input type="hidden" name="sortby" value="<?php echo $sortby?>">
                </form>
                <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="#"> Page </a> <a href="add.php"> Add</a></nav>
            </div>
        </header>

        <div class="sidebar">
		
            <a href="index.PHP?category=Fordon">Fordon</a><br>
            <a href="index.PHP?category=För Hemmet">För Hemmet</a><br>
            <a href="index.PHP?category=Personligt">Personligt</a><br>
            <a href="index.PHP?category=Elektronik">Elektronik</a><br>
            <a href="index.PHP?category=Fritid Och Hobby">Fritid Och Hobby</a><br>
            <a href="index.PHP?category=Affärsverksamhet">Affärsverksamhet</a><br>
			
		<form class="sort" action="index.PHP" method="GET">
		
		Från <input type="text" name="min_price" size=6> Sek till <input type="text" name="max_price" size=6> Sek
		 
		<select name="Sort">
			<option value="high"<?php if ($sort === "high") echo 'selected="selected"';?>>Högsta Pris</option>
			<option value="low"<?php if ($sort === "low") echo 'selected="selected"';?>>Lägsta Pris</option>
			<option value="new"<?php if ($sort === "new") echo 'selected="selected"';?>>Nyast</option>
			<option value="old"<?php if ($sort === "old") echo 'selected="selected"';?>>Äldst</option>
        </select>
		
		<input type="hidden" name="category" value="<?php echo $category?>">
        <input type="hidden" name="email" value="<?php echo $email?>">
		<input type="hidden" name="query" value="<?php echo $query?>">
		<input type="submit" value="sort">
		</form>
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
						$sort = $_GET['Sort'];
					}
					else{
						$sort = null;
					}
					if(isset($_GET['max_price'])){
							$highprice = intval($_GET['max_price']);	
					}
					else{
							$highprice= intval($maximumprice);
					}
					if(isset($_GET['min_price'])){
						$lowprice = intval($_GET['min_price']);	
					}
					else{
						$lowprice = intval($minimumprice);
					}
					
					var_dump($lowprice);
					var_dump($highprice);
                    if($sort==='high'){
						$statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')  AND price BETWEEN '$lowprice' AND '$highprice'
                                                          ORDER BY price DESC ");
						$statement ->execute();
					}
					else if($sort==='low'){
						$statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')  AND price BETWEEN '$lowprice' AND '$highprice'
                                                          ORDER BY price ASC ");
						$statement ->execute();
					}
					else if($sort==='new'){
						$statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')AND price BETWEEN '$lowprice' AND '$highprice'  
                                                          ORDER BY date DESC ");
                    $statement ->execute();
					
					}
					else if($sort==='old'){
						$statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')  AND price BETWEEN '$lowprice' AND '$highprice'
                                                          ORDER BY Date ASC ");
                    $statement ->execute();
					
					}
					else{
						$statement  = $db->prepare("SELECT * FROM annons 
                                                          WHERE Email LIKE '%$email%' 
                                                          AND Category LIKE '%$category%' 
                                                          AND (title LIKE '%$query%' OR name LIKE '%$query%')  AND price BETWEEN '$lowprice' AND '$highprice'
                                                          ORDER BY date DESC ");
                    $statement ->execute();
					}
					
				while($row = $statement->fetch(PDO::FETCH_ASSOC)){
					$id = "annons.php/?id=".$row['ID'];

					echo"
						<div class='small-article'>
							<table class='table'>
								 <tr> <td>Title</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>
						
								 <tr>
								 <td><a href='{$id}'>{$row['title']}</a></td>
								 <td>png.jpg</td>
								 <td>{$row['price']}</td>
								 <td>{$row['date']}</td>
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