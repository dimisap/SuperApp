<?php 
  session_start();

  include_once 'dbentry.php';
  $error = "";
  $error2 = "";
  $error3 = "";
if(isset($_POST['submit'])){
  

  $username = $_SESSION['username'];
  $question = $_POST['question'];
  $wrong1 = $_POST['wrong1'];
  $wrong2 = $_POST['wrong2'];
  $wrong3 = $_POST['wrong3'];
  $correct = $_POST['correct'];

  

  if(isset($_POST['level'])){
    if($_POST['level']=='easy'){
      $level = 1;
    }else if($_POST['level']=='medium'){
      $level = 2;
    }else{
      $level = 3;
    }
  }
  if($question == ""){
    $error .= "Question is required<br>";
  }
  if($wrong1 == ""){
    $error .= "Answer 1 is required<br>";
  }
  if($wrong2 == ""){
    $error .= "Answer 2 is required<br>";
  }
  if($wrong3 == ""){
    $error .= "Answer 3 is required<br>";
  }
  if($correct == ""){
    $error .= "The correct answer is required<br>";
  }

  if($error == ""){
    $sql = "INSERT INTO `add_question` (`username`,`question`, `answer1`, `answer2`, `answer3`,`correct`,`level`) VALUES ('$username','$question', '$wrong1','$wrong2','$wrong3','$correct','$level')";
  
    $result = mysqli_query($conn,$sql);

    header("Location:choosecat.php");
  }
}

  if(isset($_POST['submit2'])){
  
    $username = $_SESSION['username'];
    $question = $_POST['question2'];
    $answer = $_POST['answertext'];
    
    if(isset($_POST['level'])){
      if($_POST['level']=='easy'){
        $level = 1;
      }else if($_POST['level']=='medium'){
        $level = 2;
      }else{
        $level = 3;
      }
    }
    if($question == ""){
      $error2 .= "Question is required<br>";
    }
    if($answer == ""){
      $error2 .= "Answer is required<br>";
    }
    if($error2 == ""){
      $sql = "INSERT INTO `add_question_texat` (`username`,`question`,`answer`,`level`) VALUES ('$username','$question','$answer','$level')";
    
      $result = mysqli_query($conn,$sql);
  
      header("Location:choosecat.php");
  }
}


    if(isset($_POST['submit3'])){
  
      $username = $_SESSION['username'];
      $question = $_POST['question3'];
      $true = $_POST['true'];
      $false = $_POST['false'];
      $correct = $_POST['correct3'];
      if(isset($_POST['level'])){
        if($_POST['level']=='easy'){
          $level = 1;
        }else if($_POST['level']=='medium'){
          $level = 2;
        }else{
          $level = 3;
        }
      }
      
      if($question == ""){
        $error3 .= "Question is required<br>";
      }
      if($correct == ""){
        $error3 .= "Correct answer is required<br>";
      }
    if($error3 == ""){
      $sql = "INSERT INTO `add_question_tf` (`username`,`question`, `True1`,`False1`,`correct`,`level`) VALUES ('$username','$question', '$true','$false','$correct','$level')";
    
      $result = mysqli_query($conn,$sql);

      header("Location:choosecat.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    


</style>

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
  <div class="row">


  <!--    1   -->
    <div class="col-lg-4 col-12">
<?php if($error != ""):  ?>
  <div class="alert alert-danger" style="width:300px;text-align:center;" role="alert"> <?php echo $error; ?> <br> </div>
<?php endif; ?>
      <form  style="margin:20px;" method = "post">
        <h4>Ερώτηση πολλαπλών επιλογών</h4>
        <div class="form-group">
          <label >Put the question</label>
          <textarea class="form-control" name ="question" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >Wrong answer 1</label>
          <textarea class="form-control" name ="wrong1" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >Wrong answer 2</label>
          <textarea class="form-control" name ="wrong2" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >Wrong answer 3</label>
          <textarea class="form-control" name ="wrong3" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >Correct answer</label>
          <textarea class="form-control" name ="correct" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      <div class="form-group"><br>
      <label >Difficulty Level</label>
      <select id="level" style="width:200px;" name="level">
      <option value="easy" name="level" selected="selected">Easy</option>
      <option value="medium" name="level">Medium</option>
      <option value="difficult" name="level">Difficult</option><br>
      </div>
      <div class="form-group">
      <input style="width:100px;"type="submit" name="submit" value="Submit" onclick="thanks()">
      </div>
    </form>
    </div>



    <!--    2   -->
    <div class="col-lg-4 col-12">
    <?php if($error2 != ""):  ?>
  <div class="alert alert-danger" style="width:300px;text-align:center;" role="alert"> <?php echo $error2; ?> <br> </div>
<?php endif; ?>
      <form  style="margin:20px;" method = "post">
        <h4>Ερώτηση συμπλήρωσης κενού</h4>
        <div class="form-group">
          <label >Put the question</label>
          <textarea class="form-control" name ="question2" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >Correct answer</label>
          <textarea class="form-control" name ="answertext" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
      <div class="form-group">
      <label >Difficulty Level</label>
      <select id="level" style="width:200px;" name="level">
      <option value="easy" name="level" selected="selected">Easy</option>
      <option value="medium" name="level">Medium</option>
      <option value="difficult" name="level">Difficult</option><br>
      </div><br><br>
      <div class="form-group">
      <input style="width:100px;" type="submit" name="submit2" value="Submit" onclick="thanks()">
      </div>
    </form>
  </div>


    <!--    3    -->
    <div class="col-lg-4 col-12">
    <?php if($error3 != ""):  ?>
  <div class="alert alert-danger" style="width:300px;text-align:center;" role="alert"> <?php echo $error3; ?> <br> </div>
<?php endif; ?>
      <form  style="margin:20px;" method = "post">
        <h4>Ερώτηση Σωστού - Λάθους</h4>
        <div class="form-group">
          <label >Put the question</label>
          <textarea class="form-control" name ="question3" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group">
          <label >True</label>
          <input type="text" value="True" name="true">
        </div><br>
        <div class="form-group">
          <label >False</label>
          <input type="text" value="False" name="false">
        </div><br>
        <div class="form-group">
          <label >Correct answer</label>
          <textarea class="form-control" name ="correct3" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
      <div class="form-group">
      <label >Difficulty Level</label>
      <select id="level" style="width:200px;" name="level">
      <option value="easy" name="level" selected="selected">Easy</option>
      <option value="medium" name="level">Medium</option>
      <option value="difficult" name="level">Difficult</option><br>
      </div>
      <div class="form-group">
      <input style="width:100px;" type="submit" name="submit3" value="Submit" onclick="thanks()">
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
    function thanks(){
        alert("Η καταχώρησή σου θα ελεγχθεί από τους διαχειριστές. Ευχαριστούμε για την βοήθειά σου!!");
    }

</script>

</body>
</html>