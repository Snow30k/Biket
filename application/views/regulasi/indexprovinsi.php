<div class="container">
   <div class="row">
      <div class="col-lg-9 p-4">
         <?php foreach ($regulasi as $re) : ?>
            <div class="card card-regulasi mb-3">
               <div class="card-body">
                  <h5 class="card-title text-uppercase"><?= $re['judul'] ?></h5>
                  <p class="card-text">Di Upload Oleh <?= $re['user_name'] ?></p>
                  <div class="clearfix">
                     <a href="<?= base_url('info/admin/regulasi/download/'. $re['link']) ?>" target="_blank" class="btn btn-info float-right">Download</a>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
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