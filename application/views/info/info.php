<div class="container">
   <div class="row">
      <div class="col-lg-9 p-4">
         <div class="container-fluid show-info">
            <h3 class="post-title"><?= $info['judul'] ?></h3>
            <hr>
            <p class="post-meta">Dipost Oleh
               <a href="#">
                  <?= $info['user_name'] ?>
               </a>
               pada <?= DateTime::createFromFormat('Y-m-d', $info['tgl'])->format('d-m-Y') ?></p>
            <?= $info['body'] ?>
         </div>
      </div>
      <div class="col-lg-3 rigth-info border-left">
         <h3>Info Terbaru</h3>
         <hr>
         <?php foreach ($infos as $in) : ?>
            <a href="<?= base_url('info/show/').$in['id'] ?>"><?= $in['judul'] ?></a>
            <hr>
         <?php endforeach ?>
      </div>
   </div>
</div>