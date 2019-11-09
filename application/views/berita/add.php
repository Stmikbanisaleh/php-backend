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
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Posisi</label>
                            <div class="col-md-9">
                                <select class="form-control" id="id_posisi" name="id_posisi">
                                    <option value="">Pilih Posisi Web</option>
                                    <?php foreach ($posisi as $pos) : ?>
                                        <option value="<?= $pos['id_posisi']; ?>"><?= $pos['nama_web']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('status_aktif'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Judul Berita</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="<?= set_value('judul'); ?>" />
                                <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Sub Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="sub_judul" placeholder="Sub Judul" value="<?= set_value('sub_judul'); ?>" />
                                <small class="form-text text-danger"><?= form_error('sub_judul'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Youtube</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="<?= set_value('youtube'); ?>" />
                                <small class="form-text text-danger"><?= form_error('youtube'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Isi Berita</label>
                            <div class="col-md-9">
                                <textarea input type="text" data-plugin="summernote" name="isi_berita" id="isi_berita" class="form-control" placeholder="Isi Berita"></textarea>
                                <small class="form-text text-danger"><?= form_error('isi_berita'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9">
                                <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="75px" />
                                <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Keterangan Gambar</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="keterangan_gambar" placeholder="Keterangan Gambar" value="<?= set_value('keterangan_gambar'); ?>" />
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