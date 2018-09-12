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
                            <?= form_open('barang/add'); ?>
                        <?php } else { ?>
                            <?= form_open('barang/edit/'.$detail['id_varian']); ?>
                        <?php } ?>

                            <!-- NAME -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Barang" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Barang" id="nama" name="nama" required value="<?= $detail['nama_varian'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- JENIS BARANG -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <?php if (!$edited) { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input">
                                            <?php foreach ($jenis_barang as $value) {
                                                    echo "<option value='". $value['id_jenis_barang'] . "'>" . $value['nama_jenis_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input">
                                            <?php foreach ($jenis_barang as $value) {
                                                if ( $value['id_jenis_barang'] == $detail['id_jenis_barang'])
                                                    echo "<option value='". $value['id_jenis_barang'] . "' selected>" . $value['nama_jenis_barang'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_barang'] . "'>" . $value['nama_jenis_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- JENIS KERTAS & UKURAN KERTAS -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input">
                                            <?php foreach ($jenis_kertas as $value) {
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="jenis_kertas" id="jenis_kertas" class="form-control border-input">
                                            <?php foreach ($jenis_kertas as $value) {
                                                if ( $value['id_jenis_kertas'] == $detail['id_jenis_kertas'])
                                                    echo "<option value='". $value['id_jenis_kertas'] . "' selected>" . $value['namajenis_kertas'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_kertas'] . "'>" . $value['namajenis_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- UKURAN KERTAS -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ukuran Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <select name="ukuran_kertas" id="ukuran_kertas" class="form-control border-input">
                                            <?php foreach ($ukuran_kertas as $value) {
                                                    echo "<option value='". $value['id_ukuran_kertas'] . "'>" . $value['nama_ukuran_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="ukuran_kertas" id="ukuran_kertas" class="form-control border-input">
                                            <?php foreach ($ukuran_kertas as $value) {
                                                if ( $value['id_ukuran_kertas'] == $detail['id_ukuran_kertas'])
                                                    echo "<option value='". $value['id_ukuran_kertas'] . "' selected>" . $value['nama_ukuran_kertas'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_ukuran_kertas'] . "'>" . $value['nama_ukuran_kertas'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- STOCK AWAL -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Stock Awal</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="stock_awal" name="stock_awal" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="stock_awal" name="stock_awal" required value="<?= $detail['stock_awal'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- STOCK -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="148" id="stock" name="stock">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="148" id="stock" name="stock" value="<?= $detail['stock'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- JUMLAH -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="57" id="jumlah" name="jumlah" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="57" id="jumlah" name="jumlah" required value="<?= $detail['jumlah'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- WARNING STOCK -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label title="Notifikasi jumlah barang menipis">Jumlah Warning Stock</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning" value="100">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning" value="<?= $detail['warning'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- WARNA -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Biru" id="warna" name="warna">
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Biru" id="warna" name="warna" value="<?= $detail['warna'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- HARGA BELI -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="beli" name="beli" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="beli" name="beli" required value="<?= $detail['harga_beli'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- HARGA JUAL -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1500" id="jual" name="jual" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1500" id="jual" name="jual" required value="<?= $detail['harga_jual'] ?>">
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