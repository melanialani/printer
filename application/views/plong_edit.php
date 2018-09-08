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
                            <?= form_open('plong/add'); ?>
                        <?php } else { ?>
                            <?= form_open('plong/edit/'.$detail['id_plong']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pisau Plong</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama" id="nama" name="nama" required value="<?= $detail['nama_plong'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Panjang Pisau Plong</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="panjang" name="panjang" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="panjang" name="panjang" required value="<?= $detail['panjang_plong'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lebar Pisau Plong</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="lebar" name="lebar" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="lebar" name="lebar" required value="<?= $detail['lebar_plong'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga Pisau Plong</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="5000" id="harga" name="harga" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="5000" id="harga" name="harga" required value="<?= $detail['harga_plong'] ?>">
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