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
                            <a href="<?= base_url('Kategori/add'); ?>" class="btn btn-primary">Tambah Kategori</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered table-hover dataTable table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Username</th>
                                    <th>Kategori SEO</th>
                                    <th>Status Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kategori as $kat) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $kat['nama_kategori']; ?></td>
                                        <td><?= $kat['username']; ?></td>
                                        <td><?= $kat['kategori_seo']; ?></td>
                                        <td><?= $kat['aktif']; ?></td>
                                        <td>
                                            <a href="<?= base_url('kategori/edit/') . $kat['id_kategori']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('kategori/delete/') . $kat['id_kategori']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><i class="icon wb-trash" aria-hidden="true"></i></a>
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