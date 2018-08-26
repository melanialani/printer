<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-13 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                    </div>
                    <div class="content">
                        <?php if (!$edited) { ?>
                            <?= form_open('order/cetak'); ?>
                        <?php } else { ?>
                            <?= form_open('order/cetak/'.$id_jenis_cetak); ?>
                        <?php } ?>
                            <!-- Jenis Cetakan -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Cetakan</label>
                                        <?php if (!$edited) { ?>
                                            <select name="jenis_cetak" id="jenis_cetak" class="form-control border-input" required>
                                            <?php foreach ($jenis_cetak as $value) {
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "'>" . $value['nama_jenis_cetakan'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="jenis_cetak" id="jenis_cetak" class="form-control border-input" required>
                                            <?php foreach ($jenis_cetak as $value) {
                                                if ($value['id_jenis_cetakan'] == $id_jenis_cetak)
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "' selected>" . $value['nama_jenis_cetakan'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "'>" . $value['nama_jenis_cetakan'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- UKURAN KERTAS -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Panjang Kertas (cm)</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="25 cm" id="panjang" name="panjang" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="25 cm" id="panjang" name="panjang" required value="<?= $panjang; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lebar Kertas (cm)</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="12 cm"  id="lebar" name="lebar" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="12 cm"  id="lebar" name="lebar" required value="<?= $lebar; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tinggi Kertas (cm)</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi" required value="<?= $tinggi; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                            <!-- Jenis Kertas & Varian -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input" required onchange="this.form.submit()">
                                            <?php foreach ($jenis_kertas as $value) {
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['role'] ?>"> -->
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input" required onchange="this.form.submit()">
                                            <?php foreach ($jenis_kertas as $value) {
                                                if ($value['id_jenis_kertas'] == $id_jenis_kertas)
                                                    echo "<option value='". $value['id_jenis_kertas'] . "' selected>" . $value['namajenis_kertas'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Bahan</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="varian" id="varian" class="form-control border-input" required>
                                            <?php foreach ($varian as $value) {
                                                    echo "<option value='". $value['id_varian'] . "'>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['role'] ?>"> -->
                                            <select name="varian" id="varian" class="form-control border-input" required>
                                            <?php foreach ($varian as $value) {
                                                if ($value['id_varian'] == $id_varian)
                                                    echo "<option value='". $value['id_varian'] . "' selected>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_varian'] . "'>" . $value['nama_varian'] . ' - ' . $value['warna'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- QTY & TOTAL -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cetak sebanyak</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" required value="<?= $qty; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-top: 25px;">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" value="cek_harga" id="button" name="button">Cek Harga</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estimasi Harga</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="150000"  id="total" name="total" required disabled value="100000">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="150000"  id="total" name="total" required disabled value="<?= $total; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- CHECKBOXES -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- <label>Cetak sebanyak</label><br/> -->
                                        <?php if (!$edited) { ?>
                                            <input type="checkbox" name="laminasi" value="laminasi"> <label>Laminasi</label></input><br/>
                                            <input type="checkbox" name="porforasi" value="porforasi"> <label>Porforasi</label></input><br/>
                                            <input type="checkbox" name="numerator" value="numerator"> <label>Numerator</label></input><br/>
                                            <input type="checkbox" name="uv" value="uv"> <label>UV</label></input>
                                        <?php } else { ?>
                                            <?php if ($laminasi) { ?>
                                                <input type="checkbox" name="laminasi" value="laminasi" checked> <label>Laminasi</label></input><br/>
                                            <?php } else { ?>
                                                <input type="checkbox" name="laminasi" value="laminasi"> <label>Laminasi</label></input><br/>
                                            <?php } ?>

                                            <?php if ($porforasi) { ?>
                                                <input type="checkbox" name="porforasi" value="porforasi" checked> <label>Porforasi</label></input><br/>
                                            <?php } else { ?>
                                                <input type="checkbox" name="porforasi" value="porforasi"> <label>Porforasi</label></input><br/>
                                            <?php } ?>
                                            
                                            <?php if ($numerator) { ?>
                                                <input type="checkbox" name="numerator" value="numerator" checked> <label>Numerator</label></input><br/>
                                            <?php } else { ?>
                                                <input type="checkbox" name="numerator" value="numerator"> <label>Numerator</label></input><br/>
                                            <?php } ?>

                                            <?php if ($uv) { ?>
                                               <input type="checkbox" name="uv" value="uv" checked> <label>UV</label></input>
                                            <?php } else { ?>
                                                <input type="checkbox" name="uv" value="uv"> <label>UV</label></input>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <label>Barang dapat diambil pada tanggal : <?= !empty($tanggal_jadi) ? $tanggal_jadi : '-'; ?></label>
                            </div>
                            <br/>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" value="save" id="button" name="button">Mulai Order Cetakan</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>