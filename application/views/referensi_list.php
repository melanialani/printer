<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('referensi/add_parent'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Jenis Referensi</a>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead><tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><a href="<?= site_url('referensi/detail/'.$value['id']); ?>"><?= $value['nama']; ?></a></td>
                                        <td align="center">
                                            <a href="<?= site_url('referensi/edit_parent/'.$value['id']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <a href="<?= site_url('referensi/delete_parent/'.$value['id']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <?php if (!empty($detail)) { ?>
            <div class="col-md-9">
                <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('referensi/add_child'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Detail Referensi</a>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title_detail; ?></h4>
                        <p class="category"><?= $page_note_detail; ?></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead><tr>
                                <th>ID</th>
                                <th>Parent</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row_detail as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['parent']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('referensi/edit_child/'.$value['id']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <a href="<?= site_url('referensi/delete_child/'.$value['id']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
