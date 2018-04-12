<?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?>


                                <?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if (isset($hdesde['hora_desde'])) {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?>


                                <?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?>



                                <?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if (isset($hhasta['hora_hasta'])) {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?>