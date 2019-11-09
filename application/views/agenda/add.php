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
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nama Agenda</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_agenda" placeholder="Nama Agenda" value="<?= set_value('nama_agenda'); ?>" />
                                <small class="form-text text-danger"><?= form_error('nama_agenda'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Keterangan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>" />
                                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Tanggal Mulai</label>
                            <div class="col-md-9">
                                <input type="text" class="datepicker form-control" name="tanggal_awal" placeholder="Tanggal Mulai" value="<?= set_value('tanggal_awal'); ?>" />
                                <small class="form-text text-danger"><?= form_error('tanggal_awal'); ?></small>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label class="col-md-3 form-control-label">Tanggal Berakhir</label>
                            <div class="col-md-9">
                                <input type="text" class="datepicker form-control" name="tanggal_akhir" placeholder="Tanggal Berakhir" value="<?= set_value('tanggal_akhir'); ?>" />
                                <small class="form-text text-danger"><?= form_error('tanggal_akhir'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Foto</label>
                            <div class="col-md-9">
                                <input type="file" id="foto" name="foto" data-plugin="dropify" data-height="75px" />
                                <small class="form-text text-danger"><?= form_error('foto'); ?></small>
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
<script src="<?= base_url('assets/') ?>global/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>