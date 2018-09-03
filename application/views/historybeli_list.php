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
                                <th align="center">Nomor Nota</th>
                                <th align="center">Tanggal Transaksi</th>
                                <th align="center">Total Pembelian</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['id_trans']; ?></td>
                                        <td><?= $value['tanggal_trans']; ?></td>
                                        <td><?= $value['total_harga']; ?></td>
                                        <td align="center">
                                            <a href="<?= site_url('order/detail/'.$value['id_trans']); ?>" class="btn btn-info btn-xs"><span class="ti-eye" title="Detail"></span></a>
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
