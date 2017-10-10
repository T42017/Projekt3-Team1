<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<head>


</head>
<body>
<div id="main">
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><h1>Blocket</h1></a>
        </div>
        <ul class="nav">
          <li class="active"><a href="#"> Home </a></li>
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>

      </div>
    </nav>
    <form class="search" action="index.php">
            <input class="searchTerm" placeholder="Enter your search term ..."><input class="searchButton" type="submit">
    </form> 

    <div id="content">
        <div class="well">  
            <table class="table">
                <tr> <td>Email</td> <td>Telephone</td> <td>Name</td> <td>Title</td> <td>Category</td> <td>Description</td> <td>Picture</td> <td>Price</td> <td>Date Of Upload </td> </tr>
                <?php
                
                if(isset($_GET['email']))
                {
                    $email = $_GET['email'];

                }
                else
                {
                    $email = null;
                }if(isset($_GET['name']))
                {
                    $name = $_GET['name'];

                }
                else
                {
                    $name = null;
                }

                $statement  = $db->prepare("SELECT * FROM annons WHERE Email LIKE '%$email%' AND Name Like '%$name%' ORDER BY date DESC");
                $statement ->bindParam(':email', $email);
                $statement ->execute();
            	
            	
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    echo ("<tr>");
                    echo "<td>{$row['email']}</td>";
                    echo '<td>'.$row['telnr'].'</td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['title'].'</td>';
                    echo '<td>'.$row['category'].'</td>';
                    echo '<td>'.$row['description'].'</td>';
                    echo '<td>'.$row['picture'].'</td>';
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
