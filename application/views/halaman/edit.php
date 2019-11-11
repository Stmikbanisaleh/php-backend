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
                        <input type="hidden" name="id_halaman" value="<?= $halaman['id_halaman']; ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= $halaman['judul']; ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul SEO</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul_seo" placeholder="Judul SEO" value="<?= $halaman['judul_seo']; ?>" />
                                <small class="form-text text-danger"><?= form_error('judul_seo'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Isi Halaman</label>
                            <div class="col-md-9">
                                <textarea input type="text" name="isi_halaman" data-plugin="summernote" id="isi_halaman" class="form-control"> <?= $halaman['isi_halaman']; ?></textarea>
                                <small class="form-text text-danger"><?= form_error('isi_halaman'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src=" <?= URL_API_DOWNLOAD . $halaman['gambar']; ?>"> </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $halaman['gambar']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
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