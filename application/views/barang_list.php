<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('barang/add'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Varian Baru</a>
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
                                <th>Jenis Barang</th>
                                <th>Ukuran Kertas</th>
                                <th>Jenis Kertas</th>
                                <th>Nama Varian</th>
                                <th>Warna</th>
                                <th>Jumlah</th>
                                <th>Stock Awal</th>
                                <th>Stock</th>
                                <th>Warning Stock</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id_varian']; ?></td>
                                        <td><?= $value['nama_jenis_barang']; ?></td>
                                        <td><?= $value['nama_ukuran_kertas']; ?></td>
                                        <td><?= $value['namajenis_kertas']; ?></td>
                                        <td><?= $value['nama_varian']; ?></td>
                                        <td><?= $value['warna']; ?></td>
                                        <td><?= $value['jumlah']; ?></td>
                                        <td><?= number_format($value['harga_beli']); ?></td>
                                        <td><?= number_format($value['harga_jual']); ?></td>
                                        <td><?= $value['stock_awal']; ?></td>
                                        <td><?= $value['stock']; ?></td>
                                        <td><?= $value['warning']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('barang/edit/'.$value['id_varian']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <!-- <span class="icon-name"> Edit</span> -->
                                            <a href="<?= site_url('barang/delete/'.$value['id_varian']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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
