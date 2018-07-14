<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= site_url('barang/add/'); ?>" class="btn btn-info btn-fill btn-wd">Tambah Barang Baru</a>
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
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th width="10%">Aksi</th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['jumlah']; ?></td>
                                        <td><?= number_format($value['harga']); ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('barang/edit/'.$value['id']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <!-- <span class="icon-name"> Edit</span> -->
                                            <a href="<?= site_url('barang/delete/'.$value['id']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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

<script>
function goGen(){
    if(confirm('Generate akan menghapus semua data, apakah anda yakin?')){
        goSubmit('genPerencanaan');
    }
}
function goEdit(){
    $('#act').val('edit');
    return goSubmit();
}
</script>
