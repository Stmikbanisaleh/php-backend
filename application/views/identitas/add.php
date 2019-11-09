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
                                <label class="col-md-3 form-control-label">Nama Website</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_website" placeholder="Nama Website" value="<?= set_value('nama_website'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('nama_website'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" placeholder="email" value="<?= set_value('email'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">URL</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="url" placeholder="url" value="<?= set_value('url'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('url'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Satuan Kerja</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="satker" placeholder="Satuan Kerja" value="<?= set_value('satker'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('satker'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">facebook</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="<?= set_value('facebook'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('facebook'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Google</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="google" placeholder="Google" value="<?= set_value('google'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('google'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Twitter</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="<?= set_value('twitter'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('twitter'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Rekening</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="rekening" placeholder="Rekening" value="<?= set_value('rekening'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('rekening'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">No Telp</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_telp" placeholder="No Telp" value="<?= set_value('no_telp'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Meta Deskripsi</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_deskripsi" placeholder="Meta Deskripsi" value="<?= set_value('meta_deskripsi'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('meta_deskripsi'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Meta Keyword</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword" value="<?= set_value('meta_keyword'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('meta_keyword'); ?></small>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-md-3 form-control-label">Favicon</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="favicon" placeholder="Favicon" value="<?= set_value('favicon'); ?>" />
                                    <small class="form-text text-danger"><?= form_error('favicon'); ?></small>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button style="cursor:pointer" type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
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