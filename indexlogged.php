<?php 
  session_start();
  include_once 'dbentry.php';
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  
    $sql = "SELECT * FROM `appusers` WHERE `username` = '$username'";

    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    
    
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

<div class="row">
    <div id="jumbotron" class="col-12 col-s-12" >
        <h1  class="jumbtext">Κβαντoμηχανική</h1>
        <br>
        <p class="jumbtext">Η κβαντική μηχανική (επίσης κβαντική φυσική, κβαντομηχανική, 
            κυματομηχανικό μοντέλο, μηχανική μητρών και μηχανική πινάκων), είναι αξιωματικά θεμελιωμένη 
            θεωρία της φυσικής, που αναπτύχθηκε με σκοπό την ερμηνεία φαινομένων που η νευτώνια μηχανική 
            αδυνατούσε να περιγράψει. Η κβαντομηχανική περιγράφει τη συμπεριφορά της ύλης στο μοριακό, 
            ατομικό και υποατομικό επίπεδο.</p>
            <hr>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div  class="col-xl-6  col-md-7"   >
            <img src="media/einstein.webp" alt="Einstein talks for quantum physics" id="einstein"class="col-11" >
        </div>
        <div class="col-xl-3 col-md-3">
            <p class="justifying"> Η Κβαντομηχανική σαν κλάδος της Φυσικής αμφισβητήθηκε απο πολλούς. Ένας από τους πρώτους που δεν
                πίστεψαν σε αυτη ήταν και ο νομπελίστας Φυσικός Άλμπερτ Άινσταιν. Στη πορεία της ζωής του όμως πείσθηκε και μάλιστα 
                το 1905 ο Αϊνστάιν σε μια προσπάθεια ερμηνείας του φωτοηλεκτρικού φαινομένου γενικεύει την ιδέα του Πλανκ προτείνοντας 
                ότι η ηλεκτρομαγνητική ακτινοβολία συνίσταται από κβάντα. Κάθε κβάντο περιέχει την ελάχιστη δυνατή ενέργεια που 
                μπορεί να υπάρξει για κάθε συγκεκριμένο μήκος κύματος. Το 1906 χρησιμοποιεί την έννοια 
                της κβάντωσης για να ερμηνεύσει την ειδική θερμότητα των στερεών σε χαμηλές θερμοκρασίες.</p>
        </div>
        <div class="col-xl-3 col-md-2">
            <img src="media/maths.jpg" alt="maths" id="maths">
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