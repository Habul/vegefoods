<section id="page-header">
  <h2>#stayhome</h2>

  <p>Save more with coupons & up to 20% off!</p>
</section>


<section id="product1" class="section-p1">
  <?php if ($count_add <= 4) : ?>
    <div class="d-flex justify-content-between">
      <button class="btn btn-default" data-bs-toggle="modal" data-bs-target="#add"><i class="fas fa-plus-circle"></i> Address</button>
    </div>
  <?php endif ?>
  </div>
  <div class="card shadow-sm mt-2 mb-2">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Address</th>
            <th width="5%">Status</th>
            <th width="13%"><i class="fas fa-cogs"></i></th>
          </tr>
        </thead>
        <?php $no = 1;
        foreach ($address as $a) { ?>
          <tr class="align-middle">
            <td><?= $no++ ?></td>
            <td><?= ucfirst($a->alamat) ?></td>
            <td>
              <a class="badge text-bg-info" data-bs-toggle="modal" data-bs-target="#choose" title="Choose">
                <i class="fas fa-toggle-<?= $a->pilih == '1' ? 'on' : 'off' ?>"></i>
              </a>
            </td>
            <td>
              <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#edit<?= $a->id ?>" title="Edit"><i class="fas fa-edit"></i></a>
              <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#del<?= $a->id ?>" title="Delete"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</section>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Add Address</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open(base_url('welcome/add_address')); ?>
      <div class="modal-body">
        <div class="form-group mb-2">
          <textarea name="alamat" class="form-control" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button class="btn btn-success col-6"><i class="fa fa-check"></i> Save</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<?php foreach ($address as $a) : ?>
  <div class="modal fade" id="edit<?= $a->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Address</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(base_url('welcome/edit_address')); ?>
        <div class="modal-body">
          <div class="form-group mb-2">
            <input type="hidden" name="id" value="<?= $a->id ?>">
            <textarea name="alamat" class="form-control" rows="3"><?= $a->alamat ?></textarea>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-warning col-6"><i class="fa fa-check"></i> Update</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <div class="modal fade" id="del<?= $a->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Address</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(base_url('welcome/del_address')); ?>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $a->id ?>">
          Are you sure ?
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-danger col-6"><i class="fa fa-check"></i> Yes</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="choose<?= $a->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Choose Address</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(base_url('welcome/choose_address')); ?>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $a->id ?>">
          Are you sure ?
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-info col-6"><i class="fa fa-check"></i> Yes</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div> -->
<?php endforeach ?>