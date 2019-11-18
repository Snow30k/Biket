<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">
      <div class="col-lg">
         <div id="msg" data-msg="<?= $this->session->flashdata('message');?>" data-type="<?= $this->session->flashdata('type');?>"></div>
         <a href="<?= base_url('info/admin/create') ?>" class="btn btn-info mb-3">Info Baru</a>
         <table class="table table-hover table-bordered" id="submenumanagement">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">upload By</th>
                  <th scope="col">Diupload Pada</th>
                  <th scope="col">aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($info as $sm) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $sm['judul']; ?></td>
                     <td><?= $user['name']; ?></td>
                     <td><?= DateTime::createFromFormat('Y-m-d', $sm['tgl'])->format('d-m-Y') ?></td>
                     <td>
                        <a href="<?= base_url('info/admin/update/').$sm['id'] ?>" class="badge badge-success">edit</a>
                        <a href="<?= base_url('info/admin/delete/').$sm['id'] ?>" class="badge badge-danger info-delete">delete</a>
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