<?php 
  session_start();
  include_once 'dbentry.php';
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    
    $sql = "SELECT * FROM `posts` ORDER BY `id` DESC";

    $result = mysqli_query($conn,$sql);
        
        
        //print_r($row2);
        $id = $_POST['getid'];

        $sql2 = "SELECT * FROM posts where `id` = '$id'";
        $res = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($res);
        
    
    if(isset($_POST['submit'])){

        $post = $_POST['post'];

        $query = "INSERT INTO posts (`post`) VALUES ('$post')";

        mysqli_query($conn,$query);

        header("Location: posts.php?post=success");
    }

    if(isset($_POST['like'])){
        
        $likecounter = $row2['likes'] ;
        
        $likecounter ++;
        echo $likecounter;

        $query = "UPDATE posts SET `likes`='$likecounter'";
        mysqli_query($conn,$query);
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Mechanics</title>
    <style type="text/css">

    #footerpar{
    text-align:center;
    margin:0px;
    margin-top:20px;
    background-color:#A9DBFE;
    padding:15px;
     }

    #linkedin{
    width:20px;
    height:20px;
    }
    
    .topnav {
    background-color: #F5F7F7;
    overflow: hidden;
    }
  
    .topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 25px;
    text-decoration: none;
    font-size: 20px;
     }
  
     .topnav a:hover {
    background-color: #5ca7e8;
    color: black;
    text-decoration:none;
     }
     #navbar{
    background-color:#000000;
    width:100%; 
    }
    
    
    html{
     scroll-behavior: smooth;
    }

   #post{
       margin-top:20px;
   }
   .col-md-2{
       background:red;
   }
    

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php if(isset($_SESSION['username'])):?>  
    <div class="topnav" id="myTopnav">
        <a href="indexlogged.php">Αρχική</a>
        <a href="basicslogged.php">Κβαντομηχανική</a>
        <a href="morelogged.php">Περισσότερα</a>
        <a href="choosecat.php">QUIZ</a>    
        <?php if($_SESSION['type'] == 3):?>
        <a href="administrator.php">Χρήστες</a>
        <?php endif; ?>   
        <?php if($_SESSION['type'] == 3 ||$_SESSION['type'] == 2 ):?>
        <a href="questions.php">Ερωτήσεις</a>
        <?php endif; ?> 
        <a href="logout.php"style="float:right;">Αποσύνδεση</a> 
        <a href="profile.php" id="user" style="float:right;">Προφίλ</a>
        <a style="float:right; "onMouseOver="this.style.backgroundColor='#F5F7F7'"><?php echo $_SESSION['username']?> </a>
    </div>
<div class="container-xl">
    <div class="row">
        <div class="col-md-2 col-1"></div>
        <div class="col-md-8 col-10">
        <form method="POST" >    
            <textarea name="post" id="post" class = "rounded" cols="70%" rows="5" placeholder="Tell us your thoughts..."></textarea><br>
            <!--<input type="submit" class="btn btn-primary" style="margin-right:20px;" name = "like" id="like" value="Like">
            <input type="submit" class="btn btn-danger" style="margin-right:20px;" name = "dislike" id="dislike" value="Dislike">-->
            <input type="submit" class="btn btn-success" style="margin-right:20px;" name="submit" id="submit" value="Submit">
            <input type="hidden" name="getid" id="getid">
        </form>
        </div>

        <div class="col-md-2 col-1"></div>
    </div>
    <?php
                while($row = mysqli_fetch_array($result)){
                    

            ?>
<div class="row">
        <div class="col-md-2 col-1"></div>

        <div class="col-md-8 col-10">
            <?php
                
                    echo $row['post'];
                    echo "<br>";
                    echo $row['likes'];
            ?>
            
            <form method = "POST">
                <input type="submit" class="btn btn-primary" style="margin-right:20px;" name = "like" id="like" value="Like">
                <input type="submit" class="btn btn-danger" style="margin-right:20px;" name = "dislike" id="dislike" value="Dislike">
                <input type="hidden" name="getid" id="getid">
            </form>
        </div>

        <div class="col-md-2 col-1"></div> 
    
</div>
<?php }  ?>
</div>
          <div class="footer">
            <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php endif; ?>   
<?php if(!isset($_SESSION['username'])){
         header("Location:index.html?access_denied");   
    }    
    ?>
</body>
</html>