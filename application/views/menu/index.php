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
                            <a href="<?= base_url('Menu/add'); ?>" class="btn btn-primary">Tambah Menu</a>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered table-hover dataTable table-striped w-full" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Parent Menu</th>
                                    <th>Link</th>
                                    <th>Aktif</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($menu as $mn) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $mn['nama_web']; ?></td>
                                        <td><?= $mn['nama_menu']; ?></td>
                                        <?php if ($mn['id_parent'] != 0) { ?>
                                            <?php foreach ($parentname as $pnm) { ?>
                                                <?php if ($pnm['id_menu'] == $mn['id_parent']) { ?>
                                                    <td><?= $pnm['nama_menu']; ?></td>
                                            <?php }
                                                    } ?>
                                        <?php } else { ?>
                                            <td>-</td>
                                        <?php } ?>
                                        <td><?= $mn['link']; ?></td>
                                        <td><?= $mn['status_aktif']; ?></td>
                                        <td><?= $mn['urutan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('Menu/edit/') . $mn['id_menu']; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-edit" aria-hidden="true"></i></a>
                                            <a href="<?= base_url('Menu/delete/') . $mn['id_menu']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="icon wb-trash" aria-hidden="true"></i></a>
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