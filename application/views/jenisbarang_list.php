<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('jenisbarang/add'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Jenis Barang Baru</a>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th>ID Jenis Barang</th>
                                <th>Nama Jenis Barang</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['id_jenis_barang']; ?></td>
                                        <td><?= $value['nama_jenis_barang']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('jenisbarang/edit/'.$value['id_jenis_barang']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <!-- <span class="icon-name"> Edit</span> -->
                                            <a href="<?= site_url('jenisbarang/delete/'.$value['id_jenis_barang']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                            <!-- <span class="icon-name"> Delete</span> -->
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
