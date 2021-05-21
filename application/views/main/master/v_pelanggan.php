<!--Content Header (Page header) -->
<section class="content-header">
    <h1>Daftar Pelanggan Hotspot</h1>
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
                                    <input id="txt-search" type="text" class="form-control" placeholder="Cari..." onkeyup="filter()">
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
                    <table id="dg-pelanggan" class="easyui-datagrid" title="Data Pelanggan Hotspot" style="width: 100%;height:397px;" pagination="false" singleSelect="true" toolbar="#toolbar" rownumbers="true" fitColumns="false">
                        <!--  -->
                    </table>
                    <div id="toolbar">
                        <a href="javascript:void(0)" id="btn-tambah" class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-user-plus"></i>
                            Tambah
                        </a>
                        <a href="javascript:void(0)" id="btn-edit" class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-edit"></i>
                            Ubah
                        </a>
                        <a href="javascript:void(0)" id="btn-view" class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-edit"></i>
                            Tampil
                        </a>
                        <a href="javascript:void(0)" id="btn-hapus"  class="easyui-linkbutton custom-toolbar" plain="true">
                            <i class="fa fa-trash-o"></i>
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="win-tambah_pelanggan" class="panel-window" data-title="Tambah Pelanggan Hotspot" style="width:35%;height: 62%;padding:15px;" maximizable="false" collapsible="false" resizable="false" minimizable="false">
    <form id="form-input" class="col-sm-12">
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">ID Pelanggan :</label>
            <div class="col-sm-5">
                <input id="txt-kode_pelanggan" name="kode" type="text" class="form-control form-control-sm">
                <input id="txt-id" name="id" type="hidden">
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">Layanan :</label>
            <div class="col-sm-8">
                <select id="cmb-layanan" name="layanan" class="form-control form-control-sm" style="width: 100%;">
                    <!-- <option value="1">Internet Hotspot</option>
                    <option value="2">Pemasangan Hotspot</option> -->
                </select>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">Nama Pelanggan :</label>
            <div class="col-sm-8">
                <input id="txt-nama_pelanggan" name="nama_pelanggan" type="text" class="form-control form-control-sm">
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">Tagihan :</label>
            <div class="col-sm-5">
                <input id="txt-tagihan" name="tagihan" type="text" onkeyup="inputterbilang();" class="money form-control form-control-sm">
                <!-- <input id="txt-tagihan" class="col-lg-9 form-control form-control-sm easyui-numberbox" style="text-align: right;" type="text"> -->
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">Terbilang :</label>
            <div class="col-sm-8">
                <input id="txt-terbilang" name="terbilang" type="text" class="form-control form-control-sm">
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label class="col-sm-4 col-form-label rx-line-center">Operasional :</label>
            <div class="col-sm-8">
                <textarea id="txt-operasional" name="keterangan" class="form-control form-control-sm kt-font-sm" style="resize: none;"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div id="div_update" class="col-sm-3" style="margin-top: 25px; padding: 2px;">
                <button onclick="update();" type="button" class="btn btn-block btn-success custom-btn-pink">
                    <i class="fa fa-save"></i>
                    Update
                </button>
            </div>
            <div id="div_simpan" class="col-sm-3" style="margin-top: 25px; padding: 2px;">
                <button onclick="create();" type="button" class="btn btn-block btn-success custom-btn-pink">
                    <i class="fa fa-save"></i>
                    Simpan
                </button>
            </div>
            <div class="col-sm-3" style="margin-top: 25px; padding: 2px;">
                <button onclick="cancel();" type="button" class="btn btn-block btn-secondary custom-btn-batal">
                    <i class="fa fa-times"></i>
                    Batal
                </button>
            </div>
        </div>
    </form>
</div>