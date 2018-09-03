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
                                        <?php if (!$id_jenis_barang) { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input" required onchange="this.form.submit()">
                                                <option>Pilih Jenis Barang</option>
                                            <?php foreach ($jenis_barang as $value) {
                                                    echo "<option value='". $value['id_jenis_barang'] . "'>" . $value['nama_jenis_barang'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control border-input" required onchange="this.form.submit()">
                                            <?php foreach ($jenis_barang as $value) {
                                                if ($value['id_jenis_barang'] == $id_jenis_barang)
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
                                                <th width="10%">Jumlah</th>
                                                <th width="10%">Total</th>
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
                                                        <td class="price">
                                                            <?= $value['harga_jual']; ?>
                                                        </td>
                                                        <td align="center">
                                                            <!-- <a href="<?= site_url('barang/edit/'.$value['id_varian']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span> Pilih</a> -->
                                                            <?php if (!$edited) { ?>
                                                                <input type="number" class="form-control border-input qty" placeholder="500"  id="qty[<?= $value['id_varian']; ?>]" name="qty[<?= $value['id_varian']; ?>]" min="0" value="0" required>
                                                            <?php } else { ?>
                                                                <input type="number" class="form-control border-input qty" placeholder="500"  id="qty[<?= $value['id_varian']; ?>]" name="qty[<?= $value['id_varian']; ?>]" min="0" value="0" required>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="sum" align="right">0</td>
                                                    </tr>
                                                    <?php  
                                                } ?>
                                                <tr>
                                                    <td colspan='6' align="right">Total</td>
                                                    <td id='total' align="right">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="hidden" name="total_harga" id="total_harga" value="0">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" value="save" id="button" name="button">Mulai Order Barang</button>
                            </div>

                            <?php } ?>

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function getTotal(){
        var total = 0;
        $('.sum').each(function(){
            total += parseFloat(this.innerHTML)
        });
        $('#total').text(total);
        document.getElementById("total_harga").value = total;
    }

    getTotal();

    $('.qty').keyup(function(){
        var parent = $(this).parents('tr');
        var price = $('.price', parent);
        var sum = $('.sum', parent);
        var value = parseInt(this.value) * parseFloat(price.get(0).innerHTML||0);
        sum.text(value);
        getTotal();
    })
</script>