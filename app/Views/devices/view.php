<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">Network Device</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="/">Home</a>
        <a class="nav-link" href="/panel">Panel</a>
        <a class="nav-link" href="/create">Create</a>
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <?php foreach ($devices as $device): ?>
    <div class="card" style="width: 18rem;">
      <div id="map"></div>
      <div class="card-body">
        <p class="card-text">Device Name: <?= esc($device['device_name']) ?></p>
        <p class="card-text">Latitude: <?= esc($device['latitude']) ?></p>
        <p class="card-text">Longitude:<?= esc($device['longitude']) ?></p>
        <p class="card-text">Location: <?= esc($device['location']) ?></p>
      </div>
    </div>
  <?php endforeach ?>
</div>

<?= $this->endSection('content') ?>