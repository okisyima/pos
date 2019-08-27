 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Items
         <small>Data Barang</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
         <li class="active">Items</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <?php $this->view('message'); ?>

     <div class="box">
         <div class="box-header">
             <h3 class="bot-title"><?= ucfirst($page) ?> Items</h3>
             <div class="pull-right">
                 <a href="<?= base_url('item') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i> Back
                 </a>
             </div>
         </div>

         <div class="box-body">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">

                     <?= form_open_multipart('item/process') ?>

                     <div class="form-group">
                         <label>Barcode *</label>
                         <input type="hidden" name="id_item" value="<?= $row->id_item ?>">
                         <input type="text" name="barcode" value="<?= $row->barcode ?>" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <label for="name">Product Name *</label>
                         <input type="text" name="name" id="name" value="<?= $row->name ?>" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <label>Category *</label>
                         <select name="category_id" class="form-control" required>
                             <option value="">- Pilih -</option>
                             <?php foreach ($category->result() as $key) { ?>
                             <option value="<?= $key->id ?>" <?= $key->id == $row->category_id ? "selected" : null ?>><?= $key->name ?></option>
                             <?php } ?>
                         </select>
                     </div>

                     <div class="form-group">
                         <label>Unit *</label>
                         <?= form_dropdown(
                                'unit',
                                $unit,
                                $selectedunit,
                                ['class' => 'form-control', 'required' => 'required']
                            ) ?>
                     </div>

                     <div class="form-group">
                         <label>Price *</label>
                         <input type="number" name="price" value="<?= $row->price ?>" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <label>Image</label>
                         <?php if ($page == 'edit') { ?>
                         <?php if ($row->image != null) { ?>
                         <div style="margin-bottom:5px">
                             <img src="<?= base_url('uploads/products/items/') . $row->image ?>" style="width:25%">
                         </div>
                         <?php } ?>
                         <?php } ?>
                         <input type="file" name="image" class="form-control">
                         <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                     </div>

                     <div class="form-group">
                         <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                             <i class="fa fa-paper-plane"></i> Save
                         </button>
                         <button type="reset" class="btn btn-default btn-flat">
                             <i class="fa fa-remove"></i> Reset
                         </button>
                     </div>

                     <?= form_close() ?>

                 </div>
             </div>
         </div>
     </div>

 </section>
 <!-- /.content -->