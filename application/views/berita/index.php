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
                            <a href="<?= base_url('Berita/add'); ?>" class="btn btn-primary">Tambah Berita</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table dataTable table-bordered table-hover  table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi Web</th>
                                    <th>Judul</th>
                                    <th>Sub Judul</th>
                                    <th>Judul SEO</th>
                                    <th>Youtube</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($berita as $brt) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $brt['nama_web']; ?></td>
                                        <td><?= $brt['judul']; ?></td>
                                        <td><?= $brt['sub_judul']; ?></td>
                                        <td><?= $brt['judul_seo']; ?></td>
                                        <td><?= $brt['youtube']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($brt['tanggal'])) ?></td>
                                        <td>
                                            <a href="<?= base_url('Berita/edit/') . $brt['id_berita']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('Berita/delete/') . $brt['id_berita']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="icon wb-trash" aria-hidden="true"></i></a>
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