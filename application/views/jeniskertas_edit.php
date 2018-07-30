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
                            <?= form_open('jeniskertas/add'); ?>
                        <?php } else { ?>
                            <?= form_open('jeniskertas/edit/'.$detail['id_jenis_kertas']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ID Jenis Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="ID Jenis Kertas" id="id" name="id" disabled>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="ID Jenis Kertas" id="id" name="id" required disabled value="<?= $detail['id_jenis_kertas'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Jenis Kertas</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Jenis Kertas" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="Nama Jenis Kertas" id="nama" name="nama" required value="<?= $detail['namajenis_kertas'] ?>">
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