<script type="text/javascript">
	$(function(){
		filter();
        // $('#txt-diskon').onFocus('');
		$('#btn-print_preview').click(function(event) {
			var row = $('#dg-pembayaran_pelanggan').datagrid('getSelected');
			if(row==null){
				$.messager.alert('Warning!','Tidak ada data yang dipilih.');
				return false;
			}
			// print_preview(row);
			print_preview(row);
		});
		$('#btn-bayar').click(function(event) {
			var row = $('#dg-pembayaran_pelanggan').datagrid('getSelected');
			if(row==null){
				$.messager.alert('Warning!','Tidak ada data yang dipilih.');
				return false;
			}
			print_out(row);
		});
		$('#dg-pembayaran_pelanggan').datagrid({
			singleSelect:true,
			idField     :'itemid',
			columns     :[[
				{field:'kode',title:'ID Pelanggan',width:"13%",halign:'center',align:'left'},
				{field:'nama_pelanggan',title:'Nama Pelanggan',width:"17%",halign:'center',align:'left'},
				{field:'operasional',title:'Operasional',width:"25%",halign:'center',align:'left'},
                {field:'jml_diskon',title:'Diskon (Harga)',width:"10%",halign:'center',align:'right', formatter: formatIndo,
                    editor : {
                        'type':'numberbox',
                    }
                },
				{field:'tagihan',title:'Total Bayar',width:"8%",halign:'center',align:'right', formatter: formatRupiah},
                {field:'action',title:'Action',width:'12%',align:'center',
                    formatter:function(value,row,index){
                        if (row.editing){
                            var s = '<button class="btn-action-save" type="button" href="javascript:void(0)" onclick="saverow(this)">Save</button> &nbsp&nbsp&nbsp';
                            var c = '<button class="btn-action-cancel" type="button" href="javascript:void(0)" onclick="cancelrow(this)">Cancel</button>';
                            return s+c;
                        } else {
                            var e = '<button class="btn-action-edit" type="button" href="javascript:void(0)" onclick="editrow(this)">Edit</button> &nbsp&nbsp&nbsp';
                            var d = '<button class="btn-action-delete" type="button" href="javascript:void(0)" onclick="cetak(this)">Cetak</button>';
                            return e+d;
                        }
                    }
                }
	        ]],
            onEndEdit:function(index,row){
            },
            onBeforeEdit:function(index,row){
                row.editing = true;
                $(this).datagrid('refreshRow', index);
            },
            onAfterEdit:function(index,row){
                row.editing = false;
                $(this).datagrid('refreshRow', index);
            },
            onCancelEdit:function(index,row){
                row.editing = false;
                $(this).datagrid('refreshRow', index);
            }
	    });
	});

    function getRowIndex(target){
        var tr = $(target).closest('tr.datagrid-row');
        return parseInt(tr.attr('datagrid-row-index'));
    }
    function editrow(target){
        $('#dg-pembayaran_pelanggan').datagrid('beginEdit', getRowIndex(target));
        edit_detail = 2;
    }
    function saverow(target){
        // $('#dg-pembayaran_pelanggan').datagrid('endEdit', getRowIndex(target));
        // $.messager.alert('Warning!','Tidak ada data yang dipilih.');
        var diskon = $('#dg-pembayaran_pelanggan').datagrid('getEditor', {
            // index: rowGridSelected,
			index: getRowIndex(target),
            field: 'jml_diskon'
        });

        let rowsav = $('#dg-pembayaran_pelanggan').datagrid('getRows')[getRowIndex(target)];

        var diskon_harga = Number($(diskon.target).numberbox('getValue'));
        if (diskon_harga > 30000) {
            $.messager.alert('Warning!','Diskon tidak boleh melebihi 30.000');
            return false;
        }
        else{
            $('#dg-pembayaran_pelanggan').datagrid('endEdit', getRowIndex(target));
        }
    }
    function cancelrow(target){
        $('#dg-pembayaran_pelanggan').datagrid('cancelEdit', getRowIndex(target));
        edit_detail = 0;
    }

    function inputterbilang() {
		$('.money').mask('0.000.000.000', {reverse: true});
       	var input = document.getElementById("txt-diskon").value.replace(/\./g, "");
       	// document.getElementById("txt-terbilang").value = terbilang(input).replace(/ +/g, ' ');
    }

    function cetak(){
        var row = $('#dg-pembayaran_pelanggan').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning!','Tidak ada data yang dipilih.');
            return false;
        }
        // print_preview(row);
        print_preview(row);
    }
	
	function filter(){
    	var dg = $('#dg-pembayaran_pelanggan').datagrid('loadData',[]);
    	var criteria = $('#txt-search').val();
		
        $.ajax({
			url     : "<?php echo base_url("pembayaran/hotspot/filter"); ?>",
			type    : "POST",
			dataType: 'json',
	    	success:function(data, textStatus, jqXHR){
	    		// console.log(data);
	        	$('#dg-pembayaran_pelanggan').datagrid('loadData', data);
	      	},
	      	error: function(jqXHR, textStatus, errorThrown){
	          	alert('Error,something goes wrong');
	      	},
	      	complete: function(){
	        	$('#btn-save').prop('disabled', false);
	        	$('#btn-save').html('Save');
	      	}
	    });
    }

    function print_preview(row){
    	$('#loader').css('display','');
    	var nesindo ="CV. NETWORK ECOS SYSTEM INDONESIA (NESINDO)";
        row = $("#dg-pembayaran_pelanggan").datagrid("getSelected");
        diskon = row.jml_diskon;
        if(diskon==undefined){
            diskon=0;
        }
        else if(diskon==''){
            diskon=0;
        }
        // console.log(row.jml_diskon);
    	$.ajax({
			url     :"<?php echo base_url("pembayaran/hotspot/print_out"); ?>",
			type    :"POST",
			dataType:'json',
			data    :{
				id            :row.id,
				kode          :row.kode,
				layanan       :row.layanan,
				nama_pelanggan:row.nama_pelanggan,
                operasional   :row.operasional,
				tagihan       :row.tagihan,
				terbilang     :row.terbilang,
                diskon        :diskon,
				nesindo       :nesindo,
			},
			success:function(data){
				// console.log(data);
				var file_cetak =row.kode+ '.pdf';
				if(data.success===true){
	            	$('#loader').css('display','none');
	            	$("#struk").attr("src", "<?= base_url() ?>assets/file/"+file_cetak);
	            	$("#cetak_truk").modal("show");
	            }
			},
			fail: function (e) {
		        // console.log(data);
		        $('#loader').css('display','none');
		    }
		})
    }

    //cetak tanda preview (beum bisa)
    function print_out(row){
    	$('#loader').css('display','');
    	var nesindo="CV. NETWORK ECOS SYSTEM INDONESIA (NESINDO)";
    	$.ajax({
			url     :"<?php echo base_url("pembayaran/hotspot/print_out"); ?>",
			type    :"POST",
			dataType:'json',
			data    :{
				id            :row.id,
				kode          :row.kode,
				layanan       :row.layanan,
				nama_pelanggan:row.nama_pelanggan,
                operasional   :row.operasional,
				tagihan       :row.tagihan,
				terbilang     :row.terbilang,
				nesindo       :nesindo,
			},
			success:function(data){
				// console.log(data);
				var file_cetak=row.kode+'.pdf';
				if(data.success===true){
	            	$('#loader').css('display','none');
	            	var newIframe = document.createElement('iframe');
					newIframe.width = '0';
					newIframe.height = '0';
					newIframe.src = "<?= base_url() ?>assets/file/"+file_cetak;
					document.body.appendChild(newIframe);
	            	newIframe.focus();
					setTimeout(function() {
					  	newIframe.contentWindow.print();
					}, 200);
					return;
	            }
			},
			fail: function (e) {
		        // console.log(data);
		        $('#loader').css('display','none');
		    }
		})
    }
</script>