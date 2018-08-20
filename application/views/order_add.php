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
                            <?= form_open('user/add'); ?>
                        <?php } else { ?>
                            <?= form_open('user/edit/'.$detail['id_user']); ?>
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
                                                if ($value['id_jenis_cetakan'] == $detail['id_jenis_cetakan'])
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "' selected>" . $value['nama_jenis_cetakan'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "'>" . $value['nama_jenis_cetakan'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Warna Kertas dan Jenis Kertas -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Warna Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="warna" id="warna" class="form-control border-input" required onchange="this.form.submit()">
                                            <?php foreach ($warna as $value) {
                                                    echo "<option value='". $value['warna'] . "'>" . $value['warna'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['role'] ?>"> -->
                                            <select name="warna" id="warna" class="form-control border-input" required>
                                            <?php foreach ($warna as $value) {
                                                if ($value['warna'] == $detail['warna'])
                                                    echo "<option value='". $value['warna'] . "' selected>" . $value['nama'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['warna'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input" required>
                                            <?php foreach ($jenis_kertas as $value) {
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['role'] ?>"> -->
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input" required>
                                            <?php foreach ($jenis_kertas as $value) {
                                                if ($value['id_jenis_kertas'] == $detail['jenis_kertas'])
                                                    echo "<option value='". $value['id_jenis_kertas'] . "' selected>" . $value['namajenis_kertas'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cetak sebanyak</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" required value="<?= $detail['qty'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- UKURAN KERTAS -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Panjang Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="25 cm" id="panjang" name="panjang" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="25 cm" id="panjang" name="panjang" required value="<?= $detail['panjang'] ?>"> cm
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lebar Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="12 cm"  id="lebar" name="lebar" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="12 cm"  id="lebar" name="lebar" required value="<?= $detail['lebar'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tinggi Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi" required value="<?= $detail['tinggi'] ?>">
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
                                            <input type="checkbox" name="numerator" value="numerator"> <label>Numerator</label></input>
                                        <?php } else { ?>
                                            <input type="email" class="form-control border-input" placeholder="name@mail.com" id="email" name="email" required value="<?= $detail['email'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

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