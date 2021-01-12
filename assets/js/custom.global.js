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

$('.panel-window').each(function () {
    $(this).window({
        modal: true,
        title: $(this).data('title') ? $(this).data('title') : 'New window',
        resizable  : false,
        maximizable: false,
        collapsible: false,
        resizable  : false,
        minimizable: false
    });
    // Close Window Panel on Start
    $(this).window('close')
});

$(window).scroll(function () {
    // var height = $(window).scrollTop();
    $('.panel-window').window('center');
});

$('.panel-window').panel({
    onOpen: function () {
        $('.easyui-datagrid').datagrid('resize');
    }
})