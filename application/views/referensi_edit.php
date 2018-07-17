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
                            <?= form_open('referensi/add_child'); ?>
                        <?php } else { ?>
                            <?= form_open('referensi/edit_child/'.$detail['id']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Referensi</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Referensi" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Referensi" id="nama" name="nama" required value="<?= $detail['nama'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Referensi</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="parent" id="parent" class="form-control border-input" required>
                                            <?php foreach ($parent as $value) {
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['id_role'] ?>"> -->
                                            <select name="parent" id="parent" class="form-control border-input" required>
                                            <?php foreach ($parent as $value) {
                                                if ( $value['id'] == $detail['id_role'])
                                                    echo "<option value='". $value['id'] . "' selected>" . $value['nama'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
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