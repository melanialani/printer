<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= site_url('plate/add/'); ?>" class="btn btn-info btn-fill btn-wd">Tambah Ukuran Plate Baru</a>
                    <!-- <button class="btn btn-sm btn-success" style="margin-left: 2px;" onclick="goEdit()" style="margin-left: 3px;">Ubah Data</button> -->
                </div>
                <br/>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Panjang x Lebar</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id_master_plate']; ?></td>
                                        <td><?= $value['panjang_plate'].' x '.$value['lebar_plate']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('plate/edit/'.$value['id_master_plate']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <a href="<?= site_url('plate/delete/'.$value['id_master_plate']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
           $('#myTable').dataTable();
       });
</script>
