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
                    <table id="dg-pembayaran_pelanggan" class="easyui-datagrid" title="Data Pembayaran Hotspot" style="width: 100%;height:397px;" pagination="false" singleSelect="true" rownumbers="true" fitColumns="false">
                        <!--  -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>