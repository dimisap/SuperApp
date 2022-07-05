<?php 
  session_start();
  include_once 'dbentry.php';
  $counter = 0;
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  
    $sql = "SELECT * FROM `appusers`";
    $result = mysqli_query($conn,$sql);

    
    
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    #search{
      background:none;
      border-style:none;
    }

  </style>

</head>
<body>
<?php if(isset($_SESSION['username']) && $_SESSION['type'] == 3):?>  
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
    </div><br>
    <h4 style = "text-align:center;">Οι χρήστες του Website :</h4>
    <form method="post" > 
      <div style="float:right;margin-right:50px; margin-bottom:20px; width:300px;"class="input-group rounded">
     
       <input  type="search" name = "searching" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" />
      <button type="submit" name="search" id="search"><span class="input-group-text border-0" id="search-addon">
      <i class="fa fa-search"></i>
      </span>
    </button>
    </form>
</div>
    <br>
       <table class="table table-striped">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">Lastname</th>
     <th scope="col">Firstname</th>
     <th scope="col">Username</th>
     <th scope="col">Email</th>
     <th scope="col">Type</th>
     <th scope="col">Edit</th>
     <th scope="col">Delete</th>
   </tr>
 </thead>
 <?php
 ?>
 <tbody>
 <?php 
              $searchType = 0;
              if(isset($_POST['search'])){
                  $search = $_POST['searching'];
                  if(strpos('Χρήστης',$search) !==false || strpos('χρήστης',$search) !==false || strpos('χρηστης',$search) !==false || strpos('Χρηστης',$search) !==false){
                    $searchType = 1;
                  }
                  if(strpos('Συντονιστής',$search)!==false || strpos('συντονιστής',$search)!==false || strpos('Συντονιστης',$search)!==false || strpos('συντονιστης',$search)!==false){
                    $searchType = 2;
                  }
                  $query = "SELECT * FROM `appusers` WHERE `username` LIKE '%$search%' OR `email` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' OR `type` = '$searchType'";
                  $result = mysqli_query($conn,$query);
                  
              }

              while($row = mysqli_fetch_array($result)){
                   if($row['type'] !=3){
                    $counter ++;
            ?>
           <tr> 
               <td><?php echo $counter;?>
               <td><?php echo $row['lastname'];?></td>
               <td><?php echo $row['firstname'];?></td>
               <td><?php echo $row['username'];?></td>
               <td><?php echo $row['email'];?></td>
               <td><?php if($row['type'] == 1){
                          echo "Χρήστης";
                 }else{ echo "Συντονιστής"; }
                 ?></td>
               <td><a href = "edit_user.php?id=<?php echo $row['id']?>"><button type="submit" name = "edit"  class="btn" style="background-color:#6CA7AE;">Επεξεργασία</button></a></td>
               <td><button type="submit" name = "delete" onClick = "deleteme(<?php echo $row['id']?>)" class="btn btn-danger">Διαγραφή</button></td>

           </tr>
           <?php
                   }
               }
            ?>
   
 </tbody>
</table>
    <?php if($counter>11): ?>
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
        
        header("Location:indexlogged.php?access_denied");

    }?>
    <?php if($_SESSION['type'] == 2){
        
        header("Location:indexlogged.php?access_denied");

    }?>
    
    <script>

        function deleteme(id){

            if(confirm("Are you sure you want to delete this user??")){
                window.location.href = 'delete_user.php?id='+id;
            }

        }

    </script>
</body>
</html>

