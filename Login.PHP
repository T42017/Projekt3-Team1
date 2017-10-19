<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php

 if(empty($_POST['LoginEmail'])){
        $LoginEmail=null;}
    else{
        $LoginEmail= $_POST['LoginEmail'];
    }
    if(empty($_POST['password'])){
        $password =null;
    }
	else{
	    $password = $_POST['password'];
	}	
?>
<html>
<body>
<header id="header">

    <div class="max">
        <div class="logo">
            <h1><a href="/teamproject3/">Plocket</a></h1>
        </div>


        <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="add.php"> Add</a></nav>
    </div>
</header>
    <div id="main">


        <div id="content-big">
            <div class="article">
                <form action="Login.PHP" method="POST">
                    <input type="text" name="LoginEmail" placeholder="Account Email" required />
                    <input type="text" name="password" placeholder="password for account" required />
                    <button type="submit"> Login </button>
                </form>
            </div>
        </div>




		 <div id="content-big">

                 <?php
		
                 if(isset($_POST['LoginEmail'])){
                     $loginemail=$_POST['LoginEmail'];
                 }
                 else{
		$loginemail=null ;
		
                 }
                 if(isset($_POST['password'])){
		
                     $password=$_POST['password'];
                 }
                 else{
		$password=null ;
                 }

		
		
                 $loginemail=urldecode($loginemail);
		
                 $statement  = $db->prepare("SELECT * FROM annons WHERE email = :email AND password = :password ORDER BY date DESC");

                 $statement ->bindParam(':email', $loginemail);

                 $statement ->bindParam(':password', $password);

                 $statement ->execute();


                 while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                     echo"      
                                <div class='article'> <div class='tmp'>
                                    
                                        <div class='row'>
                                            <div class='col'><b>Title</b></div>
                                            <div class='col'>{$row['title']}</div>                                     
                                        </div>  
                                        
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Telephone</b></div>
                                            <div class='col'>{$row['telnr']}</div>
                                        </div> 
                                         
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Name</b></div>
                                            <div class='col'>{$row['name']}</div>
                                        </div> 
                                         
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Category</b></div>
                                            <div class='col'>{$row['category']}</div>
                                        </div> 
                                         
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Description</b></div>
                                            <div class='col'>{$row['description']}</div>
                                        </div>  
                                        
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>E-mail</b></div>
                                            <div class='col'>{$row['email']}</div>
                                        </div>  
                                        
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Price</b></div>
                                            <div class='col'>{$row['price']}</div>
                                        </div>  
                                        
                                        <br>
                                        
                                        <div class='row'>
                                            <div class='col'><b>Date Of Upload</b></div>
                                            <div class='col'>{$row['date']}</div>
                                        </div>   
                                    
                                    </div>
                                    
                                    <p class='float-right tmp2'>jpg.png</p>
                                    
                                    <form method='post' class='float-right'> <button value='{$row['ID']}' name='delete'> Remove </button> </form>                                      
                                </div>";
                 }
                 if(isset($_POST['delete'])){
                     $delete=$_POST['delete'];
                     $statement  = $db->prepare("DELETE FROM annons WHERE ID = :id");

                     $statement ->bindParam(':id', $delete);
                     $statement ->execute();
                     echo "you product have been deleted";
                 }
                 ?>
		
         </div>
    </div>

<footer class="fixed-bottom"> footer </footer>

</body>
</html>