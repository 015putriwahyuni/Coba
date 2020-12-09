
<?php 
if (isset($_POST['cari'])) {
  $cari = $_POST['cari'];
} else {
  $cari = "";
}
?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Mahasiswa
          
          <div class="pull-right btn-tambah">
            <form class="form-inline" method="POST" action="home2.php">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" name="cari" placeholder="Cari ..." autocomplete="off" value="<?php echo $cari; ?>">
                </div>
              </div>
              
               <a class="btn btn-danger" href="?page=logout">
                <i ></i> Logout
              </a>


            </form>
          </div>
          
        </h4>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Siswa</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>No. Telepon</th>
                </tr>
              </thead>   

              <tbody>
              <?php
              /* Pagination */
              $batas = 5;

              if (isset($cari)) {
                $jumlah_record = mysqli_query($db, "SELECT * FROM mhs
                                                    WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'")
                                                    or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($db));
              } else {
                $jumlah_record = mysqli_query($db, "SELECT * FROM mhs")
                                                    or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($db));
              }

              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($cari)) {
                $query = mysqli_query($db, "SELECT * FROM mhs
                                            WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%' 
                                            ORDER BY nim DESC LIMIT $mulai, $batas") 
                                            or die('Ada kesalahan pada query siswa: '.mysqli_error($db));
              } else {
                $query = mysqli_query($db, "SELECT * FROM mhs
                                            ORDER BY nim DESC LIMIT $mulai, $batas")
                                            or die('Ada kesalahan pada query siswa: '.mysqli_error($db));
              }
              
              while ($data = mysqli_fetch_assoc($query)) {

                $tanggal        = $data['tanggal_lahir'];
                $tgl            = explode('-',$tanggal);
                $tanggal_lahir  = $tgl[2]."-".$tgl[1]."-".$tgl[0];

                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[nim]</td>
                      <td width='150'>$data[nama]</td>
                      <td width='180'>$data[tempat_lahir], $tanggal_lahir</td>
                      <td width='120'>$data[jenis_kelamin]</td>
                      <td width='120'>$data[agama]</td>
                      <td width='250'>$data[alamat]</td>
                      <td width='80'>$data[no_telepon]</td>";
              ?>
                        
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
              ?>
              </tbody>           
            </table>
          
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->