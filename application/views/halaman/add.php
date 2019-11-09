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

                    <div class="col-lg-10">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= set_value('judul'); ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul SEO</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul_seo" placeholder="Judul SEO" value="<?= set_value('judul_seo'); ?>" />
                                <small class="form-text text-danger"><?= form_error('judul_seo'); ?></small>
                                <small>Tidak boleh ada spasi</small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Isi Halaman</label>
                            <div class="col-md-9">
                                <div id="summernote">
                                    <textarea name="isi_halaman" data-plugin="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9">
                                <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="75px" />
                                <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
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