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
                            <?= form_open('barang/edit/'.$detail['id']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Company" id="nama" name="nama">
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Company" id="nama" name="nama" value="<?= $detail['nama'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="jumlah" name="jumlah">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="jumlah" name="jumlah" value="<?= $detail['jumlah'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Peringatan Barang Habis</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="warning" name="warning" value="<?= $detail['warning'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Harga Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="harga" name="harga">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="100" id="harga" name="harga" value="<?= $detail['harga'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" value="save" id="button" name="button">Tambah Barang</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>