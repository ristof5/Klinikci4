<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">4 Pola Hidup Sehat</h1>

  <!-- Card Section -->
  <div class="card-deck">
    <div class="card" style="width: 18rem;">
      <img src="/assets/img/ko3re.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Makan Sesuai Kebutuhan Kalori harian</p>
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img src="/assets/img/ko3re.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Olaharaga Cukup</p>
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img src="/assets/img/ko3re.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Istirahat Cukup</p>
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img src="/assets/img/ko3re.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Menjaga Kesehatan Mental</p>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ?>