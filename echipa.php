<!DOCTYPE html>
<html lang="en">
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

<?php
        require("mysql.php");
        $query_echipa = "SELECT * FROM useri where admin=1";
        $rezultat_echipa = mysqli_query($conexiune, $query_echipa) or die ('Eroare ');
        

        
 ?>

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
        <li class="active"><a href="echipa.php">ECHIPA</a></li>
        <li><a href="ghid.php">GHID</a></li>
        <li><a href="contact.php">CONTACT</a></li>
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
  <div class="row">
    
      
    <?php
    if (mysqli_num_rows($rezultat_echipa) > 0) {

                          

                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat_echipa)) {
                              echo "<div class='col-sm-4'>";
                              echo "<div class='panel panel-danger'>";
                              //echo "<div class='panel-heading'><b>". $row["titlu_postare"] ."</b></div>";
                              if($row["avatar"] == NULL)
                                  echo "<div class='panel-body'><img src='images/agent_default.jpg' class='img-responsive'  style='margin-left: auto; margin-right: auto;''  alt='Image'></div>";
                              else 
                                echo "<div class='panel-body'><img src=".$row["avatar"]." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image' height='199' width='150' ></div>";

                                
                              echo "<div class='panel-footer'><b>Nume: </b>" . $row["nume"] ." " .$row["prenume"]."</div>";
                              echo "<div class='panel-footer'><b>Telefon: </b>" . $row["telefon"] ."</div>";
                              echo "<div class='panel-footer'><b>Email: </b><a href='mailto:'". $row["email"] .">". $row["email"] ."</a></div>";



                              echo "</div>";
                              echo "</div>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Nu aveti membri!</td></tr>";
                                    }
  ?>

  </div>
</div><br><br>

<?php
mysqli_close($conexiune); 
?>

                           <br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->

</body>
</html>
