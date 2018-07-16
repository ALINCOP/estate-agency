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
        <li><a href="contact.php">CONTACT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active" class="dropdown" >
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
                        $target_dir = "images/";

                        if (isset($_POST['submit'])) {
                            //daca s-a efectuat trimiterea formularului
                            //înregistrăm clientul nou în baza de date
                             $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                              move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                              $file = $_FILES["fileToUpload"]["tmp_name"];
                            $nume = $_POST['nume'];
                            $prenume = $_POST['prenume'];
                            $email = $_POST['email'];
                            $telefon = $_POST['telefon'];
                            $password = $_POST['parola'];
                             $query2 = "SELECT * FROM useri WHERE email LIKE '%" . $email . "%'";
                            $resultver=mysqli_query($conexiune, $query2);
                            if(mysqli_num_rows($resultver) == 0)
                            {

                            $query = "INSERT INTO useri (nume,prenume,email,telefon,password,avatar)
                                VALUES ('$nume', '$prenume','$email','$telefon' , '$password' , '$target_file' );";

                            $result=mysqli_query($conexiune, $query);

                            if (!$result) {
                              echo mysqli_error($conexiune);
                            } else {
                              echo "<h2>Inserare efectuată cu success!</h2>";
                              //echo $target_file;
                              //echo '<img src="'.$target_file.'" />';
                              
                                echo "<p>Înapoi la <a href='index.php'>prima pagina</a>";

                              }
                            }
                            else { echo "<h2>EROARE! Utilizatorul e deja inregistrat</h2>";}


                        } else {
                            //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                        
                        ?>
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
  <form role="form" id="formular_contact" action="inregistrare.php" method="post" enctype="multipart/form-data">
  <div class="row">
                <div class="col-sm-12 form-group">
                    <label>
                        Inregistrare cont nou</label>
                    
                </div>
  </div>

  <div class="row">
                <div class="col-sm-12 form-group">
                    <label >
                        Nume:</label>
                    <input type="text" class="form-control" id="nume" name="nume" required="" placeholder="Nume">
                </div></div>
    <div class="row">             <div class="col-sm-12 form-group">
                    <label >
                        Prenume:</label>
                    <input type="text" class="form-control" id="prenume" name="prenume" required="" placeholder="Prenume">
                </div></div>
     <div class="row">            <div class="col-sm-12 form-group">
                    <label >
                        Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required="" placeholder="Email">
                </div></div>
      <div class="row">            <div class="col-sm-12 form-group">
                    <label >
                        Parola:</label>
                    <input type="password" class="form-control" id="parola" name="parola" required="" placeholder="Parola">
                </div></div>
      <div class="row">            <div class="col-sm-12 form-group">
                    <label >
                        Telefon:</label>
                    <input type="number" class="form-control" id="telefon" name="telefon" required="" placeholder="ex: 0728040000">
                </div></div>
       <div class="row">            <div class="col-sm-12 form-group">
                    <label >
                        Poza de profil:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    
                </div></div>
            
            
                        
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-default pull-right" value="Upload Image" name="submit">Inregistreaza</button>
                </div>
            </div>

</form>
<?php

                        }
                        mysqli_close($conexiune);


                ?>
</div>
<div class="col-sm-4"></div>

</div><br>
                           <br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->


</body>
</html>
