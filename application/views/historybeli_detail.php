<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"> <!-- Detail order barang -->
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
            <div class="col-md-6"> <!-- Chat, Nego Harga -->
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Status Order : 
                            <?php if ($trans['status'] == 0) echo 'Detail order disimpan';
                            else if ($trans['status'] == 1) echo 'Order ini sudah selesai';
                            else if ($trans['status'] == 20) echo 'Deal harga dengan admin';
                            else if ($trans['status'] == 21) echo 'Pengambilan barang'; ?>        
                        </h4>
                        <?php if ($trans['status'] == 21) { ?> 
                            <label class="small">Silakan mengambil barang anda</label>
                        <?php } ?>
                    </div>
                    <div class="content"></div>
                </div>
                <?php if ($trans['status'] == 20) { ?> <!-- Nego Harga, Ubah Harga (admin), Deal Harga (client) --> 
                    <div class="card"> <!-- History Message -->
                        <div class="header">
                            <h4 class="title">Chat dengan admin</h4>
                            <label class="small">Kirim pesan kepada admin; baik itu pertanyaan, nego harga, ataupun lainnya</label>
                        </div>
                        <div class="content">
                            <ul class="list-unstyled team-members">
                                <!-- Display all message -->
                                <?php if (!empty($pesan)) { foreach ($pesan as $key => $value) { ?>
                                    <div class="row">
                                        <div class="col-md-2" align="right">
                                            <label><strong>Pesan</strong></label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <strong><span class="text-success"><?= !empty($value['nama_user']) ? $value['nama_user'] : $value['username']; ?></strong>
                                                : </span><?= $value['pesan']; ?>
                                                <br/>
                                                <span class="text-muted"><small><?= $value['tanggal_dibuat']; ?></small></span>
                                                <small><a href="<?= site_url('order/deletePesan/'.$value['id_pesan'].'/'.$trans['id_trans']); ?>" class="text-danger">Delete Pesan</a></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </ul>
                            <ul>
                                <!-- Add new message section -->
                                <div class="row">
                                    <?= form_open('order/detail/'.$trans['id_trans']); ?>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-input" placeholder="tambah pesan baru"  id="newmessage" name="newmessage">
                                            <input type="hidden" id="id_trans" name="id_trans" value="<?= $trans['id_trans']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <button type="submit" class="btn btn-info btn-fill btn-xs" value="savenewmessage" id="button" name="button"><span class="ti-envelope" title="Tambah Pesan Baru"></span></button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </ul>
                        </div>
                    </div>  
                    <?php if ($_SESSION['printer']['user']['role'] == 1) { ?> <!-- Pegawai can Change Total Price -->
                        <div class="card content" style="padding: 3%;"> 
                            <?php echo form_open('order/detail/'.$trans['id_trans']);?>
                                <table>
                                    <tr>
                                        <td colspan="3"><strong>Ubah Total Harga Order</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Harga</strong></td>
                                        <td>
                                            <input type="number" class="form-control border-input" placeholder="total harga baru"  id="newprice" name="newprice" style="margin-left: 10%; margin-top: 5%; margin-bottom: 5%;">
                                            <input type="hidden" id="id_trans" name="id_trans" value="<?= $trans['id_trans']; ?>">
                                        </td>
                                        <td><button type="submit" class="btn btn-info btn-fill btn-xs" value="savenewprice" id="button" name="button" style="margin-left: 70%;">Simpan</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php } else if ($_SESSION['printer']['user']['role'] == 2) { ?> <!-- Customer can Accept Total Price and Pickup the order -->
                        <?php echo form_open('order/detail/'.$trans['id_trans']);?>
                            <div align="center">
                                <input type="hidden" id="id_trans" name="id_trans" value="<?= $trans['id_trans']; ?>">
                                <button type="submit" class="btn btn-success btn-fill" value="continuetopickup" id="button" name="button">Terima Total Harga <br/> Lanjut ke Pengambilan Barang</button>
                            </div>
                        </form>
                    <?php } ?>
                <?php } else if ($trans['status'] == 21) { ?> <!-- Order Sudah Diambil --> 
                    <div class="card"> <!-- History Message -->
                        <div class="header">
                            <h4 class="title">History Pesan</h4>
                        </div>
                        <div class="content">
                            <!-- Display all message -->
                            <?php if (!empty($pesan)) { foreach ($pesan as $key => $value) { ?>
                                <div class="row">
                                    <div class="col-md-2" align="right">
                                        <label><strong>Pesan</strong></label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <strong><span class="text-success"><?= !empty($value['nama_user']) ? $value['nama_user'] : $value['username']; ?></strong>
                                            : </span><?= $value['pesan']; ?>
                                            <br/>
                                            <span class="text-muted"><small><?= $value['tanggal_dibuat']; ?></small></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div> 
                    <?php if ($_SESSION['printer']['user']['role'] == 1) { ?>
                        <?php echo form_open('order/detail/'.$trans['id_trans']);?>
                            <div align="center">
                                <input type="hidden" id="id_trans" name="id_trans" value="<?= $trans['id_trans']; ?>">
                                <button type="submit" class="btn btn-success btn-fill" value="continuetodone" id="button" name="button">Tandai Selesai</button>
                            </div>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // $('#myTable').dataTable();
    });
</script>
