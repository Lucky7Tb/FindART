<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>

<div class="modal" id="stopArtModalConfirm" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Berhentikan ART ini?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="lead">Yakin ingin berhentikan art ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
        <button onclick="toArtRating()" class="btn btn-danger">Ya, berhentikan</button>
      </div>
    </div>
  </div>
</div>


<div class="container mb-5">
	<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3" id="art-container"></div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/art/art.js' ?>"></script>
<script>
	getMyART();
</script>
<?php require $app['template'] . 'admin/footer.php' ?>