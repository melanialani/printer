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
                            <?= form_open('barang/edit/'.$detail['id_barang']); ?>
                        <?php } ?>

                            <!-- ID & NAME -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Automatically Generated" id="id" name="id" required disabled>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Automatically Generated" id="id" name="id" required disabled value="<?= $detail['id_barang'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Barang" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Barang" id="nama" name="nama" required value="<?= $detail['nama_barang'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- HARGA BELI & HARGA JUAL -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="beli" name="beli" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="beli" name="beli" required value="<?= $detail['harga_beli'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1500" id="jual" name="jual" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1500" id="jual" name="jual" required disabled value="<?= $detail['harga_jual'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- STOCK AWAL & STOCK -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stock Awal</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="stock_awal" name="stock_awal" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="stock_awal" name="stock_awal" required value="<?= $detail['stock_awal'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
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

                            <!-- JUMLAH & WARNING & WARNA -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="57" id="jumlah" name="jumlah" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="57" id="jumlah" name="jumlah" required value="<?= $detail['jumlah'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label title="Notifikasi jumlah barang menipis">Jumlah Warning</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning" value="100">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning" value="<?= $detail['warning'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
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