<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Users</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Users</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-info card-outline">
                  <div class="card-header">
                     <h4 class="card-title">
                        <a class="btn btn-success col-15 shadow-sm" data-toggle="modal" data-target="#modal_add">
                           <i class="fa fa-plus"></i>&nbsp; Add User
                        </a>
                     </h4>
                     <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="maximize">
                           <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-bordered table-hover table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>No Hp</th>
                              <th>Status</th>
                              <th width="9%">Chat User</th>
                              <th width="9%"><i class="fas fa-cogs"></i></th>
                           </tr>
                        </thead>
                        <?php foreach ($users as $u) {    ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle"><?= ucwords($u->nama) ?></td>
                              <td class="align-middle"><?= $u->email ?></td>
                              <td class="align-middle"><?= $u->no_hp ?></td>
                              <td class="align-middle text-center">
                                 <?php if ($u->level == 'penjual') : ?>
                                    <span class="badge badge-secondary">Penjual</span>
                                 <?php else : ?>
                                    <span class="badge badge-info">Pembeli</span>
                                 <?php endif ?>
                              </td>
                              <td class="align-middle text-center">
                                 <a class="btn-sm btn-info" href="https://wa.me/62<?= substr($u->no_hp, 1) ?>" title=" Chat User" target="_blank">
                                    <i class="fab fa-whatsapp"></i></a>
                              </td>
                              <td class="align-middle text-center">
                                 <a class="btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?= $u->id; ?>" title="Edit">
                                    <i class="fa fa-pencil-alt"></i></a>
                                 <a class="btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $u->id; ?>" title="Delete">
                                    <i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>


<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-light color-palette">
         <div class="modal-header">
            <h4 class="col-12 modal-title text-center">Add user
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </h4>
         </div>
         <form method="post" onsubmit="addbtn.disabled = true; return true;" action="<?= base_url('dashboard/add_user') ?>">
            <div class="card-body">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-user-tie"></i>&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <input type="text" name="nama" class="form-control" placeholder="Input name .." required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-envelope"></i>&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <input type="email" name="email" class="form-control" placeholder="Input email .." required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-mobile"></i>&nbsp;&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <input type="text" name="no_hp" class="form-control" placeholder="Input Hp .." required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span toggle="#password-field" class="fa fa-fw fa-lock field-icon toggle-password"></span>
                        </div>
                     </div>
                     <input id="password-field" type="password" class="form-control" name="password" placeholder="Input password .." required>
                  </div>
               </div>
               <div class="form-group mb-0">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-suitcase"></i>&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <select class="form-control" name="status" required>
                        <option value="">- Choose Status -</option>
                        <option value="penjual">Penjual</option>
                        <option value="pembeli">Pembeli</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-center">
               <button class="btn btn-info col-6" id="addbtn"><i class="fa fa-check"></i> Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--End Modals Add-->

<!-- Bootstrap modal edit & delete -->
<?php foreach ($users as $u) : ?>
   <div class="modal fade" id="modal_edit<?= $u->id ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-light color-palette">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Edit User
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form method="post" onsubmit="editbtn.disabled = true; return true;" action="<?= base_url('dashboard/edit_user') ?>">
               <div class="card-body">
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-user-tie"></i>&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $u->id ?>">
                        <input type="text" name="nama" class="form-control" value="<?= $u->nama ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-envelope"></i>&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <input type="email" name="email" class="form-control" value="<?= $u->email ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-mobile"></i>&nbsp;&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <input type="text" name="no_hp" class="form-control" value="<?= $u->no_hp ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span class="fa fa-lock field-icon">&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="change password ..">
                     </div>
                     <small>Kosongkan jika tidak ingin mengubah password</small>
                  </div>
                  <div class="form-group mb-0">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-suitcase"></i>&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <select class="form-control" name="status" required>
                           <option value="">- Pilih status -</option>
                           <option <?php if ($u->level == "penjual") {
                                       echo "selected='selected'";
                                    } ?> value="penjual">Penjual</option>
                           <option <?php if ($u->level == "pembeli") {
                                       echo "selected='selected'";
                                    } ?> value="pembeli">Pembeli</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-center">
                  <button class="btn btn-info col-6" id="editbtn"><i class="fa fa-check"></i> Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="modal fade" id="modal_hapus<?= $u->id; ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-danger">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Delete user
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form onsubmit="delform.disabled = true; return true;" method="post" action="<?= base_url('dashboard/del_user') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $u->id ?>">
                  <input type="hidden" name="nama" value="<?= $u->nama ?>">
                  <span>Are you sure delete <?= ucfirst($u->nama) ?> ?</span>
               </div>
               <div class="modal-footer justify-content-between">
                  <button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                  <button class="btn btn-outline-light" id="delform"><i class="fa fa-check"></i> Yes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php endforeach ?>
<!--End Modals Add-->