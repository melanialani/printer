<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('barang/lst_parent'); ?>" class="btn btn-info btn-fill btn-wd" >Lihat Kategori Barang</a>
                    <a href="<?= site_url('barang/add_child'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Barang Baru</a>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Ukuran</th>
                                <th>Deskripsi</th>
                                <th>Warning Stok</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['nama_parent']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['jumlah']; ?></td>
                                        <td><?= number_format($value['harga']); ?></td>
                                        <td><?= $value['ukuran']; ?></td>
                                        <td><?= $value['deskripsi']; ?></td>
                                        <td><?= $value['warning']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('barang/edit_child/'.$value['id']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <!-- <span class="icon-name"> Edit</span> -->
                                            <a href="<?= site_url('barang/delete_child/'.$value['id']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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
