<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Blog</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Blog</li>
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
                           <i class="fa fa-plus"></i>&nbsp; Add blog
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
                     <table id="index1" class="table table-bordered table-striped table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Judul</th>
                              <th>Detail</th>
                              <th width="5%">Image</th>
                              <th width=" 9%"><i class="fas fa-cogs"></i></th>
                           </tr>
                        </thead>
                        <?php foreach ($blog as $h) {    ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle"><?= ucwords($h->judul) ?></td>
                              <td class="align-middle text-center"><?= ucfirst($h->detail) ?></td>
                              <td class="align-middle text-center"><img src="<?= base_url('assets/imgbeautyhampers/blog/' . $h->image) ?>" width="100%" class="img-responsive" /></td>
                              <td class="align-middle text-center">
                                 <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit<?= $h->id; ?>" title="Edit">
                                    <i class="fa fa-pencil-alt"></i></a>
                                 <a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $h->id; ?>" title="Delete">
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
            <h4 class="col-12 modal-title text-center">Add blog
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </h4>
         </div>
         <form method="post" onsubmit="addbtn.disabled = true; return true;" action="<?= base_url('dashboard/add_blog') ?>" enctype="multipart/form-data">
            <div class="card-body">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-tag"></i>&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <input type="text" name="judul" class="form-control" placeholder="Input judul .." required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">
                           <span><i class="fas fa-info-circle"></i>&nbsp;&nbsp;</span>
                        </div>
                     </div>
                     <textarea name="detail" class="form-control" rows="3" placeholder="Input detail.."></textarea>
                  </div>
               </div>
               <div class="form-group mb-0">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="product" name="image">
                     <label class="custom-file-label" for="product">Upload Image..</label>
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
<?php foreach ($blog as $u) : ?>
   <div class="modal fade" id="modal_edit<?= $u->id ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-light color-palette">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Edit blog
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form method="post" onsubmit="editbtn.disabled = true; return true;" action="<?= base_url('dashboard/edit_blog') ?>" enctype="multipart/form-data">
               <div class="card-body">
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-tag"></i>&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <input type="hidden" value="<?= $u->id ?>" name="id">
                        <input type="text" name="judul" class="form-control" value="<?= $u->judul ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <span><i class="fas fa-info-circle"></i>&nbsp;&nbsp;</span>
                           </div>
                        </div>
                        <textarea name="detail" class="form-control" rows="3"><?= $u->detail ?></textarea>
                     </div>
                  </div>
                  <div class="form-group mb-0">
                     <img src="<?= base_url('assets/imgbeautyhampers/products/' . $u->image) ?>" class="img-fluid mb-2 mt-1" onerror="this.style.display='none'" />
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product" name="image">
                        <label class="custom-file-label" for="product">Upload Image..</label>
                        <small>* kosongkan jika tidak ingin di rubah</small>
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
               <h4 class="col-12 modal-title text-center">Delete blog
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form onsubmit="delform.disabled = true; return true;" method="post" action="<?= base_url('dashboard/del_blog') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $u->id ?>">
                  <input type="hidden" name="nama" value="<?= $u->judul ?>">
                  <input type="hidden" name="image" value="<?= $u->image ?>">
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