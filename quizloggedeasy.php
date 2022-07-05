<?php 
  session_start();

  include_once 'dbentry.php';
  
  $query = "SELECT count(*) FROM `easy_test`";
  
  $result = mysqli_query($conn,$query);

  $row = mysqli_fetch_array($result);

  $num = $row[0];

  $query2 = "SELECT count(*) FROM `easy_test_tf`";
  
  $result = mysqli_query($conn,$query2);

  $rowtf = mysqli_fetch_array($result);

  $num2 = $rowtf[0];

  $query3 = "SELECT count(*) FROM `easy_test_texat`";
  
  $result = mysqli_query($conn,$query3);

  $rowta = mysqli_fetch_array($result);

  $num3 = $rowta[0];

  $counter = 0;
  date_default_timezone_set('Europe/Athens');
  if(isset($_SESSION['username'])){
    
    $q1 = rand(1,$num);
    while(1){
       $q2 = rand(1,$num);
       if($q1 == $q2){
           continue;
       }else{
           break;
       }
    }
    while(1){
       $q3 = rand(1,$num);
       if($q1 != $q3 && $q2 != $q3){
           break;
       }else{
           continue;
       }
    }
    
    $q4 = rand(1,$num3);

    $q5 = rand(1,$num2);
      



    
    $sql = "SELECT * FROM `easy_test` where `id` = '$q1'";
    $result = mysqli_query($conn,$sql);
    $row1 = mysqli_fetch_array($result);

    $sql2 = "SELECT * FROM `easy_test` where `id` = '$q2'";
    $result = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result);

    $sql3 = "SELECT * FROM `easy_test` where `id` = '$q3'";
    $result = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_array($result);

    $sql4 = "SELECT * FROM `easy_test_texat` where `id` = '$q4'";
    $result = mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_array($result);

    $sql5 = "SELECT * FROM `easy_test_tf` where `id` = '$q5'";
    $result = mysqli_query($conn,$sql5);
    $row5 = mysqli_fetch_array($result);

    
    //echo $row1['id']." ".$row2['id']." ".$row3['id']." ".$row4['id']." ".$row5['id']."<br> ";

   // echo $row1['question']." <br>".$row2['question']."<br> ".$row3['question']."<br> ".$row4['question']."<br> ".$row5['question']."<br> ";

    
    if(isset($_POST['submit'])){
      
        
        
        
       
        $answer2 = $_POST['question2'];
           if($answer2 == $row2['correct']){
              //echo "swsti apantisi";
              $counter = $counter +1;
        }

        $answer3 = $_POST['question3'];
          if($answer3 == $row3['correct']){
             //echo "swsti apantisi";
             $counter = $counter +1;
         }
         $answer4 = $_POST['question4'];
         if($answer4 == $row4['correct']){
            //echo "swsti apantisi";
            $counter = $counter +1;
        }
        $answer5 = $_POST['question5'];
        if($answer5 === $row5['answer']){
           //echo "swsti apantisi";
           $counter = $counter +1;
        }


         
           // echo $username." ".$date." ".$level." ".$results."<br>";
            //echo " ".$row['username']." ".$row['testdate']." ".$row['level']." ".$row['result']."<br>";
        
    
   }

}       

    //select * from my_questions order by rand() limit 20;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Mechanics</title>
    <link rel="stylesheet" href="styles.css">
    <!-- CSS only -->
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
       
      <a href="choosecat.php"><button class = "btn" style="position:relative;left:20px;top:20px;background:#F8D5D3;">&#10232; Back</button></a>
        <div class="container">
      <h1>Quantum Mechanics Quiz</h1>
      <h3>Try yourself</h3>
      <h4> Level : Easy</h4>
      <a href="quizloggedeasy.php"><button type="button" class="btn btn-primary" >Αλλαγή κουιζ</button></a>
      <br><br>
      <div class="row">
      <div class="co-3 col-s-3">

      </div>
      <div class="form ">
        <form name="quiz" id="quiz" method="POST" action="resultsez.php">

            
            <p><label>1. <?php echo $row1['question'];?></label></p>

            <p><input type="radio"  name="question1" value = "<?php echo $row1['answer1']  ?>"> A. <?php echo $row1['answer1'] ?>
            <input type="radio"  name="question1" value = "<?php echo $row1['answer2']  ?>"> B. <?php echo $row1['answer2'] ?></p>
            <p><input type="radio"  name="question1" value = "<?php echo $row1['answer3']  ?>"> C. <?php echo $row1['answer3'] ?>
            <input type="radio"  name="question1" value = "<?php echo $row1['answer4']  ?>"> D. <?php echo $row1['answer4'] ?></p>
            <input type="hidden" name="question1id" value="<?php echo $row1['id'] ?>" />

            <br>
            <p><label>2. <?php echo $row2['question'];?></label></p>

            <p><input type="radio" name="question2" value = "<?php echo $row2['answer1']  ?>"> A. <?php echo $row2['answer1'] ?>
            <input type="radio"  name="question2" value = "<?php echo $row2['answer2']  ?>"> B. <?php echo $row2['answer2'] ?></p>
            <p><input type="radio"  name="question2" value = "<?php echo $row2['answer3']  ?>"> C. <?php echo $row2['answer3'] ?>
            <input type="radio"  name="question2" value = "<?php echo $row2['answer4']  ?>"> D. <?php echo $row2['answer4'] ?></p>
            <input type="hidden" name="question2id" value="<?php echo $row2['id'] ?>" />
            <br>
            <p><label>3. <?php echo $row3['question'];?></label></p>

            <p><input type="radio"  name="question3" value = "<?php echo $row3['answer1']  ?>"> A. <?php echo $row3['answer1'] ?>
            <input type="radio"  name="question3" value = "<?php echo $row3['answer2']  ?>"> B. <?php echo $row3['answer2'] ?></p>
            <p><input type="radio"  name="question3" value = "<?php echo $row3['answer3']  ?>"> C. <?php echo $row3['answer3'] ?>
            <input type="radio"  name="question3" value = "<?php echo $row3['answer4']  ?>"> D. <?php echo $row3['answer4'] ?></p>
            <input type="hidden" name="question3id" value="<?php echo $row3['id'] ?>" />
            <br>
            <p><label>4. <?php echo $row4['question'];?></label></p>   
            <span><textarea id="question-textarea"class="form-control" name ="question4" id="exampleFormControlTextarea1" value = "<?php echo $row4['answer']?>" style="width:200px;display: block;margin-left: auto;
    margin-right: auto;resize: none;"rows="1"></textarea></span>
           <input type="hidden" name="question4id" value="<?php echo $row4['id'] ?>" />
            <br>
            <p><label>5. <?php echo $row5['question'];?></label></p>
            
            <select name= "question5">
                <option selected="selected">--</option>
                <option value="<?php echo $row5['correct']?>" name="question5"> True</option>
                <option value="False" name="question5"> False</option>
             </select>
             <input type="hidden" name="question5id" value="<?php echo $row5['id'] ?>" />
            <br>
            
            
            <input type="submit" id="submit" name="submit" value="Submit" >
        </form>
      
    </div>
</div>
<div id="results"> 
    <p id="result"></p>
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
