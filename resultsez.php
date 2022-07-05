<?php 


/*if(isset($_POST['submit'])){
    
    echo $_POST['question1'];
    echo $_POST['question2'];
    echo $_POST['question3'];
    echo $_POST['question4'];
    
    echo $_POST['question5'];

    if(array_key_exists("submit",$_POST)){

        $answer5 = $_POST['question5'];
        if($answer5){
            echo "swsti apantisi";
            
        }else{
            echo "mparoufes";
        }
    }
}*/

  /*include_once 'dbentry.php';
  
  $query = "SELECT count(*) FROM `difficult_test`";
  
  $result = mysqli_query($conn,$query);

  $row = mysqli_fetch_array($result);

  $num = $row[0];

  echo $num."\n";*/
  session_start();

  include_once 'dbentry.php';
  $id1 = $_POST['question1id'];
  $id2 = $_POST['question2id'];
  $id3 = $_POST['question3id'];
  $id4 = $_POST['question4id'];
  $id5 = $_POST['question5id'];
  $counter = 0;
  date_default_timezone_set('Europe/Athens');
  $username = $_SESSION['username'];
  $date  = date("Y-m-d h:i");

  $query = "SELECT * FROM easy_test WHERE `id` = $id1";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);

  $query2 = "SELECT * FROM easy_test WHERE `id` = $id2";
  $result = mysqli_query($conn,$query2);
  $row2 = mysqli_fetch_array($result);

  $query3 = "SELECT * FROM easy_test WHERE `id` = $id3";
  $result = mysqli_query($conn,$query3);
  $row3 = mysqli_fetch_array($result);

  $query4 = "SELECT * FROM easy_test_texat WHERE `id` = $id4";
  $result = mysqli_query($conn,$query4);
  $row4 = mysqli_fetch_array($result);

  $query5 = "SELECT * FROM easy_test_tf WHERE `id` = $id5";
  $result = mysqli_query($conn,$query5);
  $row5 = mysqli_fetch_array($result);

if($row['correct'] == $_POST['question1']){
    $counter ++;
}
if($row2['correct'] == $_POST['question2']){
    $counter ++;
}
if($row3['correct'] == $_POST['question3']){
    $counter ++;
}
if($row4['answer'] == $_POST['question4']){
    $counter ++;
}
if($row5['correct'] == $_POST['question5']){
    $counter ++;
}

$sql10 = "INSERT INTO `testhistory` (`username`,`testdate`,`level`,`result`) VALUES ('$username','$date','1','$counter') ";

$result = mysqli_query($conn,$sql10);

header("Location:choosecat.php"); 

 /* echo "apantisi 1".htmlspecialchars($_POST['question1'])." ";
  echo "<br>";
  echo "id 1   ".htmlspecialchars($_POST['question1id'])." ";
  echo "<br>";
  echo "apantisi 2".htmlspecialchars($_POST['question2'])." ";
  echo "<br>";
  echo "apantisi 3".htmlspecialchars($_POST['question3'])." ";
  echo "<br>";
  echo "apantisi 4".htmlspecialchars($_POST['question4'])." ";
  echo "<br>";
  echo "apantisi 5".htmlspecialchars($_POST['question5'])." ";
  echo "<br>";echo "<br>";echo "<br>";
  echo "to counter einai ".$counter;*/
  ?>