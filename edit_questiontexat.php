<?php

    session_start();

    include_once 'dbentry.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `add_question_texat` WHERE `id` = '$id'";
    
    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    
    if(isset($_POST['submit'])){

        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $level = $_POST['level'];

        if($level == 1){
            $row['level'] = 1;
            $sql = "INSERT INTO `easy_test_texat` (`question`,`answer`) VALUES ('$question','$answer')";
            $sql2 = "DELETE FROM `add_question_texat` WHERE `id` = '$id'";
        }else if($level == 2){
            $row['level'] = 2;
            $sql = "INSERT INTO `medium_test_texat` (`question`,`answer`) VALUES ('$question','$answer')";
            $sql2 = "DELETE FROM `add_question_texat` WHERE `id` = '$id'";
        }else{
            $row['level'] = 3;
            $sql = "INSERT INTO `difficult_test_texat` (`question`,`answer`) VALUES ('$question','$answer')";
            $sql2 = "DELETE FROM `add_question_texat` WHERE `id` = '$id'";
        }       
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
        header("Location: questions.php?edit_success");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  .form-select{

    width:250px;

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
        <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 2 ):?>
        <a href="questions.php">Ερωτήσεις</a>
        <?php endif; ?>
        <a href="logout.php"style="float:right;">Αποσύνδεση</a>
        <a href="profile.php" style="float:right;">Προφίλ</a>
        <a style="float:right; "onMouseOver="this.style.backgroundColor='#F5F7F7'"><?php echo $_SESSION['username']?> </a>
        
      </div>
    
    <div class="container">
    <br>
    <h1>Αξιολόγηση Ερωτήσεων</h1>
  	<hr>

	<div class="row">
      
      <div class="col-9 col-md-9  personal-info">
        
        <h3>Πληροφορίες Ερώτησης</h3>
        
        <form class="form-horizontal" role="form" method = "POST" >
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="username"  disabled type="text" value=<?php echo $row['username']?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Question:</label>
            <div class="col-lg-8">
              
              <textarea class="form-control" name ="question" id="exampleFormControlTextarea1" rows="3"><?php echo $row['question']?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Answer 1:</label>
            <div class="col-lg-8">
              
              <textarea class="form-control" name ="answer" rows="3"><?php echo $row['answer']?></textarea>
            </div>
          </div>
        
          <div class="form-group">
                <label >Difficulty Level</label>
                <?php if($row['level'] == 1):?>
                    <select class="form-select" id="level" name="level">
                    <option value="1" name="level" selected="selected">Easy</option>
                    <option value="2" name="level">Medium</option>
                    <option value="3" name="level">Difficult</option><br>
                </select>
            </div>
            <div class="form-group">
                <?php endif;?>
                <?php if($row['level'] == 2):?>
                    <select class="form-select" id="level" name="level">
                    <option value="1" name="level" >Easy</option>
                    <option value="2" name="level" selected="selected">Medium</option>
                    <option value="3" name="level">Difficult</option><br>
                    </select>
                <?php endif;?>
                </div>
                <div class="form-group">
                <?php if($row['level'] == 3):?>
                    <select class="form-select" id="level" name="level">
                    <option value="1" name="level" >Easy</option>
                    <option value="2" name="level" >Medium</option>
                    <option value="3" name="level" selected="selected">Difficult</option><br>
                    </select>
                <?php endif;?>
                </div>
                <div class="form-group">
            
            <div class="col-md-8">
              <input type="submit" style="margin-top:10px;" name = "submit" id= "submit" class="btn btn-primary" value="Save">
              <button type="button" class="btn btn-link"><a href="questions.php">Back</a></button>
            </div>
          </div>
          </form>
          </div>

          <br>  
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