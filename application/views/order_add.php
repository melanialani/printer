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
                                            <select name="jenis_cetakan" id="jenis_cetakan" class="form-control border-input" required>
                                            <?php foreach ($jenis_cetakan as $value) {
                                                    echo "<option value='". $value['id_jenis_cetakan'] . "'>" . $value['nama_jenis_cetakan'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="John Doe" id="nama" name="nama" required value="<?= $detail['nama_user'] ?>">
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
                                                if ( $value['id'] == $detail['warna'])
                                                    echo "<option value='". $value['id'] . "' selected>" . $value['nama'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
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
                                            <select name="warna" id="warna" class="form-control border-input" required>
                                            <?php foreach ($warna as $value) {
                                                    echo "<option value='". $value['warna'] . "'>" . $value['warna'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['role'] ?>"> -->
                                            <select name="warna" id="warna" class="form-control border-input" required>
                                            <?php foreach ($warna as $value) {
                                                if ( $value['id'] == $detail['warna'])
                                                    echo "<option value='". $value['id'] . "' selected>" . $value['nama'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cetak sebanyak</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="500"  id="qty" name="qty" value="<?= $detail['qty'] ?>">
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
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1 cm"  id="tinggi" name="tinggi" value="<?= $detail['tinggi'] ?>">
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
                                <button type="submit" class="btn btn-info btn-fill btn-wd" value="save" id="button" name="button">Simpan</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>