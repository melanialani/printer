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
                            <?= form_open('user/add'); ?>
                        <?php } else { ?>
                            <?= form_open('user/edit/'.$detail['id']); ?>
                        <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="John Doe" id="nama" name="nama" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="John Doe" id="nama" name="nama" required value="<?= $detail['nama'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role User</label>
                                        <?php if (!$edited) { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required> -->
                                            <select name="role" id="role" class="form-control border-input" required>
                                            <?php foreach ($role as $value) {
                                                    echo "<option value='". $value['id'] . "'>" . $value['nama'] . "</option>";
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <!-- <input type="text" class="form-control border-input" placeholder="Customer" id="role" name="role" required value="<?= $detail['id_role'] ?>"> -->
                                            <select name="role" id="role" class="form-control border-input" required>
                                            <?php foreach ($role as $value) {
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

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <?php if (!$edited) { ?>
                                            <input type="email" class="form-control border-input" placeholder="name@mail.com" id="email" name="email" required>
                                        <?php } else { ?>
                                            <input type="email" class="form-control border-input" placeholder="name@mail.com" id="email" name="email" required value="<?= $detail['email'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <?php if (!$edited) { ?>
                                            <input type="text" class="form-control border-input" placeholder="username" id="username" name="username" required>
                                        <?php } else { ?>
                                            <input type="text" class="form-control border-input" placeholder="username" id="username" name="username" required value="<?= $detail['username'] ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password Awal</label>
                                        <?php if (!$edited) { ?>
                                            <input type="password" class="form-control border-input" id="password" name="password" required>
                                        <?php } else { ?>
                                            <input type="password" class="form-control border-input" id="password" name="password" required value="<?= $detail['password'] ?>">
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