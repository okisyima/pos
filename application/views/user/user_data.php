 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Users
         <small>Pengguna</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
         <li class="active">Users</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="bot-title">Data Users</h3>
             <div class="pull-right">
                 <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-user-plus"></i> Create
                 </a>
             </div>
         </div>

         <div class="box-body table-responsive">
             <table class="table table-bordered table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Username</th>
                         <th>Name</th>
                         <th>Address</th>
                         <th>Level</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        foreach ($row->result() as $key) {
                            ?>
                     <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $key->username ?></td>
                         <td><?= $key->name ?></td>
                         <td><?= $key->address ?></td>
                         <td><?= $key->level == 1 ? "Admin" : "Kasir" ?></td>
                         <td class="text-center" width="200px">
                             <form action="<?= base_url('user/delete') ?>" method="post">
                                 <a href="<?= base_url('user/edit/' . $key->id) ?>" class="btn btn-success btn-md">
                                     <i class="fa fa-pencil"></i> Edit
                                 </a>
                                 <input type="hidden" name="id" value="<?= $key->id ?>">
                                 <button onclick="return confirm('apus gak nih?')" class="btn btn-danger btn-md">
                                     <i class="fa fa-trash"></i> Delete
                                 </button>
                             </form>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>

 </section>
 <!-- /.content -->