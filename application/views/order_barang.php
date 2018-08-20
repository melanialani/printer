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
                            <?= form_open('order/barang'); ?>
                        <?php } else { ?>
                            <?= form_open('order/barang'.$detail['id_order']); ?>
                        <?php } ?>
                            <!-- Jenis Barang -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <?php if (!$edited) { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input" required onchange="this.form.submit()">
                                                <option>Pilih Jenis Barang</option>
                                            <?php foreach ($jenis_barang as $value) {
                                                    echo "<option value='". $value['id_jenis_barang'] . "'>" . $value['nama_jenis_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input" required onchange="this.form.submit()">
                                            <?php foreach ($jenis_barang as $value) {
                                                if ($value['id_jenis_barang'] == $detail['id_jenis_barang'])
                                                    echo "<option value='". $value['id_jenis_barang'] . "' selected>" . $value['nama_jenis_barang'] . "</option>";
                                                else 
                                                    echo "<option value='". $value['id_jenis_barang'] . "'>" . $value['nama_jenis_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Barang -->
                            <?php if (!empty($barang)){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="header">
                                        <h4 class="title"><?= $page_title; ?></h4>
                                        <p class="category"><?= $page_note; ?></p>
                                    </div>
                                    <div class="content table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead><tr>
                                                <th>Nama Varian</th>
                                                <th>Warna</th>
                                                <th>Jenis Kertas</th>
                                                <th>Ukuran Kertas</th>
                                                <th>Harga</th>
                                                <th></th>
                                            </tr></thead>
                                            <tbody>
                                                <?php foreach ($barang as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $value['nama_varian']; ?></td>
                                                        <td><?= $value['warna']; ?></td>
                                                        <td><?= $value['namajenis_kertas']; ?></td>
                                                        <td><?= $value['nama_ukuran_kertas']; ?></td>
                                                        <td><?= number_format($value['harga_jual']); ?></td>
                                                        <td align="center">
                                                            <a href="<?= site_url('barang/edit/'.$value['id_varian']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span> Pilih</a>
                                                        </td>
                                                    </tr>
                                                    <?php  
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" value="save" id="button" name="button">Mulai Order Barang</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>