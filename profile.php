<?php

    session_start();

    include_once 'dbentry.php';
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `appusers` WHERE `username` = '$username'";

    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    $error = "";
    $currentdate = date("Y-m-d");
   // print_r($row) ;
    $salt='asdglgjasasdf34';
    
    $id = $row['id'];
    $first=$row['firstname']; 
    $last=$row['lastname'];
    $birth=$row['birthdate'];
    $gender=$row['gender'];
    $username = $row['username'];
    
    $mail=$row['email'];
    

      if(array_key_exists("submit",$_POST)){   
    
      
    
        if(!$_POST['firstname']){
          $error .= "The firstname is required<br>";
         }
        if(!$_POST['lastname']){
          $error .= "The lastname is required<br>";
        }
        if(!$_POST['birthday']){
          $error .= "The date of birth is required<br>";
        }
        
        if($_POST['gender'] == "--"){
          $error .= "The gender is required<br>";
        }
        if(!$_POST['email']){
          $error .= "Email is required<br>";
        }
    
        if($error != ""){
          $birth=$_POST['birthday'];
          if($birth >= $currentdate){
            $error .= "Your date of birth cannot be after the current date";
          }
          $error = "<p>There were error(s) in your form:</p>".$error;
        }else{
            $first=$_POST['firstname']; 
            $last=$_POST['lastname'];
            $birth=$_POST['birthday'];
            $gender=$_POST['gender'];
            $username = $_POST['username'];
            $mail=$_POST['email'];
            

            $sql = "UPDATE `appusers` SET `firstname` = '$first', `lastname` = '$last', `birthdate` = '$birth', `gender` = '$gender' , `email` = '$mail' WHERE `id` = '$id'";

            mysqli_query($conn,$sql);
            
            header("Location:indexlogged.php?signup=success");
        }   
      }
      
      if(isset($_POST['upload'])){
        $image = $_FILES['image']['name'];
        
        $target = "images/".$_SESSION['username'].".jpg";
       
        
        move_uploaded_file($_FILES['image']['tmp_name'],$target);
        
        header("Location: profile.php?upload_success");
      }
      
     
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <style>
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

  #photoprofile{
    
    height:225px;
  }

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

  
  input[type=submit] {
    width: 20%;
    background-color: #5ca7e8;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
   </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
        <a href="profile.php" style="float:right;">Προφίλ</a>
        <a style="float:right; "onMouseOver="this.style.backgroundColor='#F5F7F7'"><?php echo $_SESSION['username']?> </a>
        
      </div>
    
    <div class="container">
    <br>
    <h1>Edit Profile</h1>
  	<hr>

    <?php  if($error != ""):  ?>
      <div class="alert alert-danger" role="alert"> <?php echo $error; ?> <br> </div>
    <?php endif; ?>
	<div class="row">
      
      <div class="col-md-3 .col-sm-3 col-12  " style="margin-top:7px;">
        <div class="text-center">
        
        
            <img class= "rounded d-block w-100" alt="First slide"id="photoprofile" src="images/<?php echo $_SESSION['username']?>.jpg" alter="Profile Photo">
        
          
        
            <br><br>
            <h6>Upload a different photo...</h6>
          <form method = "post"  enctype = "multipart/form-data"> 
            <input type="file" size="60" style="position:relative; right:80px;width:300px;" class="form-control-file" id = "image" name="image">
            <input class="btn btn-primary" style="width:150px;" type="submit" name="upload" Value="Upload" >
          </form>
            
              
           
          <br><br>
          <a href = "resetpass.php" ><button type="button" class="btn btn-warning" name = "changepass" id="changepass">Change your password here!</button></a>
        </div>
      </div>
      
      
      <div class=" col-md-9 .col-sm-8 col-12 personal-info">
        
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method = "POST" enctype = "multipart/form-data">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="firstname" type="text" value=<?php echo $row['firstname']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lastname" type="text" value=<?php echo $row['lastname']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name ="email" type="email" value=<?php echo $row['email']?>>
            </div>
          </div>
          <div class="form-group">
              
            <label class="col-lg-3 control-label">Gender: </label>
            <div class="col-lg-8">
            <?php if($row['gender']=='Male'):?>
            <select id="gender"style="width:200px;"  class="form-control" name="gender">
                <option value="Male" name="gender" selected="selected">Άνδρας</option>
                <option value="Female" name="gender">Γυναίκα</option>
                <option value="Other" name="gender">Άλλο</option>
            </select>
            <?php endif; ?>
            <?php if($row['gender']=='Female'):?>
            <select id="gender" style="width:200px;" name="gender">
                <option value="Male" name="gender" >Άνδρας</option>
                <option value="Female" name="gender" selected="selected">Γυναίκα</option>
                <option value="Other" name="gender">Άλλο</option>
            </select>
            <?php endif; ?>
            <?php if($row['gender']=='Other'):?>
            <select id="gender" style="width:200px;" name="gender">
                <option value="Male" name="gender">Άνδρας</option>
                <option value="Female" name="gender">Γυναίκα</option>
                <option value="Other" name="gender" selected="selected">Άλλο</option>
            </select>
            <?php endif; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date of birth:</label>
            <div class="col-lg-8">
            <input class="form-control" id="birthday" type="date" name="birthday" value=<?php echo $birth?>>
              </div>
            
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" disabled value=<?php echo $row['username']?>>
            </div>
          </div>
          
          
          <br>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" style="width:100px;"name = "submit" id= "submit" class="btn btn-primary" value="Save">
              <span></span>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<div class="footer">
        <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
    </div>

    <?php endif; ?>   
    <?php if(!isset($_SESSION['username'])){
         header("Location:index.html?access_denied");   
    }    
    ?>


<script>
$('.carousel').carousel({
  interval:2000
})
</script>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>