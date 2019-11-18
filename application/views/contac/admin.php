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
         <?= $this->session->flashdata('message'); ?>
         <table class="table table-hover table-striped faq-table" id="submenumanagement">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pertanyaan</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($pesan as $pe) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $pe['nama']; ?></td>
                     <td><?= $pe['pertanyaan']; ?></td>
                     <td><?= $pe['email']; ?></td>
                     <td>
                        <a href="<?= base_url('kontak/balas/'.$pe['id']) ?>" class="badge badge-success">balas</a>
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