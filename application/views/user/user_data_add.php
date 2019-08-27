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
             <h3 class="bot-title">Add User</h3>
             <div class="pull-right">
                 <a href="<?= base_url('user') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i> Back
                 </a>
             </div>
         </div>

         <div class="box-body">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="" method="post">
                         <div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
                             <label>Name *</label>
                             <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control">
                             <?= form_error('name') ?>
                         </div>
                         <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                             <label>Username *</label>
                             <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                             <?= form_error('username') ?>
                         </div>
                         <div class="form-group <?= form_error('password1') ? 'has-error' : null ?>">
                             <label>Password *</label>
                             <input type="password" name="password1" value="<?= set_value('password1') ?>" class="form-control">
                             <?= form_error('password1') ?>
                         </div>
                         <div class="form-group <?= form_error('password2') ? 'has-error' : null ?>">
                             <label>Password Confirmation *</label>
                             <input type="password" name="password2" class="form-control">
                             <?= form_error('password2') ?>
                         </div>
                         <div class="form-group">
                             <label>Address</label>
                             <textarea name="address" class="form-control"><?= set_value('address') ?></textarea>
                         </div>
                         <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                             <label>Level *</label>
                             <select name="level" class="form-control">
                                 <option value="">- Pilih -</option>
                                 <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                 <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Kasir</option>
                             </select>
                             <?= form_error('level') ?>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-success btn-flat">
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