<script type="text/javascript">
	$(function(){
		filter();
		$('#dg-pembayaran_pelanggan').datagrid({
			singleSelect:true,
			idField     :'itemid',
			columns     :[[
				{field:'kode',title:'ID Pelanggan',width:"20%",halign:'center',align:'center'},
				{field:'nama_pelanggan',title:'Nama Pelanggan',width:"30%",halign:'center',align:'left'},
				{field:'keterangan',title:'Keterangan',width:"25%",halign:'center',align:'left'},
				{field:'tagihan',title:'Total Bayar',width:"10%",halign:'center',align:'right'},
				{
	                field:'action',title:'Action',width:"10%",align:'center',
	                formatter:function(value,row,index){
	                    if (row.editing){
	                        
	                    } else {
	                        var b = '<button class="btn-action-edit" type="button" href="javascript:void(0)" onclick="print()">Bayar</button>';
	                        return b;
	                    }
	                }
	            }
	        ]],
	    });
	});

	function print(){
		alert('Hiyaa');
	}

	function filter()
    {
    	var dg = $('#dg-pembayaran_pelanggan').datagrid('loadData',[]);
    	var criteria = $('#txt-search').val();
		
        $.ajax({
			url     : "<?php echo base_url("pembayaran/hotspot/filter"); ?>",
			type    : "POST",
			dataType: 'json',
	    	success:function(data, textStatus, jqXHR){
	    		console.log(data);
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
</script>