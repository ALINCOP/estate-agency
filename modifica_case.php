<!DOCTYPE html>
<html>
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
                        session_start();
                        $admin=0;
                        //echo $_SESSION['id_user'];
                        if(isset($_SESSION['id_user'])) // daca exista valaore in $_SESSION inseamna ca is conectat 
                            {
                              $query = "SELECT nume,prenume,admin FROM useri where id_user=".$_SESSION['id_user'];
                              $rezultat1 = mysqli_query($conexiune, $query) or die ('Eroare');
                               while($row = mysqli_fetch_array($rezultat1))
                              {
                                $admin=$row["admin"];
                                $numeadmin=$row["nume"];
                                $prenumeadmin=$row["prenume"];
                                }
                              if($admin!=0)
                              {
                            
                          //echo "log in cu succes";
                          $query = "SELECT * FROM case_vile;";
                          $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');

                        ?>
                        

<div class="row">
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Adauga proprietate
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="adauga_apartament.php">Apartamente</a></li>
          <li><a href="adauga_casa.php">Case/Vile</a></li>
          <li><a href="adauga_teren.php">Terenuri</a></li>     
        </ul>
      </li>
      <li class="active-admin" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Modifica proprietate
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="modifica_apartamente.php">Apartamente</a></li>
          <li><a href="modifica_case.php">Case/Vile</a></li>
          <li><a href="modifica_terenuri.php">Terenuri</a></li>     
        </ul>
      </li>
      <li><a href="adauga_postare.php">Adauga postare</a></li>
      <li ><a href="modifica_postare.php">Modifica postare</a></li>
      <li ><a href="modifica_useri.php">Modifica utilizatori</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php"><?php echo $numeadmin." ".$prenumeadmin;?></a></li>          
      </ul>
  </div>
</nav>


</div> 
 
</div>

<div class="container">    
  <div class="row">
      
      <div class="panel panel-info">
      <div class="panel-heading">Case/Vile</div>
      <div class="panel-body"> <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Titlu</th>
        <th>Contract</th>
        <th>Pret</th>
        <th>Localitate</th>
        <th>Sterge</th>
        <th>Editeaza</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $action = "view";
       if (isset($_GET['id_casa'])) {
                            $id_casa = $_GET['id_casa'];
                                if (isset($_GET['action'])) {
                                    $action = $_GET['action'];
                                                }
                                 }
      if ($action == "delete") {
                        //delete record
                        $query = "DELETE from case_vile where id_casa=".$id_casa; // sterge automat si pozele- cascade
                        $result=mysqli_query($conexiune, $query);

                        if (!$result) {
                            echo mysqli_error($conexiune);
                        } else {
                            echo "<script language='javascript'>alert('Ștergere efectuată!');</script>";
                            echo "<meta http-equiv=\"refresh\" content=\"2; URL='modifica_case.php'\" >";

                        }
                    }


      if (mysqli_num_rows($rezultat) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["id_casa"] . "</td>";
                                echo "<td>" . $row["titlu"] . "</td>";
                                echo "<td>" . $row["tip_contract"] . "</td>";
                                echo "<td>" . $row["pret_casa"] . " <span class='glyphicon glyphicon-euro'></span></td>";
                                echo "<td>" . $row["localitate"] . "</td>";
                                //echo "<td> <a href='mailto:'". $row["email"] .">". $row["email"] ."</a> </td>";
                                echo "<td>  <a href='modifica_case.php?id_casa=".$row['id_casa']."&action=delete'><img src='images/delete.png' alt='delete icon' width='30px'></a></td>";
                                echo "<td><a href='mod_casa.php?id_casa=" . $row['id_casa'] . " '><img src='images/edit.png' alt='edit icon' width='30px'></a></td>";
                                echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Nu aveti case</td></tr>";
                                    }


      ?>
    </tbody>
  </table>
  </div></div>
    </div>
    
  </div>
  

  </div>
  <?php
}
else 
                          {echo "<h2>Nu ai acces la aceasta pagina!</h2>";
                          echo "<p>Înapoi la <a href='index.php'>prima pagina</a>"; }
                          
}
                        else
                          {echo "<h2>Nu ai acces la aceasta pagina!</h2>";
                          echo "<p>Înapoi la <a href='index.php'>prima pagina</a>"; }
                          mysqli_close($conexiune); 
?>
</div><br><br>



<br>
<!--<footer class="container-fluid text-center">
  <p>Copindean Alin Copyright</p>  
  
</footer> -->

</body>
</html>
