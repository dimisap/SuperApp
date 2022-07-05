<?php 
  session_start();

  include_once 'dbentry.php';
  $counter = 0;
  $sum = 0;
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM `testhistory` WHERE `username` = '$username'";
  $result = mysqli_query($conn,$sql);
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <form>
    <br>
            <label> <h4>Διάλεξε την κατηγορία της δυσκολίας που θες να παίξεις:</h4></label><br><br>
            <a href="quizloggedeasy.php"><input type="button" class="btn btn-success"id="submit" name="easy" value='Εύκολο'></a><span>&emsp;&emsp;</span>
            <a href="quizloggedmedium.php"><input type="button" class="btn btn-warning"id="submit" name="medium" value='Μέτριο'></a><span>&emsp;&emsp;</span>
            <a href="quizloggeddiff.php"><input type="button" class="btn btn-danger"id="submit" name="difficult" value='Δύσκολο'></a><br><br>
            <a href="addquestion.php"><input type="button" class="btn btn-info"id="submit" name="difficult" value='Πρόσθεσε τη δική σου ερώτηση!'></a>
        </form>
        <br><br><br>
        <form method="post" > 
            <div class="input-group rounded">
            <select id="level" style="width:200px;" name="searching">  
                <option value="1" name="searching">Easy</option>
                <option value="2" name="searching">Medium</option>
                <option value="3" name="searching" >Difficult</option>
            </select>
      
            <button style = "background:none; border-style:none;" type="submit" name="search" id="search"><span class="input-group-text border-0" id="search-addon">
            <i class="fa fa-search"></i>
            </span>
            </button>
            <button name="all" class="btn btn-primary rounded" style="background:#CD7801;border:#CD7801;margin-left:5px;margin-right:10px;height:45px;width:45px;">All</button>
        </form>
        <h4>Εδώ βλέπεις τα αποτελέσματά σου στα Quiz που έχεις απαντήσει :</h4>
       
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Date</th>
      <th scope="col">Level</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <?php
  ?>
  <tbody>
  <?php 
            $categories = array('1','2','3');
            if(isset($_POST['search'])){
                $search = $_POST['searching'];
                $query = "SELECT * FROM `testhistory` WHERE `username` = '$username' AND `level` = '$search'";
                
                $result = mysqli_query($conn,$query);
                
                
            }
            if(isset($_POST['all'])){
                $search = $_POST['searching'];
                $query = "SELECT * FROM `testhistory` WHERE `username` = '$username'";
                
                $result = mysqli_query($conn,$query);
            }
               while($row = mysqli_fetch_array($result)){
                    $counter ++;
                    $sum += $row['result'];
             ?>
            <tr> 
                <td><?php echo $counter;?>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['testdate'];?></td>
                <td><?php if( $row['level'] == 1){
                                echo "Easy";
                            }else if($row['level'] == 2){
                                echo "Medium";
                            }else{
                                echo "Difficult";
                            }
                ?></td>
                <td><?php echo $row['result'];?> / 5</td>

            </tr>
            <?php
                }
             ?>
    
  </tbody>
</table>

<p > Μέσος όρος των αποτελεσμάτων σου : <?php if($sum !=0){ $average = $sum/$counter; echo round($average,2);}else{ echo "0";}  ?> / 5 ή <?php if(isset($average)){echo round($average * 100/5,2);}else{ echo "0";} ?> %</p>

</div>

</div>
<?php  if($counter >11):?>
    <a href="#myTopnav"><img id="arrowup" src="media/arrowup.svg" alt="arrowup"></a><span>&ensp;Back to top</span>
    
<?php endif;?>
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