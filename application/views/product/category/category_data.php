 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Categories
         <small>Kategori Barang</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
         <li class="active">Categories</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <?php $this->view('message'); ?>

     <div class="box">
         <div class="box-header">
             <h3 class="bot-title">Data Categories</h3>
             <div class="pull-right">
                 <a href="<?= base_url('category/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-plus"></i> Create
                 </a>
             </div>
         </div>

         <div class="box-body table-responsive">
             <table class="table table-bordered table-striped" id="table1">
                 <thead>
                     <tr>
                         <th class="text-center">#</th>
                         <th>Name</th>
                         <th class="text-center">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        foreach ($row->result() as $key) {
                            ?>
                     <tr>
                         <td class="text-center" width="50px"><?= $no++; ?></td>
                         <td><?= $key->name ?></td>
                         <td class="text-center" width="200px">
                             <a href="<?= base_url('category/edit/' . $key->id) ?>" class="btn btn-success btn-md">
                                 <i class="fa fa-edit"></i> Edit
                             </a>
                             <a href="<?= base_url('category/delete/' . $key->id) ?>" onclick="return confirm('apus kaga nih?')" class="btn btn-danger btn-md">
                                 <i class="fa fa-trash"></i> Delete
                             </a>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>

 </section>
 <!-- /.content -->