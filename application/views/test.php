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