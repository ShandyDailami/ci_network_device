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
<div class="position-fixed mt-2 me-2 top-0 end-0">
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success flash-message">
      <?= session()->getFlashdata('message') ?>
    </div>
  <?php elseif (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
      <div class="alert alert-danger flash-message">
        <?= esc($error) ?>
      </div>
    <?php endforeach ?>
  <?php endif ?>
</div>
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
              <button id="edit" data-id="<?= esc($device['id']) ?>" class="btn btn-outline-primary"><i
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
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="confirm">Yes</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content') ?>