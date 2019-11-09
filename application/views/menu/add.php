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
                    <div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Posisi Web</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_posisi">
                                        <option>Pilih Posisi Web</option>
                                        <?php foreach ($posisi as $ps) { ?>
                                        <option value="<?= $ps['id_posisi']; ?>"/option><?= $ps['nama_web']; ?> </option> <?php  } ?> </select> <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Parent Menu </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="id_parent" name="id_parent" value="<?= set_value('id_parent'); ?>">
                                        <option value="">Parent Menu</option>
                                        <?php foreach ($parent as $pm) { ?>
                                        <option value="<?= $pm['id_menu'] ?>"><?= $pm['nama_menu']; ?></option>
                                        <?php  } ?>
                                    </select>
                                    <small>Jika tidak ada kosongkan!</small>
                                    <small class="form-text text-danger"><?= form_error('id_parent'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Menu</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" value="<?= set_value('nama_menu'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('nama_menu'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Memiliki Sub Menu</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="punya_sub" name="punya_sub" value="<?= set_value('punya_sub'); ?>">
                                        <option value="">- Pilih -</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <small>Jika memiliki Parent Menu, pilih tidak!</small>
                                    <small class="form-text text-danger"><?= form_error('punya_sub'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="link" placeholder="Link" value="<?= set_value('link'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('link'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Aktif</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="status_aktif" name="status_aktif" value="<?= set_value('status_aktif'); ?>">
                                        <option value="">Status</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('status_aktif'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Urutan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="urutan" placeholder="Urutan" value="<?= set_value('urutan'); ?>" />
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