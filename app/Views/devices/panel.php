<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">Network Device</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link active" href="/panel">Panel</a>
        <a class="nav-link" href="/create">Create</a>
      </div>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <h1>Dashboard</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Device Name</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longitude</th>
        <th scope="col">Location</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($devices)): ?>
        <?php foreach ($devices as $index => $device): ?>
          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?= esc($device['device_name']) ?></td>
            <td><?= esc($device['latitude']) ?></td>
            <td><?= esc($device['longitude']) ?></td>
            <td><?= esc($device['location']) ?></td>
            <td colspan="2">
              <button id="edit" data-id="<?= esc($device['id']) ?>" class="btn btn-primary"><i
                  class="bi bi-pencil-square"></i></button>
              <button type="button" data-bs-target="#delete" data-bs-toggle="modal" class="btn btn-outline-danger"
                data-id="<?= esc($device['id']) ?>">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        <?php endforeach ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center">Tidak ada item yang ditemukan</td>
        </tr>
      <?php endif ?>
    </tbody>
  </table>
</div>

<?= $this->endSection('content') ?>