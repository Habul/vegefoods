<section id="page-header">
  <h2>#stayhome</h2>

  <p>Save more with coupons & up to 20% off!</p>
</section>


<section id="product1" class="section-p1">
  <div class="d-flex justify-content-between">
    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Address</button>
  </div>

  </div>
  <div class="card shadow-sm mt-2 mb-2">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Address</th>
            <th width="5%"><i class="fas fa-cogs"></i></th>
          </tr>
        </thead>
        <?php $no = 1;
        foreach ($address as $a) { ?>
          <tr class="align-middle">
            <td><?= $no++ ?></td>
            <td><?= ucfirst($a->address) ?></td>
            <td></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</section>