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
                            <a href="<?= base_url('Download/add'); ?>" class="btn btn-primary">Tambah File</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered table-hover dataTable table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama File</th>
                                    <th>Tanggal Posting</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($download as $dw) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $dw['judul']; ?></td>
                                        <td><?= $dw['nama_file']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($dw['tgl_posting'])); ?></td>
                                        <td>
                                            <a href="<?= URL_API_DOWNLOAD . $dw['nama_file']; ?>" target="_blank" class="btn btn-xs btn-default"><i class="icon wb-download"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('Download/edit/') . $dw['id_download']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('Download/delete/') . $dw['id_download']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="icon wb-trash" aria-hidden="true"></i></a>
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