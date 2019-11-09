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
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Nama Link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_link" placeholder="Nama Link" value="<?= set_value('nama_link'); ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_link'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Url</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url" placeholder="Url Web" value="<?= set_value('url'); ?>" />
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

</div>
</div>
<!-- End Page -->