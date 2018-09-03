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
                            <?= form_open('jeniscetak/add'); ?>
                        <?php } else { ?>
                            <?= form_open('jeniscetak/edit/'.$detail['id_jenis_cetakan']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Jenis Cetak</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Undangan" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Undangan" id="nama" name="nama" required value="<?= $detail['nama_jenis_cetakan'] ?>">
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