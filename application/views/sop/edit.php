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
                        <input type="hidden" name="id_sop" value="<?= $sop['id_sop']; ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul SOP</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul SOP" value="<?= $sop['judul']; ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_judul" placeholder="Sub Judul" value="<?= $sop['nama_judul']; ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_judul'); ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">File</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <a href="<?= URL_API_DOWNLOAD . $sop['nama_file']; ?>" target="_blank">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            Lihat File
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="nama_file" name="nama_file" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="nama_file_lama" name="nama_file_lama" value="<?= $sop['nama_file']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('nama_file'); ?></small>
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

</div>
</div>
<!-- End Page -->