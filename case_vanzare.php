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
/// view
                require("mysql.php");
                $query_terenuri = "select * from v_case_vanzare;" ;
        $rezultat = mysqli_query($conexiune, $query_terenuri) or die ('Eroare ');
       
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
        <li class="active" class="dropdown">
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
      $action = "0";
       if (isset($_GET['id_casa'])) {
                            $id_casa = $_GET['id_casa'];
                                if (isset($_GET['action'])) {
                                    $action = $_GET['action'];
                                                }
                                 }
      if ($action == "view") {
                        //view? 
                       $query_useri = "SELECT c.id_casa, c.titlu, c.camere, c.pret_casa, c.localitate, c.an_constructie, c.suprafata, c.garaj, c.piscina, c.info, c.tip_contract, u.nume, u.prenume, u.telefon, u.email, u.avatar as imagine_user 
                            FROM case_vile c join useri u 
                            ON c.id_agent=u.id_user
                            where c.id_casa=".$id_casa;                            
                      $rezultat_useri = mysqli_query($conexiune, $query_useri) or die ('Eroare ');
                      $query_imagini = "SELECT locatie_imagine  
                            FROM imagini where id_casa=".$id_casa;                        
                      $rezultat_imagini = mysqli_query($conexiune, $query_imagini) or die ('Eroare ');

                      if (mysqli_num_rows($rezultat_useri) > 0) 
                             while($row = mysqli_fetch_assoc($rezultat_useri)) {
                                  $titlu=$row["titlu"];
                                  $pret=$row["pret_casa"];
                                  $localitate=$row["localitate"];
                                  $suprafata=$row["suprafata"];
                                  $an_constructie=$row["an_constructie"];
                                  $info=$row["info"];
                                  $tip_contract=$row["tip_contract"];
                                  $garaj=$row["garaj"];
                                  $piscina=$row["piscina"];
                                  $camere=$row["camere"];
                                  $nume=$row["nume"];
                                  $prenume=$row["prenume"];
                                  $telefon=$row["telefon"];
                                  $email=$row["email"];
                                  $avatar=$row["imagine_user"];

                             }
                             $i=1;
                        if (mysqli_num_rows($rezultat_imagini) > 0) 
                             while($row = mysqli_fetch_assoc($rezultat_imagini)) {
                                  $imagini[$i]=$row["locatie_imagine"];
                                  $i=$i+1;
                                 

                             }
                        echo "<div class='row'>";
                        echo "<div class='col-sm-8'>";
      echo "<div class='panel panel-danger'>";
       echo "<div class='panel-heading'><b>".$titlu."</b></div>";
         echo "<div id='myCarousel' class='carousel slide' data-ride='carousel'>";
   
     echo "<ol class='carousel-indicators'>";
       echo "<li data-target='#myCarousel' data-slide-to='0' class='active'></li>";
       echo "<li data-target='#myCarousel' data-slide-to='1'></li>";
       echo "<li data-target='#myCarousel' data-slide-to='2'></li>";
     echo "</ol>";

    
     echo "<div class='carousel-inner'>";

       echo "<div class='item active'>";
         echo "<img src=".$imagini[1]." class='img-responsive'  style='max-height: 450px; margin-left: auto; margin-right: auto;'  alt='Image'>";
        
       echo "</div>";

       echo "<div class='item'>";
         echo "<img src=".$imagini[2]." class='img-responsive'  style='max-height: 450px; margin-left: auto; margin-right: auto;'  alt='Image'>";
       
       echo "</div>";
    
       echo "<div class='item'>";
        echo "<img src=".$imagini[3]." class='img-responsive'  style='max-height: 450px; margin-left: auto; margin-right: auto;'  alt='Image'>";
      
      echo " </div>";
  
     echo "</div>";

    
     echo "<a class='left carousel-control' href='#myCarousel' data-slide='prev'>";
       echo "<span class='glyphicon glyphicon-chevron-left'></span>";
       echo "<span class='sr-only'>Previous</span>";
     echo "</a>";
     echo "<a class='right carousel-control' href='#myCarousel' data-slide='next'>";
       echo "<span class='glyphicon glyphicon-chevron-right'></span>";
       echo "<span class='sr-only'>Next</span>";
     echo "</a>";
   echo "</div>";
        echo "<div class='panel-footer'><b>Pret: </b>" . $pret ." <span class='glyphicon glyphicon-euro'></span> </div>";
      echo "</div></div><div class='col-sm-4'> <div class='panel panel-danger'>";
        echo "<div class='panel-heading'><b>Agent vanzare</b></div>";
        if($avatar == NULL)
                                  echo "<div class='panel-body'><img src='images/agent_default.jpg' class='img-responsive'  style='margin-left: auto; margin-right: auto;''  alt='Image'></div>";
                              else 
                                echo "<div class='panel-body'><img src=".$avatar." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image' height='199' width='150' ></div>";
        echo "<div class='panel-footer'><b>Nume:</b> ".$nume." ".$prenume." </div>";
        echo "<div class='panel-footer'><b>Telefon:</b> ".$telefon." </div>";
        echo "<div class='panel-footer'><b>Email:</b> ".$email."</div>";
      echo "</div>    </div>  </div>";
  echo "<div class='row'> <div class='col-sm-8'> <div class='panel panel-danger'>";
        echo "<div class='panel-heading'><b>CARACTERISTICI</b></div>";
        echo "<div class='panel-footer'><b>Tip contract:</b> ".$tip_contract." </div>";
        echo "<div class='panel-footer'><b>Localitate:</b> ".$localitate."  </div>";
        echo "<div class='panel-footer'><b>Suprafata:</b> ".$suprafata." </div>";
        echo "<div class='panel-footer'><b>Garaj:</b> ".$garaj." </div> ";  
        echo "<div class='panel-footer'><b>Piscina:</b> ".$piscina." </div> ";
        echo "<div class='panel-footer'><b>Camere:</b> ".$camere." </div> ";
        echo "<div class='panel-footer'><b>An Constructie:</b> ".$an_constructie." </div> ";
       // echo "<div class='panel-footer'><b>Suprafata:</b> </div>";
        echo "<div class='panel-footer'><b>Pret: </b>" . $pret ." <span class='glyphicon glyphicon-euro'></span> </div>"; 
       echo "</div>";
     echo "</div>";
   echo "</div>";
   echo "<div class='row'>";
      echo "<div class='col-sm-8'>"; 
       echo "<div class='panel panel-danger'>";
        echo " <div class='panel-heading'><b>INFORMATII SUPLIMENTARE</b></div>";
         echo "<div class='panel-body'>".$info."</div>";
       echo "</div>";
     echo "</div>";
   echo "</div>";

                        }
                        else
                        {
                    
         ?>    



    <div class="col-sm-12">
      
        
  
        
      
    </div>
  </div>
</div><br>

<div class="container">   


  <div class="row">





    <?php
    if (mysqli_num_rows($rezultat) > 0) {

                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                              //
                              

                              echo "<div class='col-sm-4'>";
                              echo "<div class='panel panel-info'>";

                              echo "<div class='panel-heading'><b><a href='case_vanzare.php?id_casa=".$row['id_casa']."&action=view'>". $row["titlu"] ."</a></b></div>";
                              //echo "<div class='panel-body'><img src=". $row["imagine"] ." /></div>";
                              echo "<div class='panel-body'><img src=".$row["imagine"]." class='img-responsive'  style='margin-left: auto; margin-right: auto;'  alt='Image'  ></div>";
                              echo "<div class='panel-footer'><b>Pret: </b>" . $row["pret_casa"] ." <span class='glyphicon glyphicon-euro'></span> </div>";
                              echo "</div>";
                              echo "</div>";
                              
                                }
                            } else {
                                echo "<tr><td colspan='8'>Nu exista case de vanzare!</td></tr>";
                                    }
                                    }
  ?>

  </div>
</div><br><br>



    <br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->

</body>
</html>
