<script type="text/javascript">
	$(function(){
		filter();
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
				{field:'kode',title:'ID Pelanggan',width:"20%",halign:'center',align:'center'},
				{field:'nama_pelanggan',title:'Nama Pelanggan',width:"35%",halign:'center',align:'left'},
				{field:'keterangan',title:'Keterangan',width:"25%",halign:'center',align:'left'},
				{field:'tagihan',title:'Total Bayar',width:"10%",halign:'center',align:'right'},
	        ]],
	    });
	});

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
				tagihan       :row.tagihan,
				terbilang     :row.terbilang,
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