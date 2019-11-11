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
                        <input type="hidden" name="id_album" value="<?= $album['id_album'] ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul Album</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul_album" placeholder="Judul Album" value="<?= $album['judul_album'] ?>" />
                                <small class="form-text text-danger"><?= form_error('judul_album'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Album Seo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="album_seo" placeholder="Album Seo" value="<?= $album['album_seo'] ?>" />
                                <small class="form-text text-danger"><?= form_error('album_seo'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Keterangan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $album['keterangan'] ?>" />
                                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src="<?= URL_API_DOWNLOAD . $album['gambar']; ?>" alt="Relevant textual alternative to the image">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $album['gambar']; ?>" />
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

<!-- End Page -->