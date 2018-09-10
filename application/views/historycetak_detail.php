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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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

                        <!-- Jenis Kertas & Varian -->
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Bahan</label>
                                    <select name="varian" id="varian" class="form-control border-input" disabled>
                                    <?php foreach ($varian as $proses['id_varian']) {
                                        if ($value['id_varian'] == $id_varian)
                                            echo "<option value='". $value['id_varian'] . "' selected>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                        else 
                                            echo "<option value='". $value['id_varian'] . "'>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
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

                        <br/><br/>

                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th></th>
                                <th align="center">Tanggal Upload</th>
                                <!-- <th align="center" width="5%">File Name</th> -->
                                <th align="center">File Type</th>
                                <!-- <th align="center">Full Path</th> -->
                                <th align="center">File Size</th>
                                <th align="center">Diupload oleh</th>
                                <th align="center" width="20%">Comment</th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php if (!empty($row)) {
                                foreach ($row as $data) {
                                    ?>
                                    <tr>
                                        <td align="center"><?= img(array('src' => 'upload/'.$data->file_name, 'width' => '80', 'height' => '50', 'title' => $data->file_name)); ?></td>
                                        <td><?= $data->tanggal_upload; ?></td>
                                        <!-- <td><?= $data->file_name; ?></td> -->
                                        <td><?= $data->file_type; ?></td>
                                        <!-- <td><?= $data->full_path; ?></td> -->
                                        <td align="center"><?= $data->file_size; ?></td>
                                        <td><?= !empty($data->nama_user) ? $data->nama_user : $data->username; ?></td>
                                        <td><?= $data->comment; ?></td>
                                        <td align="center"><?= anchor('order/download_file/'.$data->file_name, 'Download'); ?></td>
                                        <td align="center">
                                            <!-- <a href="<?= site_url('order/editImage/'.$data->id_image); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a> -->
                                            <a href="<?= site_url('order/deleteImage/'.$data->id_image); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php  
                                } } ?>
                            </tbody>
                        </table>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>