<?php
require_once 'dbkoneksi.php';
?>

<div class="content-wrapper">
  <div class="card">
    <form method="POST" action="pages/proses_produk.php" class="m-3">
      <div class="form-group row">
        <label for="kode" class="col-4 col-form-label">Kode</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-anchor"></i>
              </div>
            </div>
            <input id="kode" name="kode" type="text" class="form-control" value="" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama Produk</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-adjust"></i>
              </div>
            </div>
            <input id="nama" name="nama" type="text" class="form-control" value="" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="harga_beli" class="col-4 col-form-label">Harga Beli</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-arrow-circle-o-left"></i>
              </div>
            </div>
            <input id="harga_beli" name="harga_beli" value="" type="text" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="stok" class="col-4 col-form-label">Stok</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-arrow-circle-up"></i>
              </div>
            </div>
            <input id="stok" name="stok" value="" type="text" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="min_stok" class="col-4 col-form-label">Minimum Stok</label>
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
            <input id="min_stok" name="min_stok" value="" type="text" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="jenis" class="col-4 col-form-label">Jenis Produk</label>
        <div class="col-8">
          <?php
          $sqljenis = "SELECT * FROM jenis_produk";
          $rsjenis = $dbh->query($sqljenis);
          ?>
          <select id="jenis" name="jenis" class="custom-select" required>
            <?php
            foreach ($rsjenis as $rowjenis) {
            ?>
              <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-8">
        <a class="btn btn-danger" href="?page=pages/list_produk.php" role="button">Go Back</a>
          <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?php if (isset($_GET['idedit'])) {
                                                                                            echo 'Update';
                                                                                          } else {
                                                                                            echo 'Simpan';
                                                                                          } ?>" />
        </div>
      </div>
      <?php if (isset($_GET['idedit'])) { ?>
        <input type="hidden" name="idedit" value="<?php echo $_GET['idedit']; // send variable idedit
                                                  ?>">
      <?php } ?>
    </form>
  </div>
</div>