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
                        <input type="hidden" name="id_download" value="<?= $download['id_download'] ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= $download['judul'] ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Nama File</label>
                            <div class="col-md-9">
                                <input type="file" id="nama_file" name="nama_file" data-plugin="dropify" data-height="65px" />
                                <input type="hidden" id="file_lama" name="file_lama" value="<?= $download['nama_file']; ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_file'); ?></small>
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