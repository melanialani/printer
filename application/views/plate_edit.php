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
                            <?= form_open('plate/add'); ?>
                        <?php } else { ?>
                            <?= form_open('plate/edit/'.$detail['id_master_plate']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Panjang Plate</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="30" id="panjang" name="panjang" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="30" id="panjang" name="panjang" required value="<?= $detail['panjang_plate'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lebar Plate</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="20" id="lebar" name="lebar" required>
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="20" id="lebar" name="lebar" required value="<?= $detail['lebar_plate'] ?>">
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