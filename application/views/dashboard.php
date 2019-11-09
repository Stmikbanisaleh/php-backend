<div class="page">
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-body">
        <div class="row row-lg">
          <div class="col-lg">
            <h3><i class="icon wb-dashboard" aria-hidden="true"></i>Dashboard</h3>
            <div class="row mt-25">
              <div class="col-lg-4">
                <!-- Card -->
                <a href="<?= base_url('berita'); ?>">
                  <div class="card card-block p-10 bg-blue-600">
                    <div class="card-watermark darker font-size-70 m-15"><i class="icon wb-list" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                      <div class="counter-number-group">
                        <span class="counter-number"><?= $jumlahBerita; ?></span>
                      </div>
                      <h4 class="text-white">Berita</h4>
                    </div>
                  </div>
                </a>
                <!-- End Card -->
              </div>
              <div class="col-lg-4">
                <!-- Card -->
                <a href="<?= base_url('menu'); ?>">
                  <div class="card card-block p-10 bg-red-600">
                    <div class="card-watermark darker font-size-70 m-15"><i class="icon wb-menu" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                      <div class="counter-number-group">
                        <span class="counter-number"><?= $jumlahMenu; ?></span>
                      </div>
                      <h4 class="text-white">Menu</h4>
                    </div>
                  </div>
                </a>
                <!-- End Card -->
              </div>
              <div class="col-lg-4">
                <!-- Card -->
                <a href="<?= base_url('sop'); ?>">
                  <div class="card card-block p-10 bg-green-600">
                    <div class="card-watermark darker font-size-70 m-15"><i class="icon wb-file" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                      <div class="counter-number-group">
                        <span class="counter-number"><?= $jumlahSop; ?></span>
                      </div>
                      <h4 class="text-white">SOP</h4>
                    </div>
                  </div>
                </a>
                <!-- End Card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>