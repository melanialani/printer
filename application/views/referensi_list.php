<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
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
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><a href="<?= site_url('referensi/detail/'.$value['id']); ?>"><?= $value['nama']; ?></a></td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <?php if (!empty($detail)) { ?>
            <button type="submit" class="btn btn-info btn-fill btn-wd">Tambah Detail Referensi</button>
            <div class="col-md-9">
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
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row_detail as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['parent']; ?></td>
                                        <td><a href="<?= site_url('referensi/detail/'.$value['id']); ?>"><?= $value['nama']; ?></a></td>
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



