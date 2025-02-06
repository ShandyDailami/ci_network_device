<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">Network Device</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/panel">Back</a>
      </div>
    </div>
  </div>
</nav>
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 90vh;">
  <div class="d-flex flex-column mt-2 me-2 top-0 end-0 position-fixed">
    <?php if (session()->getFlashdata('errors')): ?>
      <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <div class="alert alert-danger flash-message">
          <?= esc($error) ?>
        </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
  <div class="card col-md-4 mx-auto">
    <div class="card-body">
      <h5 class="card-title text-center">Input Device</h5>
      <form action="/edit/<?= esc($device['id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="device_name" class="form-label">Device Name</label>
          <input type="text" id="device_name" name="device_name" placeholder="Access Point" class="form-control"
            value="<?= esc($device['device_name']) ?>">
        </div>
        <div class="mb-3">
          <label for="latitude" class="form-label">Latitude</label>
          <input type="text" class="form-control" id="latitude" name="latitude" placeholder="11.000"
            value="<?= esc($device['latitude']) ?>">
        </div>
        <div class="mb-3">
          <label for="longitude" class="form-label">Longitude</label>
          <input type="text" class="form-control" id="longitude" name="longitude" placeholder="-11.000"
            value="<?= esc($device['longitude']) ?>">
        </div>
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" id="location" name="location" class="form-control" value="<?= esc($device['location']) ?>"
            placeholder="Prodi Sipil">
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">Update</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>