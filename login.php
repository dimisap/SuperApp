<?php 
    session_start();
    
    
    
    $error = "";
    if(array_key_exists("submit",$_POST)){

        include_once 'dbentry.php';

        if(!$_POST['username']){
            $error .= "The username is required<br>";
        }

        if(!$_POST['password']){
            $error .= "The password is required<br>";
        }

        if($error != ""){
            $error = "<p>There were error(s) in your form:</p>".$error;
        }else{

            
            $salt='asdglgjasasdf34';
            $user=mysqli_real_escape_string($conn,$_POST['username']);
            $pass = md5($salt.$_POST['password']);

            $query = "SELECT * FROM appusers WHERE username = '$user' AND password = '$pass'";

            $result = mysqli_query($conn,$query);


            if($row = mysqli_fetch_array($result)){

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['type'] = $row['type'];

                header("Location: indexlogged.php");
            }else{
                $error =  "Sign in failed";
            }

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

    <div class="topnav" id="myTopnav">
        <a href="index.html">Αρχική</a>
        <a href="basics.html">Κβαντομηχανική</a>
        <a href="more.html">Περισσότερα</a>
        <a href="quiz.html">QUIZ</a>
        <a href="sign-up.php" style="float:right;">Εγγραφή</a>
        <a href="login.php"style="float:right;">Σύνδεση</a>
        
      </div>
      
    <h2>Log in to your account</h2>

    <?php  if($error != ""):  ?>
    <div class="alert alert-danger" role="alert"> <?php echo $error; ?> <br> </div>
    <?php endif; ?>
    <div class="form col-8 col-s-9">
        <form id ="loginform" name="loginform" method="post" enctype = "multipart/form-data">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <input style="width:100px;" type="submit" name = "submit" value="Σύνδεση">
        </form>
      </div>
      <div class="footer">
        <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
    </div>
</body>
</html>
