<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= site_url('jeniscetak/add/'); ?>" class="btn btn-info btn-fill btn-wd">Tambah Jenis Cetak Baru</a>
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
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id_jenis_cetakan']; ?></td>
                                        <td><?= $value['nama_jenis_cetakan']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('jeniscetak/edit/'.$value['id_jenis_cetakan']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <a href="<?= site_url('jeniscetak/delete/'.$value['id_jenis_cetakan']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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
