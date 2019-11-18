<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div id="msg" data-msg="<?= $this->session->flashdata('message'); ?>" data-type="<?= $this->session->flashdata('type'); ?>"></div>
      <div class="col-lg">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?php echo validation_errors(); ?>
            </div>
         <?php endif ?>
         <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#addFAQ">Tambah FAQ</a>
         <table class="table table-hover table-bordered faq-table" id="submenumanagement">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pertanyaan</th>
                  <th scope="col">Jawaban</th>
                  <th scope="col">aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($faq as $sm) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $sm['pertanyaan']; ?></td>
                     <td><?= $sm['jawaban']; ?></td>
                     <td>
                        <a href="" data-id="<?= $sm['id'] ?>" class="badge badge-success faq-edit">edit</a>
                        <a href="<?= base_url('info/admin/faq/delete/' . $sm['id']) ?>" class="badge badge-danger info-delete">delete</a>
                     </td>
                  </tr>
                  <?php $i++; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Add FAQ-->
<div class="modal fade" id="addFAQ" tabindex="-1" role="dialog" aria-labelledby="addFAQTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addFAQLongTitle">Add FAQ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open('/info/admin/faq/addfaq') ?>
            <div class="form-group">
               <label for="pertanyaan">Pertanyaan</label>
               <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3"><?php echo set_value('pertanyaan'); ?></textarea>
            </div>
            <div class="form-group">
               <label for="jawaban">Jawaban</label>
               <textarea class="form-control" id="jawaban" name="jawaban" rows="3"><?php echo set_value('jawaban'); ?></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Simpan</button>
         </div>
         </form>
      </div>
   </div>
</div>

<!-- Modal UPdate FAQ-->
<div class="modal fade" id="updateFAQ" tabindex="-1" role="dialog" aria-labelledby="updateFAQTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="updateFAQLongTitle">Add FAQ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open('', ['id' => 'frm-update-faq']); ?>
            <div class="form-group">
               <label for="pertanyaan">Pertanyaan</label>
               <textarea class="form-control" id="update_pertanyaan" name="update_pertanyaan" rows="3"><?php echo set_value('update_pertanyaan'); ?></textarea>
            </div>
            <div class="form-group">
               <label for="jawaban">Jawaban</label>
               <textarea class="form-control" id="update_jawaban" name="update_jawaban" rows="3"><?php echo set_value('update_jawaban'); ?></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Simpan</button>
         </div>
         </form>
      </div>
   </div>
</div>