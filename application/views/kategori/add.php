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
                                <label class="col-md-3 form-control-label">Nama Kategori</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?= set_value('nama_kategori'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('nama_kategori'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Username</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Kategori SEO</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="kategori_seo" placeholder="Kategori SEO" value="<?= set_value('kategori_seo'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('kategori_seo'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Aktif</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="aktif" name="aktif" value="<?= set_value('aktif'); ?>">
                                        <option value="">Status Aktif</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('aktif'); ?></small>
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