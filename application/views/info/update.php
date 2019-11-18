<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <!-- Content -->
         <?= form_open('info/admin/update/'. $content['id']);?>
         <div class="form-group">
            <label for="title">Judul</label>
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
            <input type="text" class="form-control" id="title" name="title" value="<?= $content['judul']; ?>">
         </div>
         <div class="form-group">
            <label for="subtitle">Deskripsi Singkat</label>
            <?= form_error('subtitle', '<small class="text-danger pl-3">', '</small>'); ?>
            <textarea class="form-control" id="subtitle" name="subtitle" rows="3"><?= $content['subjudul']; ?></textarea>
         </div>
         <div class="form-group">
            <label for="infobody">Isi Info</label>
            <?= form_error('infobody', '<small class="text-danger pl-3">', '</small>'); ?>
            <textarea class="form-control" id="infobody" name="infobody" rows="10"><?= $content['body']; ?></textarea>
         </div>
         <div class="clearfix pr-4">
            <button class="btn btn-info float-right ml-2">Simpan</button>
            <a href="<?= base_url('info/admin') ?>" class="btn btn-outline-info float-right">batal</a>
         </div>

         </form>
         <!-- end Content -->
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->