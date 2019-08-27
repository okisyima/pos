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
             <h3 class="bot-title"><?= ucfirst($page) ?> Suppliers</h3>
             <div class="pull-right">
                 <a href="<?= base_url('supplier') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i> Back
                 </a>
             </div>
         </div>

         <div class="box-body">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="<?= base_url('supplier/process') ?>" method="post">
                         <div class="form-group">
                             <label>Supplier Name *</label>
                             <input type="hidden" name="id" value="<?= $row->id ?>">
                             <input type="text" name="name" value="<?= $row->name ?>" class="form-control" required>
                         </div>
                         <div class="form-group">
                             <label>Phone *</label>
                             <input type="number" name="phone" value="<?= $row->phone ?>" class="form-control" required>
                         </div>
                         <div class="form-group">
                             <label>Address *</label>
                             <textarea name="address" class="form-control" required><?= $row->address ?></textarea>
                         </div>
                         <div class="form-group">
                             <label>Description</label>
                             <textarea name="description" class="form-control"><?= $row->description ?></textarea>
                         </div>

                         <div class="form-group">
                             <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                 <i class="fa fa-paper-plane"></i> Save
                             </button>
                             <button type="reset" class="btn btn-default btn-flat">
                                 <i class="fa fa-remove"></i> Reset
                             </button>
                             </>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 </section>
 <!-- /.content -->