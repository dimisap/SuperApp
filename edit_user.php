<?php

    session_start();

    include_once 'dbentry.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `appusers` WHERE `id` = '$id'";

    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    

        if(array_key_exists("submit",$_POST)){   
    
            if($_POST['type'] == 1){
            $sql = "UPDATE `appusers` SET `type` = '1' WHERE `id` = '$id'";
                mysqli_query($conn,$sql);
                header("Location: administrator.php?edit_successfull");
            }else if($_POST['type'] == 2){
                $sql = "UPDATE `appusers` SET `type` = '2' WHERE `id` = '$id'";
                mysqli_query($conn,$sql);
                header("Location: administrator.php?edit_successfull");
            }
            

           // mysqli_query($conn,$sql);

            //header("Location:indexlogged.php?signup=success");
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

	<div class="row">
      <!-- left column -->
      
      
      
      <div class="col-9 col-md-9  personal-info">
        
        <h3>User's info</h3>
        
        <form class="form-horizontal" role="form" method = "POST" >
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="firstname" disabled type="text" value=<?php echo $row['firstname']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lastname" disabled type="text" value=<?php echo $row['lastname']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name ="email" disabled type="email" value=<?php echo $row['email']?>>
            </div>
          </div>
          <div class="form-group">
              
            <label class="col-lg-3 control-label">Gender: </label>
            <div class="col-lg-8">
            <?php if($row['gender']=='Male'):?>
            <select id="gender"style="width:200px;"  disabled class="form-control" name="gender">
                <option value="Male" name="gender"  selected="selected">Άνδρας</option>
                <option value="Female" name="gender">Γυναίκα</option>
                <option value="Other" name="gender">Άλλο</option>
            </select>
            <?php endif; ?>
            <?php if($row['gender']=='Female'):?>
            <select id="gender" style="width:200px;" disabled name="gender">
                <option value="Male" name="gender" >Άνδρας</option>
                <option value="Female" name="gender"   selected="selected">Γυναίκα</option>
                <option value="Other" name="gender">Άλλο</option>
            </select>
            <?php endif; ?>
            <?php if($row['gender']=='Other'):?>
            <select id="gender" style="width:200px;" disabled name="gender">
                <option value="Male" name="gender">Άνδρας</option>
                <option value="Female" name="gender">Γυναίκα</option>
                <option value="Other" name="gender"  selected="selected">Άλλο</option>
            </select>
            <?php endif; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date of birth:</label>
            <div class="col-lg-8">
            <input class="form-control" id="birthday" disabled type="date" name="birthday" value=<?php echo $row['birthdate']?>>
              </div>
            
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" disabled value=<?php echo $row['username']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Type:</label>
            <div class="col-md-8">
            <?php if($row['type']=='1'):?>
            <select id="type"style="width:200px;" class="form-control" name="type">
                <option value="1" name="type"  selected="selected">Εγγεγραμένος χρήστης</option>
                <option value="2" name="type">Συντονιστής</option>
            </select>
            <?php endif; ?>
            <?php if($row['type']=='2'):?>
            <select id="type" style="width:200px;"  name="type">
                <option value="1" name="type" >Εγγεγραμένος χρήστης</option>
                <option value="2" name="type"   selected="selected">Συντονιστής</option>
            </select>
            <?php endif; ?>
            
            </div>
          </div>
          
          
          <br>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" style="margin-top:-10px;" name = "submit" id= "submit" class="btn btn-primary" value="Save">
              <button type="button" class="btn btn-link"><a href="administrator.php">Back</a></button>
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
</body>
</html>