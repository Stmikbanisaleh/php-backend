<!-- Page -->
<div class="page">

    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-heading">
                <h1 class="panel-title"><i class="site-menu-icon wb-<?= $icon; ?> mr-10"></i><?= $title; ?></h1>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="buttonAdd mb-15">
                            <a href="<?= base_url('agenda/add'); ?>" class="btn btn-primary">Tambah Agenda</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered table-hover dataTable table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Agenda</th>
                                    <th width="45%">Keterangan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($agenda as $ag) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ag['nama_agenda']; ?></td>
                                        <td><?= $ag['keterangan']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($ag['tanggal_awal'])); ?></td>
                                        <td><?= date('d-m-Y', strtotime($ag['tanggal_akhir'])); ?></td>
                                        <td><img src="<?= URL_API_DOWNLOAD . $ag['foto']; ?>" class="w-60 img-thumbnail" width="75px" height="75px"></td>
                                        <td>
                                            <a href="<?= base_url('agenda/edit/') . $ag['id_agenda']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('agenda/delete/') . $ag['id_agenda']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="icon wb-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Basic -->
            </div>
        </div>
    </div>
</div>
<!-- End Panel Tabs -->

</div>
</div>
<!-- End Page -->