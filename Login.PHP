<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php
 if(empty($_GET['LoginEmail'])){
        $LoginEmail=$_SESSION['email'] ;}
    else{
        $LoginEmail= $_GET['LoginEmail'];
    }
    if(empty($_GET['password'])){
        $password =$_SESSION['password'] ;;
    }
	else{
	    $password = $_GET['password'];	
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
                    <li class="active"><a href="Index.PHP"> Home </a></li>
                    <li><a href="Login.PHP"> Login Page </a></li>
                    <li><a href="#"> Page 2 </a></li>
                    <li><a href="add.php"> Add Item </a></li>
                </ul>

            </div>
        </nav>

		 <form class="search" action="Login.PHP" method="GET">
            <input class="loginTerm" type="text" name="LoginEmail" placeholder="Account Email" required />
            <input name="password" type="text" name="password" placeholder="password for account" required />
			<input class="searchButton" type="submit">
        </form>
		 <div id="content">
            <div class="well">
                <table class="table">
		 <tr> <td>Title</td> <td>Email</td> <td>Telephone</td> <td>Name</td> <td>Category</td> <td>Price</td> <td>Date Of Upload </td> <td>Delete </td> </tr>
		<?php
		session_start();
		
		if(isset($_GET['LoginEmail'])){
		$loginemail=$_GET['LoginEmail'];				 
		}
		else{
		$loginemail=$_SESSION['email'] ;
		
		}
		if(isset($_GET['password'])){
		
		$password=$_GET['password'];
		}
		else{
		$password=$_SESSION['password'] ;
		}
		if(isset($_GET['delete'])){
		$delete=$_GET['delete'];
		$statement  = $db->prepare("DELETE FROM annons WHERE ID = :id");
		            $statement ->bindParam(':id', $delete);
                    $statement ->execute();
		echo "you product have been deleted";
		}
		
		
		$loginemail=urldecode($loginemail);
		
		$statement  = $db->prepare("SELECT * FROM annons WHERE email = :email AND password = :password ORDER BY date DESC");
		            $statement ->bindParam(':email', $loginemail);
		            $statement ->bindParam(':password', $password);
                    $statement ->execute();
					
					 while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo '<td>'.$row['telnr'].'</td>';
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['category']}</td>";
                            echo '<td>'.$row['price'].'</td>';
                            echo '<td>'.$row['date'].'</td>';
							echo "<td><a href='?delete={$row['ID']}'>Delete</td>";
}
		?>			
		
				  
          </table>
            </div>

            <div class="well">
            <footer> footer</footer>
            </div>

        </div>
    </div>
</body>