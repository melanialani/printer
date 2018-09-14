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
                            <thead><tr>
                                <th align="center">ID Order Cetak</th>
                                <th align="center">Tanggal Transaksi</th>
                                <th align="center">Jenis Cetakan</th>
                                <th align="center">Jenis Kertas</th>
                                <th align="center">Ukuran Kertas</th>
                                <th align="center">Jumlah</th>
                                <th align="center">Total Harga</th>
                                <th align="center">Tanggal Jadi</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['id_proses']; ?></td>
                                        <td><?= date('d M Y H:i', strtotime($value['tanggal_dibuat'])); ?></td>
                                        <td><?= $value['nama_jenis_cetakan']; ?></td>
                                        <td><?= $value['namajenis_kertas']; ?></td>
                                        <td><?= $value['panjang_cetak'].' x '.$value['lebar_cetak']; ?></td>
                                        <td><?= $value['qty']; ?></td>
                                        <td><?= number_format($value['total_harga']); ?></td>
                                        <td><?= date('d M Y', strtotime($value['tanggal_jadi'])); ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('order/detailcetak/'.$value['id_proses']); ?>" class="btn btn-info btn-xs"><span class="ti-eye" title="Detail"></span></a>
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
