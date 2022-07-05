<?php 

include_once 'dbentry.php';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$salt='asdglgjasasdf34';
$error = "";
$currentdate = date("Y-m-d");



if(array_key_exists("submit",$_POST)){
    
    if(!$_POST['username']){
        $error .= "The username is required<br>";
    }

    if(!$_POST['password']){
        $error .= "A password is required<br>";
    }

    if(!$_POST['firstname']){
      $error .= "The firstname is required<br>";
     }
    if(!$_POST['lastname']){
      $error .= "The lastname is required<br>";
    }
    if(!$_POST['birthday']){
      $error .= "The date of birth is required<br>";
    }
    if(!$_POST['confirmpassword']){
      $error .= "The confirmation of the password is required<br>";
    }
    if($_POST['gender'] == "--"){
      $error .= "The gender is required<br>";
    }
    if(!$_POST['email']){
      $error .= "Email is required<br>";
    }
    if(strlen($_POST['username'])<5){
      $error .= "Username must be more than 5 characters<br>";
    }
    if($_POST['password'] != $_POST['confirmpassword']){
      $error .= "The passwords are not the same<br>";
    }
    if(strlen($_POST['password'])<8){
      $error .= "The password must be more than 8 characters<br>";
    }
    

    

    if($error != ""){
      $birth=test_input($_POST['birthday']);
      if($birth >= $currentdate){
        $error .= "Your date of birth cannot be after the current date";
      }
      $error = "<p>There were error(s) in your form:</p>".$error;
    }else{
      $username=test_input($_POST['username']);
      $target = "images/".$username.".jpg";
      $image = $_FILES['image']['name'];
      $first=test_input($_POST['firstname']); 
      $last=test_input($_POST['lastname']);
      $birth=test_input($_POST['birthday']);
      $gender=test_input($_POST['gender']);
      
      $password=md5($salt.$_POST['password']);
      $mail=mysqli_real_escape_string($conn,$_POST['email']);
     // $imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
      //$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));

     // $imageType = mysqli_real_escape_string($conn,$_FILES['image']['type']);
      
       
    $sql =   "SELECT * FROM appusers WHERE email = '$mail' ";
    $result = mysqli_query($conn,$sql);
    $sql2 =  $query = "SELECT * FROM appusers WHERE username = '$username' ";
    $result2 = mysqli_query($conn,$sql2);
    if($row = mysqli_fetch_array($result)){
      $error .= "Sorry, this email is already used";
    }else if($row = mysqli_fetch_array($result2)){
      $error .= "Sorry, this username is already used";
    }else{
    $sql = "INSERT INTO `appusers` (`id`, `email`, `firstname`, `lastname`, `birthdate`,`gender`, `username`, `password`,`type`) VALUES (NULL, '$mail', '$first', '$last', '$birth', '$gender','$username', '$password','1')";

    mysqli_query($conn,$sql);

    move_uploaded_file($_FILES['image']['tmp_name'],$target);

    header("Location:index.html?signup=success");
    
    mysqli_close($conn);
    }
  } 
 
  }
?>

<!DOCTYPE html>
<html>
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

<h2 class="clear">Sign Up Form</h2>
<?php  if($error != ""):  ?>
  <div class="alert alert-danger" role="alert"> <?php echo $error; ?> <br> </div>
<?php endif; ?>
<div class="form col-9 col-s-10">
  <form class="col-10" id = "signupform" name="signupform" method="POST" enctype = "multipart/form-data">
    <label for="firstname">Όνομα</label>
    
    <input type="text" id="firstname" name="firstname" placeholder="Όνομα">
    
    <label for="lastname">Επίθετο</label>
    
    <input type="text" id="lastname" name="lastname" placeholder="Επίθετο">
    
    <label for="birthday">Ημερομηνία Γέννησης </label>
   
        <input type="date" id="birthday" name="birthday" style="width:200px;">
    <br>
    <label for="gender">Φύλο</label>
    
    <select id="gender" name="gender">
      <option selected="selected">--</option>
      <option value="Male" name="gender">Άνδρας</option>
      <option value="Female" name="gender">Γυναίκα</option>
      <option value="Other" name="gender">Άλλο</option>
    </select>
    <br>
    <label for="username">Username</label>
    
    <input type="text" id="username" name="username" placeholder="Username">

    <small id="emailHelp" class="form-text text-muted">More than 5 characters</small><br><br>

    <label for="password">Password</label>
   
    <input type="password" id="password" name="password" placeholder="Password">

    <small id="emailHelp" class="form-text text-muted">More than 8 characters</small><br><br>

    <label for="confirmpassword">Confirm Password</label>
    
    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm your password">

    <label for="email">Email</label>
    
    <input type="email" id="email" name="email" placeholder="Email">

    <label for="profilephoto">Put your photo profile</label>
    <input type="file" id = "image" name="image">
    <input  style="width:100px;"type="submit" name = "submit" value="Υποβολή">
  </form>
</div>
<div class="footer">
  <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
</div>
</body>
</html>
