<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- <div align="right" style="margin-bottom: 10px;">
                    <a href="<?= site_url('ukurankertas/add'); ?>" class="btn btn-info btn-fill btn-wd" >Tambah Ukuran Kertas Baru</a>
                </div> -->
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="5">Nomor Nota: <?= $trans['id_trans']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Tanggal Transaksi: <?= $trans['tanggal_trans']; ?></td>
                                </tr>
                                <tr>
                                    <!-- <th align="center">Nomor Nota</th> -->
                                    <th align="center">Nama Barang</th>
                                    <th align="center">Harga</th>
                                    <th align="center">Jumlah</th>
                                    <th align="center">Subtotal Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <!-- <td><?= $value['id_trans']; ?></td> -->
                                        <td><?= $value['nama_varian']; ?></td>
                                        <td><?= number_format($value['harga_jual']); ?></td>
                                        <td><?= $value['qty_barang']; ?></td>
                                        <td><?= number_format($value['jumlah']); ?></td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" align="right">Total Pembelian: <?= number_format($trans['total_harga']); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // $('#myTable').dataTable();
    });
</script>
