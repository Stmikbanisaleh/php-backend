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
                    <div class="col-lg-10">
                        <div class="buttonAdd mb-15">
                            <a href="<?= base_url('modul/add'); ?>" class="btn btn-primary">Tambah Modul</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered table-hover dataTable table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Modul</th>
                                    <th>Link</th>
                                    <th>Gambar</th>
                                    <th>Publish</th>
                                    <th>Aktif</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($modul as $mdl) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $mdl['nama_modul']; ?></td>
                                        <td><?= $mdl['link']; ?></td>
                                        <td><img src="<?= base_url('assets/img_modul/') . $mdl['gambar']; ?>" class="w-60 img-thumbnail" width="75px" height="75px"></td>
                                        <td><?= $mdl['publish']; ?></td>
                                        <td><?= $mdl['aktif']; ?></td>
                                        <td><?= $mdl['level']; ?></td>
                                        <td>
                                            <a href="<?= base_url('modul/edit/') . $mdl['id_modul']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('modul/delete/') . $mdl['id_modul']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="icon wb-trash" aria-hidden="true"></i></a>
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