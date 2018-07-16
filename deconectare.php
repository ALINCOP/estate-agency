<?php

                        require("mysql.php");
                        session_start();

                        if (isset($_SESSION['id_user'])) {
                              session_destroy();
                              echo "<script language='javascript'>alert('Deconectare cu succes!');</script>";
                              echo "<script>location.href='login.php'</script>";
                            }
                        else
                          {
                              echo "Trebuie sa te autentifici mai intai!";
                             echo "<script>location.href='login.php'</script>";
                          }
                        ?>

                                               