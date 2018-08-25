<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?= $page_title; ?></h4>
                        <p class="category"><?= $page_note; ?></p>
                    </div>
                    <div class="content table-responsive">

                        <?php echo form_open_multipart('order/upload');?>
                            <table>
                                <tr>
                                    <td><strong>Pilih file yang akan di-upload</strong></td>
                                    <td><input type="file" name="file_name" size="100" style="margin-left: 50px;" /></td>
                                    <td><input type="submit" value="upload" class="btn btn-info btn-fill"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><i style="color: red;">File yang bisa di-upload hanyalah file dengan ekstensi .png, .jpg, .jpeg, .psd, .cdr</i></td>
                                </tr>
                            </table>
                        </form>                    
                        
                        <hr>

                        <table id="myTable" class="table table-striped">
                            <thead><tr>
                                <th></th>
                                <th align="center">File Name</th>
                                <th align="center">File Type</th>
                                <!-- <th align="center">Full Path</th> -->
                                <th align="center">File Size</th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($row as $data) {
                                    ?>
                                    <tr>
                                        <td align="center"><?= img(array('src' => 'upload/'.$data->file_name, 'width' => '80', 'height' => '50')); ?></td>
                                        <td><?= $data->file_name; ?></td>
                                        <td><?= $data->file_type; ?></td>
                                        <!-- <td><?= $data->full_path; ?></td> -->
                                        <td align="center"><?= $data->file_size; ?></td>
                                        <td align="center"><?= anchor('order/download_file/'.$data->file_name, 'Download'); ?></td>
                                        <td align="center">
                                            <!-- <a href="<?= site_url('order/editImage/'.$data->id_image); ?>" class="btn btn-waning btn-xs"><span class="ti-pencil" title="Edit"></span></a> -->
                                            <a href="<?= site_url('order/deleteImage/'.$data->id_image); ?>" class="btn btn-danger btn-xs"><span class="ti-trash" title="Delete"></span></a>
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
        $('#myTable').dataTable( {
            "ordering": false
        } );
    });
</script>
