<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Pemasukan</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo2.png" alt="">
            </div>

            <span class="logo_name">Fundify</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a href="index.html">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Home</span>
                    </a>
                </li>
                <li><a href="pemasukan.html">
                        <i class="uil uil-folder-plus"></i>
                        <span class="link-name">Pemasukan</span>
                    </a></li>
                <li><a href="pengeluaran.html">
                        <i class="uil uil-folder-minus"></i>
                        <span class="link-name">Pengeluaran</span>
                    </a></li>
                <li><a href="grafik.html">
                        <i class="uil uil-analytics"></i>
                        <span class="link-name">Grafik</span>
                    </a></li>
                <li><a href="about.html">
                        <i class="uil uil-cloud-info"></i>
                        <span class="link-name">About</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <i class="uil uil-user-circle profile"></i>
        </div>
            <!-- konten utama -->
            <div class="dash-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">Pemasukan</h3>
                                <a class="btn btn-primary" href="tambah_data.php" role="button">Tambah</a>
                                <!--INSERT TABLE-->
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal masuk</th>
                                        <th>Jumlah masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $no=1;
                                        $query = "SELECT akun.id_akun, akun.fullname, akun.email, akun.jabatan, pemasukan.tanggal, pemasukan.jumlah 
                                            FROM akun 
                                            JOIN pemasukan ON akun.id_akun = pemasukan.id_akun";
                                        $result = mysqli_query($conn, $query);
                                        
                                        if (!$result) {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        
                                        $no = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $no . "</td>";
                                            echo "<td>" . $row['fullname'] . "</td>";
                                            echo "<td>" . $row['jabatan'] . "</td>";
                                            echo "<td>" . $row['tanggal'] . "</td>"; 
                                            echo "<td>" . $row['jumlah'] . "</td>"; 
                                            echo "<td><a class='btn btn-success' href='update_data.php?id=" . $no . "'>Update</a>";
                                            echo "<a class='btn btn-danger' href='delete.php?id=" . $no . "'>Delete</a></td>";
                                            echo "</tr>";
                                            $no++;
                                        }
                              
                                        ?>
                                        </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="script.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
                    
</body>

</html>