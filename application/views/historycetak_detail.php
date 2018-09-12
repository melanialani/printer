<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-13 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                    </div>
                    <div class="content">
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

                        <br/><hr><br/>
                        
                        <?php echo form_open_multipart('order/detailcetak/'.$proses['id_proses']);?>
                            <table>
                                <tr>
                                    <td><strong>Pilih file yang akan di-upload</strong></td>
                                    <td colspan="2"><input type="file" name="file_name" size="100" style="margin-left: 50px;" /></td>
                                </tr>
                                <tr>
                                    <td><strong>Comment file</strong></td>
                                    <td><input type="text" class="form-control border-input" placeholder="comment"  id="comment" name="comment" style="margin-left: 50px; margin-top: 10px; margin-bottom: 10px;" size="50%"></td>
                                    <td><input type="submit" value="upload" class="btn btn-info btn-fill" style="margin-left: 75px;" /></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><i style="color: red;">File yang bisa di-upload hanyalah file dengan ekstensi .png, .jpg, .jpeg, .psd, .cdr</i></td>
                                </tr>
                            </table>
                        </form>

                        <br/>

                        <div class="card">
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <?= !empty($data->nama_user) ? $data->nama_user : $data->username; ?>
                                                        <br/>
                                                        <span class="text-muted"><small><?= $data->tanggal_upload; ?></small></span>
                                                        <br/>
                                                        <span class="text-success"><small><?= $data->file_type; ?> - <?= $data->file_size; ?> Kb</small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <?= anchor('order/download_file/'.$data->file_name, 'Download'); ?>
                                                        <br/>
                                                        Message: <?= $data->comment ? $data->comment : '-'; ?>
                                                        <br/>
                                                        <a href="<?= site_url('order/deleteImage/'.$data->id_image); ?>" class="text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Display all comments -->
                                            <?php if (!empty($comment[$data->id_image])) { foreach ($comment[$data->id_image] as $key => $value) { ?>
                                                <div class="row">
                                                    <div class="col-md-6" align="right">
                                                        <label><strong>Comment</strong></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?= $value['comment']; ?>
                                                            <br/>
                                                            <span class="text-muted"><small><?= $value['tanggal_dibuat']; ?></small></span>
                                                            <br/>
                                                            <span class="text-success"><small><?= !empty($value['nama_user']) ? $value['nama_user'] : $value['username']; ?></small></span>
                                                            -
                                                            <a href="<?= site_url('order/deleteComment/'.$value['id_comment']); ?>" class="text-danger"><small>Delete Comment</small></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } } ?>
                                            
                                            <!-- Add new comment section -->
                                            <div class="row">
                                                <?= form_open('order/detailcetak/'.$proses['id_proses']); ?>
                                                <div class="col-md-6" align="right"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control border-input" placeholder="tambah comment"  id="newcomment" name="newcomment">
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

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>