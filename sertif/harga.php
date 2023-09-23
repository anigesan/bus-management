
<?php include "header.php";?>
<?php
  include('config.php');
  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
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
            <h1>Daftar Harga</h1>
<body>
      <div class="form-container">
      <table class="displaytable">
          <th>Nomor</th>
          <th>Kelas Bus</th>
          <th>Harga (Rp)</th>
          <?php
              $sql = "SELECT no, kelas, harga FROM hargabus";
              $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["no"] . "</td>" . "  
                      " . "<td>" . $row["kelas"] . "</td>" . " 
                      " . "<td>" . $row["harga"] . "</td>" ;
                  echo "</tr>";
                  }
              } else {
                  echo "no results";
              }
          ?>
      </table>
      </div>

      <footer>
        <section class="footer">
          <div class="social">
            <a href="https://www.instagram.com/rgnrm/" target="_blank"><img src="img/instagram.png" alt="instagram" width=35px height=35px></a>
            <a href="#"><img src="img/whatsapp.png" alt="whatsapp" width=35px height=35px></a>
            <a href="https://www.tiktok.com/@anigesan?lang=en" target="_blank"><img src="img/tik-tok.png" alt="tiktok" width=35px height=35px></a>
            <a href="https://www.youtube.com/watch?v=KaSFoOF6Yw0" target="_blank"><img src="img/youtube.png" alt="youtube" width=35px height=35px></a>
          </div>
          <p class="copyright">© 2022 Copyright: Regina Rosa Maria</p>
        </section>
</footer>
  </div>
  </div>
  
    </div>
    
<?php include "footer.php";?>