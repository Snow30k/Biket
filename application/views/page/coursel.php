<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="showmodal-add" data-addmodal="<?= (validation_errors()) ? 'true' : 'false' ?>"></div>
   <div id="msg" data-msg="<?= $this->session->flashdata('message'); ?>" data-type="<?= $this->session->flashdata('type'); ?>"></div>
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <a href="" class="btn btn-info mb-4 add-coursel" data-toggle="modal" data-target="#add-modal">Tambah Gambar</a>
         <div class="tab-content shadow-sm" id="faq-tab-content">
            <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
               <div class="accordion card-coursel" id="accordion-tab-1">
                  <?php $i = 1;
                  foreach ($coursels as $coursel) : ?>
                     <div class="card">
                        <div class="card-header" id="accordion-tab-1-heading-<?= $i ?>">
                           <h5>
                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-<?= $i ?>" aria-expanded="false" aria-controls="accordion-tab-1-content-<?= $i ?>">Gambar <?= $i ?></button>
                           </h5>
                        </div>
                        <div class="collapse" id="accordion-tab-1-content-<?= $i ?>" aria-labelledby="accordion-tab-1-heading-<?= $i ?>" data-parent="#accordion-tab-1">
                           <div class="card-body">
                              <?= form_open('/page/coursel/update/'.$coursel['id']); ?>
                                 <div class="form-group">
                                    <label for="exampleFormControlInput1">Gambar</label>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" id="link" name="link" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $coursel['link'] ?>">
                                       <div class="input-group-append">
                                          <button class="btn btn-outline-secondary edit-url-coursel" type="button">Browse</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $coursel['judul'] ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $coursel['deskripsi'] ?></textarea>
                                 </div>
                                 <div class="clearfix">
                                    <button type="submit" class="btn btn-info float-right ml-2">Simpan</button>
                                    <a href="<?= base_url('page/coursel/delete/'.$coursel['id']) ?>" class="btn btn-outline-danger float-right ml-2 info-delete">Hapus</a>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <?php $i++;
                  endforeach ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Add Cursel-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modalTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="add-modaladd-modalLongTitle">Tambah gambar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open('/page/coursel/add') ?>
            <div class="form-group">
               <label for="exampleFormControlInput1">Gambar</label>
               <div class="input-group">
                  <input type="text" class="form-control" id="link-add" name="link-add" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= set_value('link-add'); ?>">
                  <div class="input-group-append">
                     <button class="btn btn-outline-info add-url-coursel" type="button">Browse</button>
                  </div>
               </div>
               <?= form_error('link-add', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
               <label for="judul-add">Judul</label>
               <input type="text" class="form-control" id="judul-add" name="judul-add" value="<?= set_value('judul-add'); ?>">
            </div>
            <div class="form-group">
               <label for="deskripsi-add">Deskripsi</label>
               <textarea class="form-control" id="deskripsi-add" name="deskripsi-add" rows="3"><?= set_value('deskripsi-add'); ?></textarea>
            </div>
            <div class="clearfix">
               <button type="submit" class="btn btn-info float-right ml-2">Simpan</button>
            </div>
            </form>
         </div>
      </div>
   </div>