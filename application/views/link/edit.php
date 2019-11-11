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
                        <input type="hidden" name="id_link" value="<?= $link['id_link'] ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Kategori</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kategori" value="<?= $link['kategori'] ?>" />
                                <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_link" value="<?= $link['nama_link'] ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_link'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">URL Web</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url_web" value="<?= $link['url_web'] ?>" />
                                <small class="form-text text-danger"><?= form_error('url_web'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Logo</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src="<?= URL_API_DOWNLOAD . $link['logo']; ?>">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="logo" name="logo" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="logo_lama" name="logo_lama" value="<?= $link['logo']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('logo'); ?></small>
                                </div>
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