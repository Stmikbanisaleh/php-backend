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
                <div class="row row-lg">
                    <div class="ml-15 col-lg-6">
                        <input type="hidden" name="id_akses" value="<?= $akses['id_akses'] ?>">

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_link" value="<?= $akses['nama_link'] ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_link'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">URL</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url" value="<?= $akses['url'] ?>" />
                                <small class="form-text text-danger"><?= form_error('url'); ?></small>
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
<!-- End Page -->