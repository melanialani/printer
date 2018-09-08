<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= site_url('plong/add/'); ?>" class="btn btn-info btn-fill btn-wd">Tambah Pisau Plong Baru</a>
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
                                <th>Harga</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id_plong']; ?></td>
                                        <td><?= $value['nama_plong']; ?></td>
                                        <td><?= $value['panjang_plong'].' x '.$value['lebar_plong']; ?></td>
                                        <td><?= $value['harga_plong']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('plong/edit/'.$value['id_plong']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <a href="<?= site_url('plong/delete/'.$value['id_plong']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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
