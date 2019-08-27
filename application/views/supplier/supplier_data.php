 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Suppliers
         <small>Pemasok Barang</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
         <li class="active">Suppliers</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="bot-title">Data Suppliers</h3>
             <div class="pull-right">
                 <a href="<?= base_url('supplier/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-plus"></i> Create
                 </a>
             </div>
         </div>

         <div class="box-body table-responsive">
             <table class="table table-bordered table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Name</th>
                         <th>Phone</th>
                         <th>Address</th>
                         <th>Description</th>
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
                         <td><?= $key->name ?></td>
                         <td><?= $key->phone ?></td>
                         <td><?= $key->address ?></td>
                         <td><?= $key->description ?></td>
                         <td class="text-center" width="200px">
                             <a href="<?= base_url('supplier/edit/' . $key->id) ?>" class="btn btn-success btn-md">
                                 <i class="fa fa-edit"></i> Edit
                             </a>
                             <a href="<?= base_url('supplier/delete/' . $key->id) ?>" onclick="return confirm('apus kaga nih?')" class="btn btn-danger btn-md">
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