<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <div id="msg" data-msg="<?= $this->session->flashdata('message');?>" data-type="<?= $this->session->flashdata('type');?>"></div>
         <a href="<?= base_url('info/admin/regulasi/add') ?>" class="btn btn-info mb-3">Regulasi Baru</a>
         <table class="table table-hover table-bordered" id="submenumanagement">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">File</th>
                  <th scope="col">Tipe</th>
                  <th scope="col">Diupload Oleh</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($regulasi as $re) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $re['judul']; ?></td>
                     <td><?= $re['link']; ?></td>
                     <td><?= $re['tipe']; ?></td>
                     <td><?= $re['user_name']?></td>
                     <td>
                        <a href="<?= base_url('info/admin/regulasi/update/'.$re['id']) ?>" class="badge badge-success">edit</a>
                        <a href="<?= base_url('info/admin/regulasi/delete/'.$re['id']) ?>" class="badge badge-danger info-delete">delete</a>
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