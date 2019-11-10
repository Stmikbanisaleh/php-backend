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

                    <div class="col-lg-8">
                        <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Posisi Web</label>
                            <div class="col-md-9">
                                <select class="form-control" id="id_posisi" name="id_posisi">
                                    <?php foreach ($posisi as $pos) : ?>
                                        <?php if ($pos['id_posisi'] == $berita['id_posisi']) : ?>
                                            <option value="<?= $pos['id_posisi']; ?>" selected><?= $pos['nama_web']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $pos['id_posisi']; ?>"><?= $pos['nama_web']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('id_posisi'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul Berita</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="<?= $berita['judul']; ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Sub Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="sub_judul" placeholder="Sub Judul" value="<?= $berita['sub_judul']; ?>" />
                                <small class="form-text text-danger"><?= form_error('sub_judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul SEO</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul_seo" placeholder="Judul SEO" value="<?= $berita['judul_seo']; ?>" />
                                <small class="form-text text-danger"><?= form_error('judul_seo'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Youtube</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="<?= $berita['youtube']; ?>" />
                                <small class="form-text text-danger"><?= form_error('youtube'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Isi Berita</label>
                            <div class="col-md-9">
                                <textarea input type="text" data-plugin="summernote" name="isi_berita" id="isi_berita" class="form-control"><?= $berita['isi_berita']; ?></textarea>
                                <small class="form-text text-danger"><?= form_error('isi_berita'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src="<?= URL_API_DOWNLOAD . $berita['gambar']; ?>" alt="<?= $berita['gambar']; ?>">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $berita['gambar']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Keterangan Gambar</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="keterangan_gambar" placeholder="Keterangan Gambar" value="<?= $berita['keterangan_gambar']; ?>" />
                                <small class="form-text text-danger"><?= form_error('keterangan_gambar'); ?></small>
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