<?php 
if (isset($_POST["sumbit"])) 
{
    if ( tambah_kategori($_POST) > 0 ) 
    {
        // echo "<script>alert('data berhasil di tambahkan');</script>";
        echo "<script>location.href='?pages=kategori';</script>";
        echo "berhasil";
    }else
    {
        echo "<script>alert('data gagal di tambahkan');</script>";
        echo "<script>location.href='?pages=kategori';</script>";
    }
}

?>

<style type="text/css">
    .aksi a
    {
        height: 50px;
        -webkit-transition :1s;
    }
    .aksi:hover 
    {
        transform: scale(1.3);
    }
    .aksi a li:hover
    {
        color: black;
    }

    .panel-title:hover{
        opacity: 0.5;
    }
    .btn-tamkat:hover{
        transform: scale(1.3); transition: 0.8s;
    }
    td{
        overflow-x: hidden !important; 
    }

</style>

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <!-- <div class="header" style="background-color: #f5f5f0">
                <h3 align="center">Tambah Data Kategori Koleksi</h3>
            </div> -->
            <!-- collapse tamba kategori -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title" align="center">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Tambah Data Kategori Koleksi
                  </a>
              </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <form method="POST">   
                    <div class="row clearfix">
                        <!-- <div class="col-sm-2">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="init">INISIAL KATEGORI</label>
                                    <input id="init" type="text" class="form-control" placeholder="S.M" minlength="3" maxlength="3" required pattern="[A-Z]+\.[A-Z]{1,3}$" oninput="reptoup(this)"/>
                                </div>
                            </div>
                        </div> -->
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="namkat">NAMA KATEGORI</label>
                                    <input id="namkat" name="kategori" type="text" class="form-control" placeholder="Buku" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="body" align="center">
                                    <button type="sumbit" name="sumbit" class="btn btn-tamkat bg-blue-grey waves-effect waves-blue">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                 
            </form>
        </div>
    </div>
</div>
<!-- alert cara tambah data -->
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Untuk Tambah Data Kategori Koleksi,Silahkan Seret Mouse Pointer  <li class="fa fa-mouse-pointer"></li> Ke Title "Tambah Kategori Koleksi Di atas!"
</div>
<!-- collapse tamba kategori -->
<div class="body">
    <div class="table-responsive">

        <table id="tabelkategori" class="table display table-striped table-hover dataTable">

            <thead style="background: #f5f5f0; font-size: 100%">
                <tr>
                    <th style="background: #DCDCDC;">No</th>
                    <th>Nama Kategori</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($kategori as $row) :
                 ?>
                 <tr>
                    
                    <td><?= $no; echo "."; ?></td>
                    
                    <td><?= $row["kategori"] ?></td>

                    <td style="background: #DCDCDC;" width="10" height="10">
                        <!-- edit action -->
                        <div id="edit" class="aksi btn-group btn-group-justified" role="group" aria-label="Justified button group">
                            <!-- AKSI EDIT -->
                            <a href="?pages=ubahkat&id=<?= $row["idkategori"]?>" class="expan btn btn-xs bg-cyan waves-effect">
                                <li class="fa fa-edit"></li>    
                            </a>
                            <!-- AKSI HAPUS -->
                            <a href="?pages=hapus&idkat=<?= $row["idkategori"]?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');" class="btn btn-xs bg-red waves-effect"><li class="fa fa-trash-o"></li></a>

                        </div>
                        <!-- END AKSI EDIT -->
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
        // replace karakre spasi jadi titik
        function reptoup(field)
        {
         field.value = field.value.replace(' ','.');
       // uppercase
       field.value = field.value.toUpperCase();
   }
</script>
<!-- #END# Basic Examples -->
<!-- Exportable Table -->
<!-- scrip datatable -->
  <!--   <div class="row clearfix">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="card">
                <div class="body">
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Lorem ipsum dolor sit amet, id fugit tollit pro, illud nostrud aliquando ad est, quo esse dolorum id
                    </div>
                </div>
            </div>
        </div>
    </div> -->