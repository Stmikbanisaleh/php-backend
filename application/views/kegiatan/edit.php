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
                        <input type="hidden" name="id_kegiatan" value="<?= $kegiatan['id_kegiatan']; ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Posisi Web</label>
                            <div class="col-md-9">
                                <select class="form-control" name="id_posisi">
                                    <option>Pilih Posisi Web</option>
                                    <?php foreach ($posisi as $ps) { ?>
                                    <?php if ($ps['id_posisi'] == $kegiatan['id_posisi']) { ?>
                                    <option value="<?= $ps['id_posisi']; ?>" selected><?= $ps['nama_web']; ?> </option>
                                    <?php  } else { ?>
                                    <option value="<?= $ps['id_posisi']; ?>"><?= $ps['nama_web']; ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Kegiatan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?= $kegiatan['nama_kegiatan']; ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_kegiatan'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Tempat</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat" placeholder="Tempat" value="<?= $kegiatan['tempat']; ?>" />
                                <small class="form-text text-danger"><?= form_error('tempat'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Tanggal</label>
                            <div class="col-md-9">
                                <input type="text" class="datepicker form-control" class="form-control" name="tanggal" placeholder="Tanggal Kegiatan" value="<?= date('d-m-Y', strtotime($kegiatan['tanggal'])); ?>" />
                                <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Gambar</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src=" ../../../assets/img_kegiatan/<?= $kegiatan['gambar']; ?>" alt="<?= $kegiatan['gambar']; ?>">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="gambar" name="gambar" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $kegiatan['gambar']; ?>" />
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