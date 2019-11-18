<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <?= form_open('kontak/balas/'.$pesan['id']) ?>
            <div class="form-group">
               <small class="d-block">Nama : </small>
               <label><?= $pesan['nama'] ?></label>
            </div>
            <div class="form-group">
               <small class="d-block">Email : </small>
               <label><?= $pesan['email'] ?></label>
            </div>
            <div class="form-group">
               <small class="d-block">Pertanyaan : </small>
               <label><?= $pesan['pertanyaan'] ?></label>
            </div>
            <div class="form-group">
               <small for="jawab">Jawaban Balasan</small>
               <textarea class="form-control" id="jawab" name="jawab" rows="5"></textarea>
               <?= form_error('jawab', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="clearfix">
               <button type="submit" class="btn btn-info float-right">Balas</button>
               <a href="<?= base_url('kotak/pesan') ?>" class="btn btn-outline-info mr-3 float-right">Kembali</a>
            </div>
         </>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->