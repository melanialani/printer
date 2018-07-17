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
                            <?= form_open('barang/add_child'); ?>
                        <?php } else { ?>
                            <?= form_open('barang/edit_child/'.$detail['id']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori Barang</label>
                                        <?php if (!$edited) { ?>
                                            <select name="parent" id="parent" class="form-control border-input">
                                                <!-- <option value='0'> -- Tanpa Category -- </option> -->
                                            <?php foreach ($parent as $value) {
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="parent" id="parent" class="form-control border-input">
                                                <!-- <option value='0'> -- Tanpa Category -- </option> -->
                                            <?php foreach ($parent as $value) {
                                                if ( $value['id'] == $detail['parent'])
                                                    echo "<option value='". $value['id'] . "' selected>" . $value['nama'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Kertas A4" id="nama" name="nama">
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Kertas A4" id="nama" name="nama" value="<?= $detail['nama'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="jumlah" name="jumlah">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="150" id="jumlah" name="jumlah" value="<?= $detail['jumlah'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Peringatan Barang Habis <small><i>default: 10</i></small></label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="warning" name="warning">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="10" id="warning" name="warning" value="<?= $detail['warning'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="harga" name="harga">
                                        <?php } else { ?>
                                            <input type="number" class="form-control border-input" placeholder="1000" id="harga" name="harga" value="<?= $detail['harga'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ukuran Barang</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="21x21cm" id="ukuran" name="ukuran">
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="21x21cm" id="ukuran" name="ukuran" value="<?= $detail['ukuran'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Barang</label>
                                        <?php if (!$edited) { ?>
                                            <textarea class="form-control border-input" placeholder="Deskripsi barang" id="deskripsi" name="deskripsi" width='100%'></textarea>
                                        <?php } else { ?>
                                            <textarea class="form-control border-input" placeholder="Deskripsi barang" id="deskripsi" name="deskripsi" width='100%'><?= $detail['deskripsi'] ?></textarea>
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