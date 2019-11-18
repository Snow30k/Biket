<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <?= validation_errors() ?>
         <?= $error ?>
         <?= form_open_multipart('info/admin/regulasi/add'); ?>
            <div class="form-group">
               <label for="judul">Judul Regulasi</label>
               <textarea class="form-control" id="judul" name="judul" rows="3"></textarea>
            </div>
            <div class="form-group">
               <label for="tipe">Tipe</label>
               <select class="form-control" id="tipe" name="tipe">
                  <option value="Nasional">Nasional</option>
                  <option value="Provinsi">Provinsi</option>
               </select>
            </div>
            <div class="form-group">
               <label for="input-regulasi">File</label>
               <input type="file" class="form-control-file" id="input-regulasi" name="input-regulasi">
            </div>
            <div class="clearfix">
               <button type="submit" class="btn btn-info float-right mt-5" value="upload">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->