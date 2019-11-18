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
                     <?= $i['user_name'] ?>
                  </a>
                  pada <?= DateTime::createFromFormat('Y-m-d', $i['tgl'])->format('d-m-Y') ?></p>
               <div class="clearfix mt-4 mb-3">
                  <a class="btn btn-info float-right" href="<?= base_url('info/show/').$i['id'] ?>">Selengkapnya &rarr;</a>
               </div>
            </div>
            <hr>
         <?php endforeach ?>
         <hr>
         <!-- Pager -->
      </div>
   </div>
</div>