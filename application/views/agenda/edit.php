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
                        <input type="hidden" name="id_agenda" value="<?= $agenda['id_agenda'] ?>">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Agenda</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_agenda" placeholder="Nama Agenda" value="<?= $agenda['nama_agenda']; ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_agenda'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Keterangan</label>
                            <div class="col-md-9">
                                <!-- <textarea   input type="text"  class="form-control" data-plugin="summernote" name="keterangan" placeholder="Keterangan" value="<?php echo $agenda['nama_agenda']; ?>" ></textarea>
                                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small> -->
                                <textarea input type="text" data-plugin="summernote"  name="keterangan" id="keterangan" class="form-control"><?= $agenda['keterangan']; ?></textarea>
                                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Tanggal Mulai</label>
                            <div class="col-md-9">
                                <input type="text" class="datepicker form-control" name="tanggal_awal" placeholder="Tanggal Mulai" value="<?= date('d-m-Y', strtotime($agenda['tanggal_awal'])); ?>" />
                                <small class="form-text text-danger"><?= form_error('tanggal_awal'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Tanggal Berakhir</label>
                            <div class="col-md-9">
                                <input type="text" class="datepicker form-control" name="tanggal_akhir" placeholder="Tanggal Berakhir" value="<?= date('d-m-Y', strtotime($agenda['tanggal_akhir'])); ?>" />
                                <small class="form-text text-danger"><?= form_error('tanggal_akhir'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Foto</label>
                            <div class="col-md-9 row">
                                <div class="col-md-4 mt-5">
                                    <img class="w-120 img-thumbnail" src="<?= URL_API_DOWNLOAD . $agenda['foto']; ?>" alt="Relevant textual alternative to the image">
                                </div>
                                <div class="col-md-8 mt-5">
                                    <input type="file" id="foto" name="foto" data-plugin="dropify" data-height="65px" />
                                    <input type="hidden" id="foto_lama" name="foto_lama" value="<?= $agenda['foto']; ?>" />
                                    <small class="form-text text-danger"><?= form_error('foto'); ?></small>
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
<script src="<?= base_url('assets/') ?>global/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>