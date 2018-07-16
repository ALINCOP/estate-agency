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
                            
                          
                          $query = "SELECT * FROM contact;";
                          $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');

                        ?>
                        

<div class="row">
       <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active-admin" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Adauga proprietate
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="adauga_apartament.php">Apartamente</a></li>
          <li><a href="adauga_casa.php">Case/Vile</a></li>
          <li><a href="adauga_teren.php">Terenuri</a></li>     
        </ul>
      </li>
      <li  class="dropdown">
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
 
</div><br>

<div class="container">    
  
  <div class="row">
      
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
                              $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
                              $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                              move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
                              $file2 = $_FILES["fileToUpload2"]["tmp_name"];
                              $target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
                              $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
                              move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
                              $file3 = $_FILES["fileToUpload3"]["tmp_name"];
                              $id_agent=$_SESSION['id_user'];
                            $titlu = $_POST['titlu'];
                            $camere = $_POST['camere'];
                            $pret = $_POST['pret'];
                            $localitate = $_POST['localitatea'];
                            $suprafata = $_POST['suprafata'];
                            $an_constructie = $_POST['an'];
                            $Etaj = $_POST['etaj'];
                            $tip_contract = $_POST['contract'];
                            $info = $_POST['informatii'];
                            //$nr_foto = $_POST['nr_foto'];       



                            $query = "INSERT INTO apartamente (titlu,camere,pret,localitate,an_constructie,id_agent,suprafata,info,Etaj,tip_contract)
                                VALUES ('$titlu', '$camere','$pret','$localitate','$an_constructie' ,'$id_agent' , '$suprafata' , '$info' , '$Etaj', '$tip_contract');";

                            $result=mysqli_query($conexiune, $query);

                            if (!$result) {
                              echo mysqli_error($conexiune);
                            } else {     
                              // "SELECT admin FROM useri where id_user=".$_SESSION['id_user'];
                                $query1 = "SELECT id_apartament FROM apartamente ORDER BY id_apartament DESC LIMIT 1;";

                                $result2=mysqli_query($conexiune, $query1) or die ('Eroare');
                                 while($row = mysqli_fetch_array($result2))                               
                                                                
                                  {
                                    //echo "<script language='javascript'>console.info('aici')</script>";

                                          $id_apartament=$row["id_apartament"];
                                          //echo $id_teren;
                                }

                                if (!empty($file))
                                  {
                                    $query = "INSERT INTO imagini (locatie_imagine,id_apartament)
                                  VALUES ('$target_file', '$id_apartament');";
                                  $result=mysqli_query($conexiune, $query);
                                }
                                if (!empty($file2))
                                  {
                                    $query = "INSERT INTO imagini (locatie_imagine,id_apartament)
                                  VALUES ('$target_file2', '$id_apartament');";
                                  $result=mysqli_query($conexiune, $query);
                                }
                                if (!empty($file3))
                                  {
                                    $query = "INSERT INTO imagini (locatie_imagine,id_apartament)
                                  VALUES ('$target_file3', '$id_apartament');";
                                  $result=mysqli_query($conexiune, $query);
                                }

                                
                                if (!$result) {
                              echo mysqli_error($conexiune);
                            } else {
                              echo "<h2>Inserare efectuată cu success!</h2>";
                              echo "<p>Înapoi la <a href='admin.php'>pagina de admin</a>";
                                }
                            }


                        } else {
                            //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                        
                        ?>



      <div class="panel panel-info">
      <div class="panel-body">
        <form role="form" id="formular_contact" action="adauga_apartament.php" method="post" enctype="multipart/form-data">

  <div class="row">
                <div class="col-sm-12 form-group">
                    <label >
                        Titlu:</label>
                    <input type="text" class="form-control" id="titlu" name="titlu" required="" placeholder="Titlu vizibil pentru publicare">
                </div></div>
    <div class="row">             <div class="col-sm-6 form-group">
                    <label for="tip_teren">Localitatea:</label>
                      <select class="form-control" id="localitatea" name="localitatea">
                            <option>Alba-Iulia</option>
                            <option>Cluj-Napoca</option>
                            <option>Sibiu</option>
                      </select>
                </div>
               <div class="col-sm-6 form-group">
                    <label >
                        Pret:</label>
                    <input type="number" class="form-control" id="pret" name="pret" required="" placeholder="Pret in euro">
                </div></div>
       <div class="row">             <div class="col-sm-6 form-group">
                    <label for="tip_teren">Camere:</label>
                      <input type="text" class="form-control" id="camere" name="camere" required="" placeholder="Camere apartament">
                </div>
               <div class="col-sm-6 form-group">
                    <label >
                        An Constructie:</label>
                    <input type="number" class="form-control" id="an" name="an" required="" placeholder="Anul Constructiei">
                </div></div>
      <div class="row">            <div class="col-sm-6 form-group">
                    <label >
                        Suprafata:</label>
                     <input type="text" class="form-control" id="suprafata" name="suprafata" required="" placeholder="Suprafata(mp)">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="tip_teren">Etaj:</label>
                      <input type="text" class="form-control" id="etaj" name="etaj" required="" placeholder="Etaj ex: 3/5">
                </div></div>
      <div class="row">            
                <div class="col-sm-6 form-group">
              <label for="tip_teren">Tipul contractului:</label>
                      <select class="form-control" id="contract" name="contract">
                            <option>De vanzare</option>
                            <option>De inchiriere</option>
                      </select>
                </div></div>
            <!--<div class="row">             <div class="col-sm-6 form-group">
                    <label for="tip_teren">Numar de fotografii:</label>
                      <select class="form-control" id="nr_foto" name="nr_foto">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                      </select>
                </div></div>-->
       <div class="row">            <div class="col-sm-12 form-group">
                    <label >
                        Fotografii:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        
                        <input type="file" name="fileToUpload2" id="fileToUpload2">

                        <input type="file" name="fileToUpload3" id="fileToUpload3">
                        
                    
                </div></div>
            <div class="row">
            <div class="col-sm-12 form-group">
            <label for="comment">Informatii:</label>
                  <textarea class="form-control" rows="3" id="informatii" name="informatii" required="" placeholder="Informatii suplimentare despre proprietate"></textarea>
</div>
            </div>
            
                        
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-default pull-right" value="Upload Image" name="submit">ADAUGA</button>
                </div>
            </div>

</form>

      </div>
    </div>
    
  </div>

  </div>
  <?php

                        }
                        

                ?>
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
