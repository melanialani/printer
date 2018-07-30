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
                            <?= form_open('ukurankertas/add'); ?>
                        <?php } else { ?>
                            <?= form_open('ukurankertas/edit/'.$detail['id_ukuran_kertas']); ?>
                        <?php } ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ID Barang</label>
                                        <?php if (!$edited) { ?>
                                            <select name="barang" id="barang" class="form-control border-input" required>
                                            <?php foreach ($barang as $value) {
                                                    echo "<option value='". $value['id_barang'] . "'>" . $value['nama_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="barang" id="barang" class="form-control border-input" required>
                                            <?php foreach ($barang as $value) {
                                                if ( $value['id_barang'] == $detail['id_barang'])
                                                    echo "<option value='". $value['id_barang'] . "' selected>" . $value['nama_barang'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_barang'] . "'>" . $value['nama_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- ID & NAME -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Ukuran Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Automatically Generated" id="id" name="id" disabled>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Automatically Generated" id="id" name="id" required disabled value="<?= $detail['id_ukuran_kertas'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Ukuran Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Ukuran A4" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Ukuran A4" id="nama" name="nama" required value="<?= $detail['nama_ukuran_kertas'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- WIDTH & HEIGHT -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Panjang Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="110" id="panjang" name="panjang">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="110" id="panjang" name="panjang" required value="<?= $detail['panjang_kertas'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lebar Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="75" id="lebar" name="lebar" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="75" id="lebar" name="lebar" required value="<?= $detail['lebar_kertas'] ?>">
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