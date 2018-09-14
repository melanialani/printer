<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-13 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <!-- Detail Order Cetak -->
                            <div class="col-md-6">
                                <!-- Jenis Cetakan -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jenis Cetakan</label>
                                            <select name="jenis_cetak" id="jenis_cetak" class="form-control border-input" disabled>
                                            <?php foreach ($jenis_cetak as $value) {
                                                if ($value['id_jenis_cetakan'] == $proses['id_jenis_cetakan'])
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "' selected>" . $value['nama_jenis_cetakan'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "'>" . $value['nama_jenis_cetakan'] . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- UKURAN KERTAS -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Panjang Kertas (cm)</label>
                                            <input type="number" class="form-control border-input" placeholder="12 cm"  id="panjang" name="panjang" disabled value="<?= $proses['panjang_cetak']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lebar Kertas (cm)</label>
                                            <input type="number" class="form-control border-input" placeholder="2 cm"  id="lebar" name="lebar" disabled value="<?= $proses['lebar_cetak']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tinggi Kertas (cm)</label>
                                            <input type="number" class="form-control border-input" placeholder="0 cm"  id="tinggi" name="tinggi" disabled value="<?= $proses['tinggi_cetak']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- Jenis Kertas -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jenis Kertas</label>
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input" disabled>
                                            <?php foreach ($jenis_kertas as $value) {
                                                if ($value['id_jenis_kertas'] == $proses['id_jenis_kertas'])
                                                    echo "<option value='". $value['id_jenis_kertas'] . "' selected>" . $value['namajenis_kertas'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Varian -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Bahan</label>
                                            <select name="varian" id="varian" class="form-control border-input" disabled>
                                            <?php foreach ($varian as $value) {
                                                if ($value['id_varian'] == $proses['id_varian'])
                                                    echo "<option value='". $value['id_varian'] . "' selected>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_varian'] . "'>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Laminasi -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Laminasi</label>
                                            <select name="laminasi" id="laminasi" class="form-control border-input" disabled>
                                            <?php foreach ($laminasi as $value) {
                                                if ($value['id_laminasi'] == $proses['laminasi'])
                                                    echo "<option value='". $value['id_laminasi'] . "' selected>" . $value['nama_laminasi'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_laminasi'] . "'>" . $value['nama_laminasi'] . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- QTY & TOTAL -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cetak sebanyak</label>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" disabled value="<?= $proses['qty']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Total Harga</label>
                                        <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" disabled value="<?= $proses['total_harga']; ?>">
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Estimasi Harga</label>
                                            <?php if (!$edited) { ?>
                                                <input type="number" class="form-control border-input" placeholder="150000"  id="total" name="total" required disabled value="100000">
                                            <?php } else { ?>
                                                <input type="number" class="form-control border-input" placeholder="150000"  id="total" name="total" required disabled value="<?= $total; ?>">
                                            <?php } ?>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- CHECKBOXES -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>Cetak sebanyak</label><br/> -->
                                            <?php if ($proses['plong']) { ?>
                                                <input type="checkbox" name="porforasi" value="porforasi" checked disabled> <label>Porforasi</label></input><br/>
                                            <?php } else { ?>
                                                <input type="checkbox" name="porforasi" value="porforasi" disabled> <label>Porforasi</label></input><br/>
                                            <?php } ?>
                                            
                                            <?php if ($proses['numerator']) { ?>
                                                <input type="checkbox" name="numerator" value="numerator" checked disabled> <label>Numerator</label></input><br/>
                                            <?php } else { ?>
                                                <input type="checkbox" name="numerator" value="numerator" disabled> <label>Numerator</label></input><br/>
                                            <?php } ?>

                                            <?php if ($proses['uv']) { ?>
                                               <input type="checkbox" name="uv" value="uv" checked disabled> <label>UV</label></input>
                                            <?php } else { ?>
                                                <input type="checkbox" name="uv" value="uv" disabled> <label>UV</label></input>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <label>Barang dapat diambil pada tanggal : <?= !empty($proses['tanggal_jadi']) ? date('d M Y', strtotime($proses['tanggal_jadi'])) : '-'; ?></label>
                                </div>
                            </div>
                            <!-- Upload File & Comment Image -->
                            <div class="col-md-6">
                                <div class="card"> <!-- Upload New Image -->
                                    <div class="header">
                                        <h4 class="title">
                                            Status Order : 
                                            <?php if ($proses['status'] == 1) echo '1 - Masukan data order cetakan';
                                            else if ($proses['status'] == 2) echo '2 - Konfirmasi order dengan admin';
                                            else if ($proses['status'] == 3) echo '3 - Mulai proses desain cetakan';
                                            else if ($proses['status'] == 4) echo '4 - Konfirmasi pembayaran oleh admin'; 
                                            else if ($proses['status'] == 5) echo '5 - Order sedang dicetak';
                                            else if ($proses['status'] == 6) echo '6 - Order telah selesai dicetak'; 
                                            else if ($proses['status'] == 7) echo '7 - Order ini sudah selesai'; ?>        
                                        </h4>
                                        <?php if ($proses['status'] == 4) { ?> 
                                            <label class="small">Silakan melakukan pembayaran dan mengirimkan konfirmasi bukti pembayaran ke dalam grup WhatsApp</label>
                                        <?php } else if ($proses['status'] == 5) { ?> 
                                            <label class="small">Order anda sedang dalam proses dicetak</label>
                                        <?php } else if ($proses['status'] == 6) { ?> 
                                            <label class="small">Order anda telah selesai dicetak, silakan mengambil order anda</label>
                                        <?php } ?>
                                    </div>
                                    <div class="content"></div>
                                </div>
                                <!-- Alir Program Step by Step -->
                                <?php if ($proses['status'] == 2) { ?> <!-- Chat with Admin; Nego Harga -->
                                    <div class="card"> <!-- History Image and Image Comment -->
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
                                                                <small><a href="<?= site_url('order/deletePesan/'.$value['id_pesan'].'/'.$proses['id_proses']); ?>" class="text-danger">Delete Pesan</a></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } } ?>
                                            </ul>
                                            <ul>
                                                <!-- Add new message section -->
                                                <div class="row">
                                                    <?= form_open('order/detailcetak/'.$proses['id_proses']); ?>
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control border-input" placeholder="tambah pesan baru"  id="newmessage" name="newmessage">
                                                            <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
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
                                        <div class="card content"> 
                                            <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                                <table>
                                                    <tr>
                                                        <td colspan="3"><strong>Ubah Total Harga Order</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Harga</strong></td>
                                                        <td>
                                                            <input type="number" class="form-control border-input" placeholder="total harga baru"  id="newprice" name="newprice" style="margin-left: 10%; margin-top: 5%; margin-bottom: 5%;">
                                                            <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                        </td>
                                                        <td><button type="submit" class="btn btn-info btn-fill btn-xs" value="savenewprice" id="button" name="button" style="margin-left: 70%;">Simpan</button></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    <?php } else if ($_SESSION['printer']['user']['role'] == 2) { ?> <!-- Customer can Accept Total Price and Continue to Stage Design Upload -->
                                        <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                            <div align="center">
                                                <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                <button type="submit" class="btn btn-success btn-fill" value="continuetodesign" id="button" name="button">Terima Total Harga <br/> Lanjut ke Proses Upload Desain Cetakan</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } else if ($proses['status'] == 3) { ?> <!-- Mulai Proses Upload Desain Cetak -->
                                    <div class="card content"> <!-- Upload New Image -->
                                        <?php echo form_open_multipart('order/detailcetak/'.$proses['id_proses']);?>
                                            <table>
                                                <tr>
                                                    <td><strong>Pilih file yang akan di-upload</strong></td>
                                                    <td colspan="2"><input type="file" name="file_name" size="100" style="margin-left: 50px;" /></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Keterangan file</strong></td>
                                                    <td><input type="text" class="form-control border-input" placeholder="keterangan"  id="comment" name="comment" style="margin-left: 50px; margin-top: 10px; margin-bottom: 10px;" size="50%"></td>
                                                    <td><input type="submit" value="upload" class="btn btn-info btn-fill" style="margin-left: 75px;" /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><small><i style="color: red;">File yang bisa di-upload hanyalah file dengan ekstensi .png, .jpg, .jpeg, .psd, .cdr</i></small></td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="card"> <!-- History Image and Image Comment -->
                                        <div class="header">
                                            <h4 class="title">File Upload History</h4>
                                        </div>
                                        <div class="content">
                                            <ul class="list-unstyled team-members">
                                                <?php if (!empty($row)) { foreach ($row as $data) { ?>

                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group" align="center">
                                                                    <?= img(array('src' => 'upload/'.$data->file_name, 'width' => '80', 'height' => '50', 'title' => $data->file_name)); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    Uploader: <strong><?= !empty($data->nama_user) ? $data->nama_user : $data->username; ?></strong>
                                                                    <br/>
                                                                    <span class="text-muted"><small><?= $data->tanggal_upload; ?></small></span>
                                                                    <br/>
                                                                    <span class="text-muted"><small><?= $data->file_type; ?> - <?= $data->file_size; ?> Kb</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <strong><?= anchor('order/download_file/'.$data->file_name, 'Download Gambar'); ?></strong>
                                                                    <br/>
                                                                    <strong>Keterangan:</strong> <?= $data->comment ? $data->comment : '-'; ?>
                                                                    <br/>
                                                                    <small><a href="<?= site_url('order/deleteImage/'.$data->id_image.'/'.$proses['id_proses']); ?>" class="text-danger">Delete Gambar</a></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Display all comments -->
                                                        <?php if (!empty($comment[$data->id_image])) { foreach ($comment[$data->id_image] as $key => $value) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2" align="right">
                                                                    <label><strong>Comment</strong></label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <strong><span class="text-success"><?= !empty($value['nama_user']) ? $value['nama_user'] : $value['username']; ?></strong>
                                                                        : </span><?= $value['comment']; ?>
                                                                        <br/>
                                                                        <span class="text-muted"><small><?= $value['tanggal_dibuat']; ?></small></span>
                                                                        <small><a href="<?= site_url('order/deleteComment/'.$value['id_comment'].'/'.$proses['id_proses']); ?>" class="text-danger">Delete Comment</a></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } } ?>
                                                        
                                                        <!-- Add new comment section -->
                                                        <div class="row">
                                                            <?= form_open('order/detailcetak/'.$proses['id_proses']); ?>
                                                            <div class="col-md-2" align="right"></div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control border-input" placeholder="tambah comment baru"  id="newcomment" name="newcomment">
                                                                    <input type="hidden" id="id_image" name="id_image" value="<?= $data->id_image; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group" style="margin-top: 5px;">
                                                                    <button type="submit" class="btn btn-info btn-fill btn-xs" value="savenewcomment" id="button" name="button"><span class="ti-check" title="Simpan"></span></button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </li>

                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>    
                                    <?php if ($_SESSION['printer']['user']['role'] == 2) { ?> <!-- Customer can Accept the Last File Uploaded and Continue to Stage Print -->
                                        <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                            <div align="center">
                                                <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                <button type="submit" class="btn btn-success btn-fill" value="continuetoprint" id="button" name="button">Tandai File Terakhir sebagai yang paling benar <br/>Lanjut ke Proses Cetak</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } else if ($proses['status'] == 4) { ?> <!-- Order Sedang Dicetak -->
                                    <?php if ($_SESSION['printer']['user']['role'] == 1) { ?> <!-- Customer can Accept the Last File Uploaded and Continue to Stage Print -->
                                        <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                            <div align="center">
                                                <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                <button type="submit" class="btn btn-success btn-fill" value="continuetoprint2" id="button" name="button">Konfirmasi Pembayaran Customer <br/> Mulai Cetak Order</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } else if ($proses['status'] == 5) { ?> <!-- Order Sedang Dicetak -->
                                    <div class="card"> <!-- History Image and Image Comment -->
                                        <div class="header">
                                            <h4 class="title">File Upload History</h4>
                                        </div>
                                        <div class="content">
                                            <ul class="list-unstyled team-members">
                                                <?php if (!empty($row)) { foreach ($row as $data) { ?>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group" align="center">
                                                                    <?= img(array('src' => 'upload/'.$data->file_name, 'width' => '80', 'height' => '50', 'title' => $data->file_name)); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    Uploader: <strong><?= !empty($data->nama_user) ? $data->nama_user : $data->username; ?></strong>
                                                                    <br/>
                                                                    <span class="text-muted"><small><?= $data->tanggal_upload; ?></small></span>
                                                                    <br/>
                                                                    <span class="text-muted"><small><?= $data->file_type; ?> - <?= $data->file_size; ?> Kb</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <strong><?= anchor('order/download_file/'.$data->file_name, 'Download Gambar'); ?></strong>
                                                                    <br/>
                                                                    <strong>Keterangan:</strong> <?= $data->comment ? $data->comment : '-'; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Display all comments -->
                                                        <?php if (!empty($comment[$data->id_image])) { foreach ($comment[$data->id_image] as $key => $value) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2" align="right">
                                                                    <label><strong>Comment</strong></label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <strong><span class="text-success"><?= !empty($value['nama_user']) ? $value['nama_user'] : $value['username']; ?></strong>
                                                                        : </span><?= $value['comment']; ?>
                                                                        <br/>
                                                                        <span class="text-muted"><small><?= $value['tanggal_dibuat']; ?></small></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } } ?>
                                                    </li>
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>    
                                    <?php if ($_SESSION['printer']['user']['role'] == 1) { ?> <!-- Customer can Accept the Last File Uploaded and Continue to Stage Print -->
                                        <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                            <div align="center">
                                                <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                <button type="submit" class="btn btn-success btn-fill" value="continuetodone" id="button" name="button">Order Selesai Dicetak</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } else if ($proses['status'] == 6) { ?> <!-- Order Sudah Dicetak, Customer Ambil Barang --> 
                                    <?php if ($_SESSION['printer']['user']['role'] == 1) { ?> <!-- Customer can Accept the Last File Uploaded and Continue to Stage Print -->
                                        <?php echo form_open('order/detailcetak/'.$proses['id_proses']);?>
                                            <div align="center">
                                                <input type="hidden" id="id_proses" name="id_proses" value="<?= $proses['id_proses']; ?>">
                                                <button type="submit" class="btn btn-success btn-fill" value="continuetodone2" id="button" name="button">Tandai Proses Selesai</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>