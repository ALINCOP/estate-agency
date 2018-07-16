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
        <li class="active" ><a href="index.php">ACASA</a></li>
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
        <li class="dropdown" >
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
    <div class="col-sm-12">
      
    <?php if (isset($_POST['cauta'])) {
                            
                            $localitate = $_POST['localitate'];
                            $contract = $_POST['contract']; 
                            $tip_prop = $_POST['tip_prop']; 
                            echo "<meta http-equiv=\"refresh\" content=\"1; URL='cautare_generala.php?localitate=".$localitate."&contract=".$contract."&tip_prop=".$tip_prop."&action=view'\" >";
                            //echo "<meta http-equiv=\"refresh\" content=\"1;	URL=http://www.somewhere.com/" />""
                            //<a href='teren_oferta.php?id_teren=".$row['id_teren']."&action=view'>". $row["titlu"] ."</a>  
                        }

                            ?>  
  <form class="form-inline" action="cautare_generala.php">
    
    
      <div class="form-group">
      <label for="sel1"></label>
      <select class="form-control" id="localitate" name="localitate">
        <option>Alba-Iulia</option>
        <option>Sibiu</option>
        <option>Cluj-Napoca</option>
      </select>
    </div>
    <div class="form-group">
      <label for="sel1"></label>
      <select class="form-control" id="contract" name="contract">
        <option>De vanzare</option>
        <option>De inchiriere</option>
      </select>
    </div>
    <div class="form-group">
      <label for="sel1"></label>
      <select class="form-control" id="tip_prop" name="tip_prop">
        <option>Apartamente</option>
        <option>Case/Vile</option>
        <option>Terenuri</option>
      </select>
      
    </div>
    
    <button type="submit" class="btn btn-default" name="cauta"><span class="glyphicon glyphicon-search"></span> Cauta</button>
 		

  </form>
        
      
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
<?php

  if (isset($_GET['localitate'])) {
                        $localitate = $_GET['localitate'];
                        if (isset($_GET['contract']))
                          $contract = $_GET['contract'];
                        if (isset($_GET['tip_prop']))
                          $tip_prop = $_GET['tip_prop'];
                        
                      }
          $apart="Apartamente";
          $cas="Case/Vile";
          $ter="Terenuri";
           
            
          if($tip_prop==$apart)  
          {  
                 
	require("mysql.php");
        $query_apartamente = "SELECT * FROM v_apartamente_lista_imagine WHERE localitate LIKE '%" . $localitate . "%' and tip_contract LIKE '%" . $contract . "%' ";
        $apartament = mysqli_query($conexiune, $query_apartamente) or die ('Eroare ');
        $rezultat = mysqli_query($conexiune, $query_apartamente) or die ('Eroare ');
		 

  	 if (mysqli_num_rows($rezultat) > 0) {

                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                              //
                              

                              echo "<div class='col-sm-4'>";
                              echo "<div class='panel panel-info'>";

                              echo "<div class='panel-heading'><b><a href='apartament_oferta.php?id_apartament=".$row['id_apartament']."&action=view'>". $row["titlu"] ."</a></b></div>";
                              //echo "<div class='panel-body'><img src=". $row["imagine"] ." /></div>";
                              echo "<div class='panel-body'><img src=".$row["imagine"]." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image'  ></div>";
                              echo "<div class='panel-footer'><b>Pret: </b>" . $row["pret"] ." <span class='glyphicon glyphicon-euro'></span> </div>";
                              echo "</div>";
                              echo "</div>";
                              
                                }
                            }
                            else
                              echo "Cautarea nu a produs rezultat";
                            mysqli_close($conexiune);
       }
       if($tip_prop==$cas)
       {                     
      require("mysql.php");
        $query_case = "SELECT * FROM v_case_lista_imagine WHERE localitate LIKE '%" . $localitate . "%' and tip_contract LIKE '%" . $contract . "%' ";
        $case = mysqli_query($conexiune, $query_case) or die ('Eroare ');
        $rezultat = mysqli_query($conexiune, $query_case) or die ('Eroare ');
		 

  	 if (mysqli_num_rows($rezultat) > 0) {

                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                              //
                              

                              echo "<div class='col-sm-4'>";
                              echo "<div class='panel panel-info'>";

                              echo "<div class='panel-heading'><b><a href='casa_oferta.php?id_casa=".$row['id_casa']."&action=view'>". $row["titlu"] ."</a></b></div>";
                              //echo "<div class='panel-body'><img src=". $row["imagine"] ." /></div>";
                              echo "<div class='panel-body'><img src=".$row["imagine"]." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image'  ></div>";
                              echo "<div class='panel-footer'><b>Pret: </b>" . $row["pret_casa"] ." <span class='glyphicon glyphicon-euro'></span> </div>";
                              echo "</div>";
                              echo "</div>";
                              
                                }
                            }
                            else
                              echo "Cautarea nu a produs rezultat";
                            mysqli_close($conexiune);
        } 
        if($tip_prop==$ter){                 
      require("mysql.php");
        $query_terenuri = "SELECT * FROM v_terenuri_lista_imagine WHERE localitate LIKE '%" . $localitate . "%' and tip_contract LIKE '%" . $contract . "%' ";
        $teren = mysqli_query($conexiune, $query_terenuri) or die ('Eroare ');
        $rezultat = mysqli_query($conexiune, $query_terenuri) or die ('Eroare ');
		 

  	 if (mysqli_num_rows($rezultat) > 0) {

                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                              //
                              

                              echo "<div class='col-sm-4'>";
                              echo "<div class='panel panel-info'>";

                              echo "<div class='panel-heading'><b><a href='teren_oferta.php?id_teren=".$row['id_teren']."&action=view'>". $row["titlu"] ."</a></b></div>";
                              //echo "<div class='panel-body'><img src=". $row["imagine"] ." /></div>";
                              echo "<div class='panel-body'><img src=".$row["imagine"]." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image'  ></div>";
                              echo "<div class='panel-footer'><b>Pret: </b>" . $row["pret"] ." <span class='glyphicon glyphicon-euro'></span> </div>";
                              echo "</div>";
                              echo "</div>";
                              
                                }
                            }
                            else
                              echo "Cautarea nu a produs rezultat";
                            mysqli_close($conexiune);
                          }
                            ?>

  </div>
</div><br><br>


<br><br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->

</body>
</html>
