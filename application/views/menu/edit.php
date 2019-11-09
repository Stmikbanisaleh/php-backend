<!-- Page -->
<div class="page">

    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-heading">
                <h2 class="panel-title"><?= $title; ?></h2>
            </div>
            <div class="panel-body container-fluid">
                <form action="" method="post">
                    <div class="row row-lg">
                        <div class="ml-15 col-lg-6">
                            <input type="hidden" name="id_menu" value="<?= $menu['id_menu'] ?>">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Posisi Web</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_posisi">
                                        <option>Pilih Posisi Web</option>
                                        <?php foreach ($posisi as $ps) { ?>
                                            <?php if ($ps['id_posisi'] == $menu['id_posisi']) { ?>
                                                <option value="<?= $ps['id_posisi']; ?>" selected><?= $ps['nama_web']; ?> </option>
                                            <?php  } else { ?>
                                                <option value="<?= $ps['id_posisi']; ?>"><?= $ps['nama_web']; ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Menu</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_menu" value="<?= $menu['nama_menu'] ?>" />
                                    <small class="form-text text-danger"><?= form_error('nama_menu'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Memiliki Sub Menu</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="punya_sub" name="punya_sub">
                                        <?php foreach ($sub_menu as $sm) : ?>
                                            <?php if ($sm == $menu['punya_sub']) : ?>
                                                <option value="<?= $sm; ?>" selected><?= $sm; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sm; ?>"><?= $sm; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('punya_sub'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="link" value="<?= $menu['link'] ?>" />
                                    <small class="form-text text-danger"><?= form_error('link'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Aktif</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="status_aktif" name="status_aktif">
                                        <?php foreach ($status_aktif as $sa) : ?>
                                            <?php if ($sa == $menu['status_aktif']) : ?>
                                                <option value="<?= $sa; ?>" selected><?= $sa; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sa; ?>"><?= $sa; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('status_aktif'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Urutan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="urutan" value="<?= $menu['urutan'] ?>" />
                                    <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" style="cursor:pointer" class="btn btn-primary" id="validateButton1">Submit</button>
                            </div>

                        </div>

                    </div>
                </form>
                <!-- End Panel Basic -->
            </div>
        </div>
    </div>
</div>
<!-- End Panel Tabs -->

</div>
</div>
<!-- End Page -->