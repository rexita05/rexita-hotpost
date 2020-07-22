$(document).ready(function(){
	// DATAGRID
    // initialize datagrid
    $('.easyui-datagrid').each(function () {
        $(this).datagrid({
            nowrap: true,
            emptyMsg: 'Data Kosong',
            onLoadError:function(){
                // $.messager.alert("Mohon Cek Koneksi Anda Kembali");
            }
        });
    });
})