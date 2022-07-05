<?php 
  session_start();

  include_once 'dbentry.php';
  $counter = 0;
  $sql = "SELECT * FROM `add_question`";

  $result = mysqli_query($conn,$sql);

  $sql2 = "SELECT * FROM `add_question_tf`";

  $result2 = mysqli_query($conn,$sql2);

  $sql3 = "SELECT * FROM `add_question_texat`";

  $result3 = mysqli_query($conn,$sql3);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Mechanics</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        h3{
            text-align:center;
        }
    </style>
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
       
      <table class="table table-striped">

      <h3>Αξιολόγηση Ερωτήσεων</h3>
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">Username</th>
     <th scope="col">Question</th>
     <th scope="col">Level</th>
     <th scope="col">Edit</th>
     <th scope="col">Delete</th>
   </tr>
 </thead>
 <?php
 ?>
 <tbody>
            <?php 
              while($row = mysqli_fetch_array($result)){
                   
                    $counter ++;
                    if($row['level'] == 1){
                        $level = 'Easy';
                    }else if($row['level'] == 2){
                        $level = 'Medium';
                    }else{
                        $level = 'Difficult';
                    }
            ?>
           <tr> 
               <td><?php echo $counter;?>             
               <td><?php echo $row['username'];?></td>               
               <td><?php echo $row['question'];?></td>
               <td><?php echo $level;?></td>
               <td><a href = "edit_question.php?id=<?php echo $row['id']?>"><button type="submit" name = "edit"  class="btn" style="background-color:#6CA7AE;">Επεξεργασία</button></a></td>
               <td><button type="submit" name = "delete" onClick = "deleteque(<?php echo $row['id']?>)" class="btn btn-danger">Διαγραφή</button></td>

           
           <?php
                   
               }
            ?>

<?php 
              while($row2 = mysqli_fetch_array($result2)){
                   
                    $counter ++;
                    if($row2['level'] == 1){
                        $level = 'Easy';
                    }else if($row2['level'] == 2){
                        $level = 'Medium';
                    }else{
                        $level = 'Difficult';
                    }
            ?>
           <tr> 
               <td><?php echo $counter;?>             
               <td><?php echo $row2['username'];?></td>               
               <td><?php echo $row2['question'];?></td>
               <td><?php echo $level;?></td>
               <td><a href = "edit_questiontf.php?id=<?php echo $row2['id']?>"><button type="submit" name = "edit"  class="btn" style="background-color:#6CA7AE;">Επεξεργασία</button></a></td>
               <td><button type="submit" name = "delete2" onClick = "deleteque2(<?php echo $row2['id']?>)" class="btn btn-danger">Διαγραφή</button></td>

           
           <?php
                   
               }
            ?>

        <?php 
              while($row3 = mysqli_fetch_array($result3)){
                   
                    $counter ++;
                    if($row3['level'] == 1){
                        $level = 'Easy';
                    }else if($row3['level'] == 2){
                        $level = 'Medium';
                    }else{
                        $level = 'Difficult';
                    }
            ?>
           <tr> 
               <td><?php echo $counter;?>             
               <td><?php echo $row3['username'];?></td>               
               <td><?php echo $row3['question'];?></td>
               <td><?php echo $level;?></td>
               <td><a href = "edit_questiontexat.php?id=<?php echo $row3['id']?>"><button type="submit" name = "edit"  class="btn" style="background-color:#6CA7AE;">Επεξεργασία</button></a></td>
               <td><button type="submit" name = "delete3" onClick = "deleteque3(<?php echo $row3['id']?>)" class="btn btn-danger">Διαγραφή</button></td>

           
           <?php
                   
               }
            ?>
            
   </tr>
 </tbody>
</table>
<?php if($counter > 11): ?>
      <div style="margin-left:15px;">
        <p style="margin-bottom:0px;">Back to top</p>
        <a href="#myTopnav" ><img id="arrowup" src="media/arrowup.svg" alt="arrowup"></a>
      </div>
    <?php endif; ?>
<div class="footer">
    <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
</div>
    
<?php endif; ?>   
<?php if(!isset($_SESSION['username'])){
    header("Location:index.html?access_denied");   
}    
?>  
<?php if($_SESSION['type'] == 1){
    header("Location:index.html?access_denied");   
}    
?>  

<script>
function deleteque(id){

if(confirm("Are you sure you want to delete this question??")){
    window.location.href = 'delete_question.php?id='+id;
}

}

function deleteque2(id){

if(confirm("Are you sure you want to delete this question??")){
    window.location.href = 'delete_questiontf.php?id='+id;
}

}

function deleteque3(id){

if(confirm("Are you sure you want to delete this question??")){
    window.location.href = 'delete_questiontexat.php?id='+id;
}

}
</script>
</body>
</html>
