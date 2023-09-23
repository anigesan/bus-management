<?php include "header.php";?>
<?php
include "config.php";
$nama = "";
$hargatiket = 0;
$total = 0;
if (isset($_POST['totalharga'])){
$nama = $_POST['nama']; 
$noktp = $_POST['noktp'];
$nohp = $_POST['nohp'];
$kelas = $_POST['kelas'];
$tanggal = $_POST['tanggal'];
$jumlahpenumpang = $_POST['jumlahpenumpang'];
$jumlahlansia = $_POST['jumlahlansia'];


if ($kelas=="ekonomi"){
    $hargatiket=50000;
    }
else if ($kelas=="bisnis"){
    $hargatiket=100000;
    }
else {
    $hargatiket=200000;
    }
$harga=$jumlahpenumpang*$hargatiket;

if ($jumlahlansia >= 1){
    $diskon=0.1 * $hargatiket;
    }
else{
    $diskon=0;
    }

$totaldiskon = $diskon * $jumlahlansia;
$total= $harga - $totaldiskon;
}

if(isset($_POST['cancel'])){
    $name = "";
    $ID = "";
    $phone = "";
    $kelas = "";
    $qty = "";
    $qtyLansia = "";
}
?>

     <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">@reginarosamaria</a>
                            </li>
                
                        </ul>
                    </div>
                </div>
            </nav>
            <form action="" method="POST" class="form-container1">

<label for="nama"><b>Nama Lengkap</b></label>
<input type="text" placeholder="Isi nama lengkap" name="nama" required>
<br>

<label for="noktp"><b>Nomor Identitas</b></label>
<input type="text" placeholder="Isi nomor KTP" name="noktp" required> 
<br>

<label for="nohp"><b>No. HP</b></label>
<input type="text" placeholder="Isi nomor HP" name="nohp" required> 
<br>

<label for="kelas"><b>Kelas Penumpang</b></label>
<select name="kelas" required>
    <option name="ekonomi" value="ekonomi">Kelas Ekonomi</option>
    <option name="bisnis" value="bisnis">Kelas Bisnis</option>
    <option name="eksekutif" value="eksekutif">Kelas Eksekutif</option>
</select>
<br>

<label for="tanggal"><b>Tanggal Keberangkatan</b></label>
      <input type="date" onload="getDate()" name="tanggal" required>
      <br>

<label for="jumlahpenumpang"><b>Jumlah Penumpang (Usia < 60 tahun) </b></label>
<input type="text" placeholder="Isi jumlah penumpang < 60 tahun" name="jumlahpenumpang" required>
<br>

<label for="jumlahlansia"><b>Jumlah Penumpang Lansia (Usia > 60 tahun) </b></label>
<input type="text" placeholder="Isi jumlah penumpang > 60 tahun" name="jumlahlansia" required>
<br>

<label for="hargatiket"><b>Harga tiket</b></label>
<?php echo "Rp." . $hargatiket; ?>
<br>

<label for="total"><b>Total </b></label>
<?php echo "Rp." . $total; ?>
<br>

<input type="checkbox" id="scales" name="scales"
             checked>
<p for="scales">Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.</p>

<button type="submit" name="totalharga" onclick="location.href='tiket.php'">Hitung Total Bayar</button>
<button type="submit" name="pesantiket" onclick="location.href='pesantiket.php'">Pesan Tiket</button>
<button type="submit" name="cancel" onclick="location.href='tiket.php'">Cancel</button>

<?php
if (isset($_POST['pesantiket'])){
$nama = $_POST['nama']; 
$noktp = $_POST['noktp'];
$nohp = $_POST['nohp'];
$kelas = $_POST['kelas'];
$tanggal = $_POST['tanggal'];
$jumlahpenumpang = $_POST['jumlahpenumpang'];
$jumlahlansia = $_POST['jumlahlansia'];
$hargatiket;
$total;

if ($kelas=="ekonomi"){
    $hargatiket=50000;
    }
else if ($kelas=="bisnis"){
    $hargatiket=100000;
    }
else {
    $hargatiket=200000;
    }
$harga=$jumlahpenumpang*$hargatiket;

if ($jumlahlansia >= 1){
    $diskon=0.1 * $hargatiket;
    }
else{
    $diskon=0;
    }

$totaldiskon = $diskon * $jumlahlansia;
$total= $harga - $totaldiskon;

  $query = "INSERT INTO tiket SET nama='$nama', noktp='$noktp', nohp='$nohp',
            kelas='$kelas', tanggal='$tanggal', jumlahpenumpang='$jumlahpenumpang', jumlahlansia='$jumlahlansia',
            hargatiket='$hargatiket', total='$total'";

    if (mysqli_query($db, $query)){
        ?>
          <br> <br> <p  class="form-container1">Tiket berhasil dipesan!</p>
        <?php
      } else {
        ?>
          <p> Error </p>
        <?php
      }
}
?>

</div>
    </div>
<?php include "footer.php";?>

