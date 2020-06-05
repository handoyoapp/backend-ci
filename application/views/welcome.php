<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>BackEnd | BelajarAplikasi</title>
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   </head>
<body>
   <div id="wrapper">
   <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="<?php echo    base_url();?>index.php/welcome/welcome">BackEnd</a>
      </div>
      <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
Akses Terakhir : 04 Juli 2018 &nbsp; <a href="<?php echo base_url();?>index.php/welcome/welcome" class="btn btn-danger square-btn-adjust">Logout</a>
      </div>
   </nav>
   <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
         <ul class="nav" id="main-menu">
            <li class="text-center">
               <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>
            </li>
            <li>
               <a href="#"><i class="fa fa-dashboard fa-3x"></i> Dasbor</a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/welcome/welcome"><i class="fa fa-edit fa-3x"></i> Data Produk</a>
            </li>
         </ul>
      </div>
   </nav>
   <div id="page-wrapper">
   <div id="page-inner">
   <div class="row">
   <div class="col-md-12">
   <h2>Master Produk</h2>
   <h5>Olah Data Produk | BelajarAplikasi.com </h5>
   </div>
   </div>
   <!-- TABLE -->
   <hr />
   <div class="panel panel-default">
   <div class="panel-heading">
   Daftar Produk
   </div>
   <div class="row">
   <div class="col-md-12" style="padding-top:15px;">
   <div class="col-sm-6">
   <input type="hidden" name="service_url" id="service_url" class="form-control" value="<?php echo base_url();?>"/>
   <button class="btn btn-danger btn-sm"   onclick="btn_tambah();"><span class="fa fa-plus"></span> Tambah</button>
   </div>
   </div>
   <!-- Tambah Modals -->
   <form action="<?php echo base_url();?>index.php/welcome/simpan_produk" method="post" enctype="multipart/form-data">
   <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" name="id_barang" id="id_barang" class="form-control" placeholder="ID Produk"/>
               <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Produk"/>
            </div>
            <div class="form-group">
               <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga"/>
            </div>
            <div class="form-group">
               <input type="text" name="stok" id="stok" class="form-control" placeholder="Stok"/>
            </div>
            <div class="form-group">
               <img id="imgView" data-src="holder.js/200x200" src="#" height="200" width="200" style="border: 1px solid #cccccc;padding: 3px;border-radius: 3px;"/>
            </div>
            <input type="file" name="image" id="image" onchange="readURL(this);" class="form-control"/>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
         </div>
         </div>
      </div>
   </div>
   </form>
   <!-- End Modals -->

   <!-- Edit Modals -->
   <form action="<?php echo base_url();?>index.php/welcome/edit_produk" method="post" enctype="multipart/form-data">
   <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" name="e_id_barang" id="e_id_barang" class="form-control" placeholder="ID Produk"/>
               <input type="hidden" name="e_img" id="e_img" class="form-control"/>
               <input type="text" name="e_nama_barang" id="e_nama_barang" class="form-control" placeholder="Nama Produk"/>
            </div>
            <div class="form-group">
                <input type="text" name="e_harga" id="e_harga" class="form-control" placeholder="Harga"/>
            </div>
            <div class="form-group">
               <input type="text" name="e_stok" id="e_stok" class="form-control" placeholder="Stok"/>
            </div>
            <div class="form-group">
               <img id="e_imgView" data-src="holder.js/200x200" src="#" height="200" width="200" style="border: 1px solid #cccccc;padding: 3px;border-radius: 3px;"/>
            </div>
            <input type="file" name="e_image" id="e_image" onchange="e_readURL(this);" class="form-control"/>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
         </div>
         </div>
      </div>
   </div>
   </form>
   <!-- End Modals -->
   </div>

   <div class="panel-body">
   <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover dataTable no-footer">
   <thead>
      <tr>
         <th style="text-align:center;">No</th>
         <th style="text-align:center;">Nama Barang</th>
         <th style="text-align:center;">Harga</th>
         <th style="text-align:center;">Stok</th>
         <th style="text-align:center;">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $no=$page+1;
      if(!empty($results)) {
         foreach ($results as $row)
         {
            $id = $row->id_barang;
            $nama = $row->nama_barang;
            $harga = $row->harga;
            $stok = $row->stok;
            $img = $row->img;
            echo '<tr>
                     <td>'.$no.'</td>
                     <td>'.$nama.'</td>
                     <td style="text-align:right;">'.number_format($harga,'0',',','.').'</td>
                     <td style="text-align:center;">'.$stok.'</td>
                     <td style="text-align:center;">
                     <a href="#" onclick="btn_edit(\''.$id.'\',\''.$nama.'\',\''.$harga.'\',\''.$stok.'\',\''.$img.'\');"><span class="fa fa-edit"></span> Edit</a> |
                     <a href="'.base_url().'index.php/welcome/hapus_produk?id='.$id.'&img='.$img.'" onclick="return check_hapus(\''.$id.'\',\''.$nama.'\')"><span class="fa fa-eraser"></span> Hapus</a>
                     </td>
                  </tr>';
            $no++;
         }
      }
      ?>
   </tbody>
   </table>
   </div>
   <div class="row">
   <div class="col-sm-6">
      <div class="dataTables_info" style="margin-top:-5px;margin-bottom:10px;">
         Menampilkan data 1 - <?php echo $no-1;?> dari <?php echo $ttl_row;?> Produk
      </div>
   </div>
   <div class="col-sm-6">
      <div class="pull-right">
         <ul class="pagination" style="margin-top:-50px;margin-bottom:-20px;">
   <p><?php echo $links; ?></p>
         </ul>
      </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
   <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
   <script src="<?php echo base_url();?>assets/js/custom.js"></script>
   <script>
   function btn_tambah() {
      $('#modalTambah').on('shown.bs.modal', function() {
         $('#nama_barang').focus();
      })
      $('#id_barang').val('');
      $('#nama_barang').val('');
      $('#harga').val('');
      $('#stok').val('');
      $('#modalTambah').modal('show');
   }
   function btn_edit(id,nama,harga,stok,img) {
      var service_url = $('#service_url').val();
      $('#modalEdit').on('shown.bs.modal', function() {
         $('#e_nama_barang').focus();
      })
      $('#e_id_barang').val(id);
      $('#e_nama_barang').val(nama);
      $('#e_harga').val(harga);
      $('#e_stok').val(stok);
      $('#e_img').val(img);
      var path = img; //service_url + 'uploads/' + img;
      $('#e_imgView').attr('src', path);
      $('#modalEdit').modal('show'); 
   }
   function check_hapus(id,nama) {
      var iya = confirm('Yakin produk "'+ nama +'" ingin dihapus ?');
      if (iya){
      } else {
         return false;
      } 
   }
   function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
            $('#imgView').attr('src', e.target.result);
            $('#imgView').show();
         }
         reader.readAsDataURL(input.files[0]);
      }
   }
   function e_readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
            $('#e_imgView').attr('src', e.target.result);
            $('#e_imgView').show();
         }
         reader.readAsDataURL(input.files[0]);
      }
   }
   </script>
</body>
</html>