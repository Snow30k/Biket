<div class="container">
   <div class="row">
      <div class="col-lg-9 p-4 contac">
         <h3 class="c-title">Anda Mempunyai Pertanyaan ?</h3>
         <p>Coba cek beberapa pertanyaan dibawah ini. Mungkin saja pertanyaan anda suda pernah ditanyakan oleh orang lain dan kami suda menjawabnya.</p>
         <div class="container ffaq mt-0 p-0">
            <div class="tab-content shadow-sm" id="faq-tab-content">
               <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                  <div class="accordion" id="accordion-tab-1">
                     <?php $ii = 1 ?>
                     <?php foreach ($faq as $f) : ?>
                        <div class="card">
                           <div class="card-header" id="accordion-tab-1-heading-<?= $ii ?>">
                              <h5>
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-<?= $ii ?>" aria-expanded="false" aria-controls="accordion-tab-1-content-<?= $ii ?>"><?= $f['pertanyaan'] ?></button>
                              </h5>
                           </div>
                           <div class="collapse" id="accordion-tab-1-content-<?= $ii ?>" aria-labelledby="accordion-tab-1-heading-<?= $ii ?>" data-parent="#accordion-tab-1">
                              <div class="card-body">
                                 <p><?= $f['jawaban'] ?></p>
                              </div>
                           </div>
                        </div>
                        <?php $ii += 1 ?>
                     <?php endforeach ?>
                  </div>
               </div>
            </div>
         </div>
         <h3 class="c-title">Tidak Menemukan Pertanyaan Anda ?</h3>
         <p>Silahkan isi form dibawah beserta pertanyaan anda. Kami akan menjawab pertanyaa anda secepat yang kami bisa. jawaban pertanyaan anda akan kami kirim ke email anda.</p>

         <div class="container-fluid bg-light pt-3 pb-3 shadow-sm">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open('/kontak') ?>
            <div class="form-group">
               <label for="nama">Nama Lengkap</label>
               <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
               <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= set_value('email') ?>">
               <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
               <label for="pertanyaan">Pertanyaan</label>
               <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3">
                  <?= set_value('pertanyaan') ?>
                  </textarea>
               <?= form_error('pertanyaan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="clearfix">
               <button type="submit" class="btn btn-info float-right font-weight-bold">kirim</button>
            </div>
            </>
         </div>

      </div>
      <div class="col-lg-3 rigth-info border-left">
         <h3>Info Terbaru</h3>
         <hr>
         <?php foreach ($infos as $in) : ?>
            <a href="<?= base_url('info/show/') . $in['id'] ?>"><?= $in['judul'] ?></a>
            <hr>
         <?php endforeach ?>
      </div>
   </div>
</div>