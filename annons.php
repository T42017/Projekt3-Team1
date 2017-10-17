<!DOCTYPE html>

<meta charset = "utf-8">
<?php $db = new PDO('mysql:host=localhost;dbname=annonser;charset=utf8mb4','root', '');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
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


<body>
<div id="main">

    <div id="header">

        <div class="max">
            <div class="logo">
                <h1><a href="/teamproject3/">Plocket</a></h1>
            </div>


            <nav class="section" id="nav"><a href="Login.PHP"> Login </a> <a href="#"> Page </a> <a href="add.php"> Add</a></nav>
        </div>
    </div>

    <div id="content-big">
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        $statement  = $db->prepare("SELECT * FROM annons WHERE ID = $id");
        $statement ->execute();

        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            echo"      
                                <div class='article'>
                                  
                                    <div class='tmp'>
                                    
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
                                                                                                                                              
                                </div>";
        }

        ?>


    </div>
    <footer>footer</footer>
</div>
</body>