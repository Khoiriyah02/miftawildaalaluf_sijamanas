<?php

use Master\Datasarpras;
use Master\User;
use Master\Datarequest;
use Master\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$Datasarpras = new Datasarpras($dataKoneksi);
$Datarequest = new Datarequest($dataKoneksi);
$User = new User($dataKoneksi);
//$mahasiswa ->tambah()
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIJAMANAS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">SIJAMANAS</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content sarpras====
            } elseif ($target == "data_sarpras") {
                if ($act == "tambah_data_sarpras") {
                    echo $Datasarpras->tambah();
                } elseif ($act == "simpan_data_sarpras") {
                    if ($Datasarpras->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=data_sarpras'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=data_sarpras'
                        </script>";
                    }
                } elseif ($act == "edit_data_sarpras") {
                    $id = $_GET['id'];
                    echo $Datasarpras->edit($id);
                } elseif ($act == "update_data_sarpras") {
                    if ($Datasarpras->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=data_sarpras'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=data_sarpras'
                        </script>";
                    }
             }  elseif ($act == "delete_data_sarpras") {
                $id = $_GET['id'];
                if ($Datasarpras->delete($id)) {
                    echo "<script>
                    alert ('Data Dihapus')
                    window.location.href = '?target=data_sarpras'
                    </script>";
                } else {
                    echo "<script>
                    alert ('Data Gagal Dihapus')
                    window.location.href = '?target=data_sarpras'
                    </script>";
                }

                }else {
                    echo $Datasarpras->index();
                }
               
                //====And Content sarpras====
            } 
            elseif ($target == "Datarequest") {
                if ($act == "tambah_Datarequest") {
                    echo $Datarequest->tambah();
                } elseif ($act == "simpan_Datarequest") {
                    if ($Datarequest->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=Datarequest'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=Datarequest'
                        </script>";
                    }
                } elseif ($act == "edit_Datarequest") {
                    $id = $_GET['id'];
                    echo $Datarequest->edit($id);
                } elseif ($act == "update_Datarequest") {
                    if ($Datarequest->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=Datarequest'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=Datarequest'
                        </script>";
                    }
             }  elseif ($act == "delete_Datarequest") {
                $id = $_GET['id'];
                if ($Datarequest->delete($id)) {
                    echo "<script>
                    alert ('Data Dihapus')
                    window.location.href = '?target=Datarequest'
                    </script>";
                } else {
                    echo "<script>
                    alert ('Data Gagal Dihapus')
                    window.location.href = '?target=Datarequest'
                    </script>";
                }

                }else {
                    echo $Datarequest->index();
                }

                //====And Content request====
            } elseif ($target == "User") {
                    if ($act == "tambah_User") {
                        echo $User->tambah();
                    } elseif ($act == "simpan_User") {
                        if ($User->simpan()) {
                            echo "<script>
                            alert ('Data Tersimpan')
                            window.location.href = '?target=User'
                            </script>";
                        } else {
                            echo "<script>
                            alert ('Data Gagal Tersimpan')
                            window.location.href = '?target=User'
                            </script>";
                        }
                    } elseif ($act == "edit_User") {
                        $id = $_GET['id'];
                        echo $User->edit($id);
                    } elseif ($act == "update_User") {
                        if ($User->update()) {
                            echo "<script>
                            alert ('Data Diupdate')
                            window.location.href = '?target=User'
                            </script>";
                        } else {
                            echo "<script>
                            alert ('Data Gagal Diupdate')
                            window.location.href = '?target=User'
                            </script>";
                        }
                 }  elseif ($act == "delete_User") {
                    $id = $_GET['id'];
                    if ($User->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=User'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=User'
                        </script>";
                    }
    
                    }else {
                        echo $User->index();
                    }
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>