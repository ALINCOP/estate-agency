<!DOCTYPE html>
<html >
<head>
  <title>Agentie Imobiliara</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16">
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Agentie Imobiliara</h1>      
    <p></p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">ACASA</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">VANZARI
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="apartamente_vanzare.php">APARTAMENTE</a></li>
          <li><a href="case_vanzare.php">CASE/VILE</a></li>
          <li><a href="terenuri_vanzare.php">TERENURI</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">INCHIRIERI
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="apartamente_inchiriere.php">APARTAMENTE</a></li>
          <li><a href="case_inchiriere.php">CASE/VILE</a></li>
          <li><a href="terenuri_inchiriere.php">TERENURI</a></li>
        </ul>
      </li>
        <li><a href="echipa.php">ECHIPA</a></li>
        <li><a href="ghid.php">GHID</a></li>
        <li class="active"><a href="contact.php">CONTACT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li  class="dropdown" >
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> CONTUL MEU
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin.php">ADMIN</a></li>
          <li><a href="inregistrare.php">CONT NOU</a></li>
          <li><a href="login.php">AUTENTIFICARE</a></li>
          <li><a href="deconectare.php">DECONECTARE</a></li>
        </ul>
      </ul>
    </div>
  </div>
</nav>




<div class="container">    
       <?php

                        require("mysql.php");
                        session_start();
                        //if(isset($_SESSION['id_user'])) // daca exista valaore in $_SESSION inseamna ca is conectat 
                        //{
                         // echo "log in cu succes";

                        //}
                        //else
                         // echo "nu esti logat";









                        
                        if (isset($_POST['submit'])) {
                            //daca s-a efectuat trimiterea formularului
                            //înregistrăm clientul nou în baza de date
                            $nume = $_POST['nume'];
                            $prenume = $_POST['prenume'];
                            $email = $_POST['email'];
                            $mesaj = $_POST['mesaj'];
                            $query = "INSERT INTO contact (nume,prenume,email,mesaj)
                                VALUES ('$nume', '$prenume','$email','$mesaj' );";

                            $result=mysqli_query($conexiune, $query);

                            if (!$result) {
                              echo mysqli_error($conexiune);
                            } else {
                              echo "<h2>Inserare efectuată cu success!</h2>";
                                echo "<p>Înapoi la <a href='contact.php'>contact</a>";

                            }


                        } else {
                            //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                        
                        ?>
  <form role="form" id="formular_contact" action="contact.php" method="post">
  <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="message">
                        Mesaj:</label>
                    <textarea class="form-control" type="textarea" name="mesaj" id="mesaj" required="" maxlength="2000" rows="9" placeholder="Introdu un mesaj format din cel mult 2000 caractere"></textarea>
                </div>
  </div>

  <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="name">
                        Nume:</label>
                    <input type="text" class="form-control" id="nume" name="nume" required="" placeholder="Nume">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="name">
                        Prenume:</label>
                    <input type="text" class="form-control" id="prenume" name="prenume" required="" placeholder="Prenume">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="email">
                        Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required="" placeholder="Email">
                </div>
            </div>
            
                        
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-default pull-right" name="submit">Send →</button>
                </div>
            </div>

</form>
<?php

                        }
                        mysqli_close($conexiune);


                ?>

</div><br>
    <br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->


</body>
</html>
