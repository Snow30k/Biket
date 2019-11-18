<!-- Image Slader -->
<header>
   <div id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <?php for ($i = 0; $i < sizeof($coursels); $i++) : ?>
            <li data-target="#carousel" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? 'active' : '' ?>"></li>
         <?php endfor ?>
      </ol>
      <div class="carousel-inner" role="listbox">
         <?php $i = 0;
         foreach ($coursels as $coursel) : ?>
            <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>" style="background-image: url('<?= $coursel['link'] ?>')">
               <div class="carousel-caption d-none d-md-block">
                  <h3 class="display-4"><?= $coursel['judul'] ?></h3>
                  <p class="lead"><?= $coursel['deskripsi'] ?></p>
               </div>
            </div>
            <?php $i++;
         endforeach ?>
      </div>
      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</header>

<!-- Content Info Terbaru -->
<div class="container post pt-2">
   <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <div class="post-preview">
            <h2 class="title text-center">
               Info Terbaru
            </h2>
         </div>
         <hr>
         <?php foreach ($info as $i) : ?>
            <div class="post-preview">
               <h2 class="post-title">
                  <?= $i['judul'] ?>
               </h2>
               <h3 class="post-subtitle">
                  <?php echo word_limiter($i['subjudul'], 20); ?>
               </h3>
               <p class="post-meta">Dipost Oleh
                  <a href="#">
                     <?= $user['name'] ?>
                  </a>
                  pada <?= DateTime::createFromFormat('Y-m-d', $i['tgl'])->format('d-m-Y') ?></p>
               <div class="clearfix mt-4 mb-3">
                  <a class="btn btn-info float-right" href="<?= base_url('info/show/').$i['id'] ?>">Selengkapnya &rarr;</a>
               </div>
            </div>
            <hr>
         <?php endforeach ?>
         <!-- Pager -->
         <div class="clearfix text-center">
            <a class="" href="<?= base_url('/info') ?>">Info Lainnya &rarr;</a>
         </div>
      </div>
   </div>
</div>

<!-- Section Profil -->
<div class="container-fluid profil text-center">
   <h3 class="title">Info DKG</h3>
   <div class="row mt-3">
      <div class="col-lg-4">
         <div class="card shadow-sm mt-4">
            <div class="card-body ">
               <h5 class="card-title">Paud</h5>
               <p class="card-text">untuk melihat informasi kebutuhan guru SD kota palu silahkan download file dibawah</p>
               <div class="clearfix text-center">
                  <a class="btn btn-info" href="">Dowwnload &rarr;</a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shadow-sm mt-4">
            <div class="card-body">
               <h5 class="card-title">SD</h5>
               <p class="card-text">untuk melihat informasi kebutuhan guru SD kota palu silahkan download file dibawah</p>
               <div class="clearfix text-center">
                  <a class="btn btn-info" href="<?= base_url('regulasi/download/') ?>FORM_DKG_SEKOLAH_DASAR_2019.xls">Download &rarr;</a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shadow-sm mt-4">
            <div class="card-body">
               <h5 class="card-title">SMP</h5>
               <p class="card-text">untuk melihat informasi kebutuhan guru SD kota palu silahkan download file dibawah</p>
               <div class="clearfix text-center">
                  <a class="btn btn-info" href="<?= base_url('regulasi/download/') ?>FORMAT_ANALISA_KEBUTUHAN_GURU_SMP.xlsx">Download &rarr;</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Section Pegawai Dan Satff -->
<div class="container pegawai">
   <h3 class="title text-center">Pegawai Dan Staff</h3>
   <div id="CardPegawai" class="carousel slide pt-4" data-ride="carousel">
      <div class="carousel-inner corPegawai row w-100 mx-auto">
         <div class="carousel-item col-md-4 active">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>adult-boy-casual-220453.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Bowie Juniper</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>attractive-blurred-background-city-936313.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Zoë Saldana 2</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>beautiful-brunette-cute-774909.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Birdie Leigh</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>attractive-blurred-background-city-936313.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Hayden Christensen</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>beautiful-brunette-cute-774909.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Cyrus Michael Christopher</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>adult-boy-casual-220453.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Daisy Josephine</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
         <div class="carousel-item col-md-4">
            <div class="card">
               <img class="card-img-top img-fluid" src="<?= base_url('assets/img/') ?>beautiful-brunette-cute-774909.jpg" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Forest Leonardo Antonio</h4>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#CardPegawai" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#CardPegawai" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</div>

<hr>

<div class="container ffaq">
   <h3 class="title text-center mb-4">FAQ</h3>
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