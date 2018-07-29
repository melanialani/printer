<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= site_url('user/add/'); ?>" class="btn btn-info btn-fill btn-wd">Tambah User Baru</a>
                    <!-- <button class="btn btn-sm btn-success" style="margin-left: 2px;" onclick="goEdit()" style="margin-left: 3px;">Ubah Data</button> -->
                </div>
                <br/>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>HP</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['nama_user']; ?></td>
                                        <td><?= $value['username']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['no_hp']; ?></td>
                                        <td>
                                            <?php if ($value['role'] == 0) echo 'Admin';
                                            else if ($value['role'] == 1) echo 'Pegawai';
                                            else echo 'Customer'; ?>
                                        </td>
                                        <td>
                                            <?php if ($value['is_active'] == 1) echo 'AKTIF';
                                            else echo 'NON-AKTIF'; ?>
                                        </td>
                                        <td align="center">
                                            <a href="<?= site_url('user/edit/'.$value['id_user']); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a>
                                            <?php if ($value['is_active']) { ?>
                                                <?= form_hidden('status', 0); ?>
                                                <a href="<?= site_url('user/active/'.$value['id_user']); ?>" class="btn btn-info btn-xs"><span class="ti-reload" title="Deactivate"></span></a>
                                            <?php } else { ?>
                                                <?= form_hidden('status', 1); ?>
                                                <a href="<?= site_url('user/active/'.$value['id_user']); ?>" class="btn btn-info btn-xs"><span class="ti-reload" title="Activate"></span></a>
                                            <?php } ?>
                                            <a href="<?= site_url('user/delete/'.$value['id_user']); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php  
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
           $('#myTable').dataTable();
       });
</script>

<script>
function goGen(){
    if(confirm('Generate akan menghapus semua data, apakah anda yakin?')){
        goSubmit('genPerencanaan');
    }
}
function goEdit(){
    $('#act').val('edit');
    return goSubmit();
}
</script>
