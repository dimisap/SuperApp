<?php

    session_start();

    include_once 'dbentry.php';
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `appusers` WHERE `username` = '$username'";

    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    $error = "";
  
    
    $salt='asdglgjasasdf34';
    $id = $row['id'];
    
    $password=$row['password'];
    
        if(array_key_exists("submit",$_POST)){   
          $oldpassword = md5($salt.$_POST['oldpassword']);
        if(!$_POST['password']){
            $error .= "The password is required.<br>";
        }
    
        if(!$_POST['confirmpassword']){
          $error .= "The confirmation of the password is required.<br>";
        }
      
        if($_POST['password'] != $_POST['confirmpassword']){
          $error .= "The passwords are not the same.<br>";
        }
        if(strlen($_POST['password'])<8){
          $error .= "The password must be more than 8 characters.<br>";
        }
        
        if($oldpassword != $row['password']){
          $error .= "The old password is incorrect.";
        }

        if($error != ""){
          
          $error = "<p>There were error(s) in your form:</p>".$error;
        }else{
            
           
            $password=md5($salt.$_POST['password']);

            $sql = "UPDATE `appusers` SET `password` = '$password' WHERE `id` = '$id'";

            mysqli_query($conn,$sql);

            header("Location:indexlogged.php?signup=success");
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
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
      
    <h2>Change your password!</h2>

    <?php  if($error != ""):  ?>
    <div class="alert alert-danger" role="alert"> <?php echo $error; ?> <br> </div>
    <?php endif; ?>
    <div class="form col-8 col-s-9">
        <form id ="loginform" name="loginform" method="post" enctype = "multipart/form-data">

            <label for="password">Old Password</label>
    
            <input type="password" id="oldpassword" name="oldpassword" placeholder=" Old Password">

            <label for="password">New Password</label>
    
            <input type="password" id="password" name="password" placeholder="New Password">

            <label for="confirmpassword">Confirm the new Password</label>
            
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm your new password">
            <input type="submit" name = "submit" value="Change Password">
        </form>
      </div>
      <div class="footer">
        <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
    </div>
    <?php endif; ?>   
    <?php if(!isset($_SESSION['username'])){
         header("Location:index.html?access_denied");   
    }    
    ?>
</body>
</html>