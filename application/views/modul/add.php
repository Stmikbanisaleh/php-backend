<!-- Page -->
<div class="page">

    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-heading">
                <h2 class="panel-title"><?= $title; ?></h2>
            </div>
            <div class="panel-body container-fluid">
                <?= form_open_multipart(''); ?>
                <div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Modul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_modul" placeholder="Nama Modul" value="<?= set_value('nama_modul'); ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_modul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="link" placeholder="Link" value="<?= set_value('link'); ?>" />
                                <small class="form-text text-danger"><?= form_error('link'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9">
                                <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="75px" />
                                <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Publish</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="publish" placeholder="Publish" value="<?= set_value('publish'); ?>" />
                                <small class="form-text text-danger"><?= form_error('publish'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Aktif</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="aktif" placeholder="Aktif" value="<?= set_value('aktif'); ?>" />
                                <small class="form-text text-danger"><?= form_error('aktif'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Level</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="level" placeholder="Level" value="<?= set_value('level'); ?>" />
                                <small class="form-text text-danger"><?= form_error('level'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
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