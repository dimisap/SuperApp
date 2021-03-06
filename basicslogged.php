<?php 
  session_start();
  include_once 'dbentry.php';
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  
    $sql = "SELECT * FROM `appusers` WHERE `username` = '$username'";

    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    
   // print_r($row);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Mechanics</title>
    <style type="text/css">
    
    .peirama{
    width:300px;
    height:410px;
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
    .justifying{
    text-align:justify;
    }
    #centered{
    text-align:center;
    }
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
     #navbar{
    background-color:#000000;
    width:100%; 
    }
    #quantum{
        width:350px;
        height:300px;
    
    }
    #arrowup{
    width:30px;
    height:30px;
    }
    html{
     scroll-behavior: smooth;
    }
    
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="profile.php" id="user" style="float:right;">Προφίλ</a>
        <a style="float:right; "onMouseOver="this.style.backgroundColor='#F5F7F7'"><?php echo $_SESSION['username']?> </a>
        
      </div>
      <div class="clear"></div>
      <h1 id="centered">Αρχικά, τί είναι η κβαντομηχανική;</h1>
      <br>
      <div class="container-xl">
          <div class="row">
                <div class="col-12 col-xl-4">
                   <img id="quantum" src="media/quantum.webp" alt="Quantum1">
                </div>

                <div class="col-12 col-xl-5 justifying">
                    <p>Η Κβαντοµηχανική είναι η ϑεωρία της Φυσικής που µελετάει τη συµπεριφορά της ύλης
                        και του ϕωτός σε “ατοµική” κλίµακα. Στη σηµερινή της µορφή, είναι η µόνη που εξηγεί
                        τα ϕυσικά ϕαινόµενα του µικρόκοσµου µε πολύ καλή ακρίβεια και έχει προβλέψει πολλά
                        νέα ϕαινόµενα. Η ακρίβεια των προβλέψεων της ϑεωρίας είναι της τάξεως του 10−11.
                        • Τα κβαντικά χαρακτηριστικά της ύλης γίνονται εντονότερα όσο µικρότερος είναι
                        ο χώρος µέσα στον οποίο είναι εγκλωβισµένο το σωµατίδιο και όσο µικρότερη είναι η
                        µάζα του.</p>
                        <p>Για να καταλάβουµε για τις διαστάσεις µε τις οποίες ασχολείται αναφέρουµε ότι : Ο
                        αριθµός του Avogadro = αριθµός µορίων σε ένα γραµµοµόριο = 6*10<sup>23</sup>. Για παράδειγµα
                        ένα γραµµάριο άνθρακα (µισή κουταλιά Ϲάχαρη ή ϐούτυρο) περιέχει περίπου 1023 άτοµα !
                        Πως µπορούµε να ϕανταστούµε αυτόν τον αριθµό; Ενδεχοµένως συγκρίνοντας τον µε
                        έναν άλλο αριθµό, π.χ. την ηλικία του σύµπαντος που είναι = 15 * 10<sup>9</sup> έτη = 10<sup>17</sup> sec.
                        Ο αριθµός αυτός είναι πολύ µικρότερος από το αριθµό του Avogadro. Αν κάποιος
                        αφαιρούσε ένα άτοµο άνθρακα της παραπάνω ποσότητας κάθε sec από τη στιγµή της
                        δηµιουργίας του σύµπαντος τότε ϑα είχε αφαιρέσει περίπου το ένα εκατοµµυριοστό του
                        αρχικού αριθµού !</p>
                        <p>Τι εξηγεί και τι µελετάει: Σχεδόν όλα τα ϕαινόµενα που µας οδήγησαν στις επαναστατικές ανακαλύψεις των τελευταίων 100 ετών : Περιοδικός πίνακας των στοιχείων, ∆οµή
                        των Στοιχειωδών σωµατιδίων, των Πυρήνων, των Ατόµων, και της Στερεάς Κατάστασης της
                        ύλης, Πυρηνική ενέργεια, Ιατρικές εφαρµογές, Laser, Maser, Τρανζίστορ, Ηµιαγωγοί,
                        Υπολογιστές, υλικά µε διάφορες ιδιότητες, Υπεραγωγιµότητα, Υπερρευστότητα, Σύγχρονες τηλεπικοινωνίες, Γενετική Μηχανική (DNA) ...</p>
                </div>
                <div class="col-12 col-xl-3">
                    <img id="quantum" src="media/quantum2.webp" alt="Quantum2">
                </div>
          </div>
          
          <br>
          <h4 id="centered">Γιατί έχει δηµιουργηθεί ένας µύθος για την Κβαντοµηχανική;</h4><br><br>
          <div class="row">
                <div class="col-12 col-xl-4">
                  <img  class="peirama" src="media/lofos1.jpg" alt="Κλασική περιγραφή πειράματος"> 
                </div>
                <div class="col-12 col-xl-5 justifying">
                <p>Σε αδρές γραµµές οι ϐασικές δυσκολίες στην κατανόηση της Κβαντοµηχανική είναι :</p>
                <p>α) Η εξήγηση που δίνει στα ϕαινόµενα έρχεται σε αντίθεση µε την κοινή λογική,
                δηλαδή µε το σύνολο των προκαταλήψεων που αποκτά ο άνθρωπος στα πρώτα χρόνια της
                ζωής του.</p><br>
                <p>Για παράδειγµα η κοινή λογική λέει ότι αν ϱίξουµε ένα σώµα µε ενέργεια µικρότερη
                από τη µέγιστη τιµή ενός ϕράγµατος δυναµικού (π.χ. ένα λόφο) αυτό ϑα ανακλαστεί και
                δεν είναι δυνατό να ϐρεθεί από την άλλη µεριά του λόφου (Σχ. 1α). Η Κ.Μ. απαντάει ότι
                είναι δυνατό να ϐρεθεί από την άλλη µεριά λόφου (Σχ. 1β) µε κάποια πιθανότητα!</p><br>
                <p>Επίσης αν ϐάλουµε ένα σώµα σ’ ένα πηγάδι στην κορυφή ενός λόφου αυτό ϑα ηρεµήσει
                στο κατώτερο µέρος του πηγαδιού και δεν ϑα ϐρεθεί ποτέ έξω από αυτό (Σχ. 1γ). Η
                Κβαντοµηχανική απαντάει ότι: α1) το σώµα έχει κάποια κινητική ενέργεια µεγαλύτερη
                από το µηδέν, α2) υπάρχει κάποια πιθανότητα να ϐρεθεί έξω από το πηγάδι </p>
                </div>
            <div class="col-12 col-xl-3"><img class="peirama" src="media/lofos2.jpg" alt="Εναλλακτική περιγραφή πειράματος"></div>
          </div>
          <br><br>
          <div class="row">

            <div class="col-12 col-xl-4"><img class="peirama" src="media/quantum3.webp" alt="Quantum3"></div>

            <div class="col-12 col-xl-5 justifying"><p>ϐ) Η Κλασική µηχανική διατυπώνεται µε τη µαθηµατική γλώσσα των παραγώγων
                και των ολοκληρωµάτων. Η ταχύτητα και η επιτάχυνση ορίζονται µε τη ϐοήθεια των
                παραγώγων, το έργο µε τη ϐοήθεια ολοκληρωµάτων.</p>
               <p> Η µαθηµατική γλώσσα της Κβαντοµηχανική περιέχει όχι µόνο τα παραπάνω αλλά
                και αρκετούς άλλους κλάδους των µαθηµατικών : διανυσµατικούς χώρους (δύο, τριών
                ή και απείρων διαστάσεων), τανυστικό λογισµό, ϑεωρία πιθανοτήτων, ϑεωρία πινάκων,
                µιγαδικές συναρτήσεις (η κυµατοσυνάρτηση από τη ϕύση της είναι µιγαδική συνάρτηση).</p>
               <p> Με άλλα λόγια η γλώσσα της Κβαντοµηχανικής είναι πολύ πιο αφηρηµένη και συµπαγής από ότι η γλώσσα της Κλασικής Μηχανικής. Τα συµπεράσµατα στα οποία καταλήγει
                δίνονται και εποµένως γίνονται αντιληπτά µέσα από τη µαθηµατική γλώσσα. Αυτή είναι
                µια δυσκολία στο να γίνει εύκολα κατανοητή από τους µη ειδικούς. Πολλές ϕορές και οι
                ειδικοί δεν την καταλαβαίνουν τόσο καλά όσο ϑα ήθελαν.</p></div>

            <div class="col-12 col-xl-3"></div>

          </div><br><br>
          <div class="row">

            <div class="col-12 col-xl-4"><img src="media/quantum4.webp" class="peirama"alt="Quantum4"></div>

            <div class="col-12 col-xl-5 justifying"><p>γ) Η Κλασική Μηχανική είναι µια αιτιοκρατική ϑεωρία: Αν γνωρίζουµε τις αρχικές
                συνθήκες ενός συστήµατος (ϑέση και ορµή) µπορούµε να γνωρίζουµε τη χρονική εξέλιξη
                του συστήµατος (δηλαδή το µέλλον του), δηλαδή γνωρίζουµε ποια τροχιά ϑα διαγράψει
                το σώµα. ∆ιαφορετικά η ϑέση και η ορµή είναι µε ακρίβεια ορισµένες κάθε χρονική
                στιγµή. Είναι πάντα δυνατό, τουλάχιστον κατ’ αρχή, να µετρήσουµε αυτά τα µεγέθη µε
                όση ακρίβεια ϑέλουµε χωρίς να διαταράξουµε το σύστηµα.</p>
                <p>Αντίθετα στην Κβαντοµηχανική δεν γνωρίζουµε τις αρχικές συνθήκες αφού σύµφωνα
                µε την αρχή της απροσδιοριστίας δεν είναι δυνατό να γνωρίζουµε µε όση ακρίβεια
                ϑέλουµε τη ϑέση και την ορµή ενός σώµατος και εποµένως: γ1) δεν έχει έννοια να
                µιλάµε για τροχιά του σωµατιδίου, γ2) δεν µπορούµε να µιλήσουµε για το µέλλον του
                συστήµατος, παρά µόνο ποια είναι η πιθανότητα το σύστηµα να ϐρεθεί στη µια ή στην
                άλλη κατάσταση.</p>   
                <p>Για να τονίσουµε τα παραπάνω αναφέρουµε τα λόγια του Feynman από το ϐιβλίο του:
                The character of Physical Low (1967) : Υπήρξε µια εποχή που οι εφηµερίδες έγραφαν
                ότι µόνο 12 άνθρωποι καταλάβαιναν τη ϑεωρία της Σχετικότητας. ∆εν πιστεύω ότι έχει
                γραφεί κάτι τέτοιο. Από την άλλη µεριά νοµίζω ότι είναι ασφαλές να πούµε ότι κανένας δεν
                καταλαβαίνει την Κβαντοµηχανική.</p></div>

            <div class="col-12 col-xl-3"></div>

          </div>

          <p>Back to top</p>
        <a href="#myTopnav"><img id="arrowup" src="media/arrowup.svg" alt="arrowup"></a>
        </div>
        </div>
          <div class="footer">
            <p id="footerpar"> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php endif; ?>   
<?php if(!isset($_SESSION['username'])){
         header("Location:index.html?access_denied");   
    }    
    ?>
</body>
</html>