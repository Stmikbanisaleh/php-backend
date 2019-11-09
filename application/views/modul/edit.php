<!-- Page -->
<div class="page">

    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-heading">
                <h2 class="panel-title"><?= $title; ?></h2>
            </div>
            <div class="panel-body container-fluid">
                <?= form_open_multipart(); ?>
                <div>
                    <div class="col-lg-6">
                        <input type="hidden" name="id_modul" value=<?= $modul['id_modul']; ?> />
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Modul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_modul" placeholder="Nama Modul" value=<?= $modul['nama_modul']; ?> />
                                <small class="form-text text-danger"><?= form_error('nama_modul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="link" placeholder="Link" value=<?= $modul['link']; ?> />
                                <small class="form-text text-danger"><?= form_error('link'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail"" src=" ../../assets/img_modul/<?= $modul['gambar']; ?>" alt="Relevant textual alternative to the image">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $modul['gambar']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Publish</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="publish" placeholder="Publish" value=<?= $modul['publish']; ?> />
                                <small class="form-text text-danger"><?= form_error('publish'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Aktif</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="aktif" placeholder="Aktif" value=<?= $modul['aktif']; ?> />
                                <small class="form-text text-danger"><?= form_error('aktif'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Level</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="level" placeholder="Level" value=<?= $modul['level']; ?> />
                                <small class="form-text text-danger"><?= form_error('level'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Urutan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="urutan" placeholder="Urutan" value=<?= $modul['urutan']; ?> />
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