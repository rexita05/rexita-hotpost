<!--Content Header (Page header) -->
<section class="content-header">
    <h1>Daftar Pembayaran Hotspot</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div id="width-sensor" class="box-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label rx-line-center">Nama Pelanggan :</label>
                                <div class="col-sm-5">
                                    <input id="txt-kriteria" type="text" class="form-control" placeholder="Cari...">
                                </div>
                                <div class="col-sm-3" style="margin-left: -25px;">
                                    <button onclick="filter();" type="button" class="btn btn-block btn-primary custom-btn-pink">
                                        <i class="fa fa-filter"></i>
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="dg-pembayaran_pelanggan" class="easyui-datagrid" title="Data Pembayaran Hotspot" style="width: 100%;height:397px;" pagination="false" toolbar="#toolbar" singleSelect="true" rownumbers="true" fitColumns="false">
                        <!--  -->
                    </table>
                    <div id="toolbar">
                        <!-- <a href="javascript:void(0)" id="btn-print_preview"  class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-print"></i>
                            Bayar
                        </a> -->
                        <a href="javascript:void(0)" id="btn-print_preview"  class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-file-text-o"></i>
                            Preview
                        </a>
                        <a href="javascript:void(0)" id="btn-bayar"  class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-print"></i>
                            Bayar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="cetak_truk" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-detail" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <iframe name="struk" id="struk" src="" width="100%" height ="620px"></iframe>
            </div>
        </div>
    </div>
</div>