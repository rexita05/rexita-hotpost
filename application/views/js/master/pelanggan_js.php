<script type="text/javascript">
	var data = [
		{
			id: 1,
			text: 'Internet Hotspot'
		},
		{
			id: 2,
			text: 'Pemasangan Hotspot'
		}
	];

	$(function(){
		filter();
		// inputterbilang();
		// var rupiah = document.getElementById('txt-tagihan');
		// rupiah.addEventListener('keyup', function(e){
			// rupiah.value = formatRupiah(this.value, 'Rp ');
		// });

		$('#cmb-layanan').select2({
			dropdownParent:$('#win-tambah_pelanggan'),
			placeholder: 'Pilih Layanan',
			data:data
		});

		$('#btn-tambah').click(function(event) {
			$('#win-tambah_pelanggan').window({
				onOpen:function(){
					reset_form();
				}
			});  
			$('#div_update').hide();
		});
		$('#btn-edit').click(function(event) {
			view=false;
			var row=$('#dg-pelanggan').datagrid('getSelected');
			if(row==null){
				$.messager.alert('Warning!','Tidak ada data yang dipilih.')
				return false;
			}
			getData(row);
		});
		$('#btn-view').click(function(event) {
			view=true;
			var row=$('#dg-pelanggan').datagrid('getSelected');
			if(row==null){
				$.messager.alert('Warning!','Tidak ada data yang dipilih.');
				return false;
			}
			getData(row);
		});
		$('#btn-hapus').click(function(event) {
			delete_row();
		});
		$('#dg-pelanggan').datagrid({
			singleSelect:true,
			idField     :'itemid',
			onDblClickRow:function(index,row){
				view=false;
				getData(row);
			},
			columns:[[
				{field:'kode',title:'ID Pelanggan',width:"20%",halign:'center',align:'center'},
				{field:'nama_pelanggan',title:'Nama Pelanggan',width:"35%",halign:'center',align:'left'},
				{field:'keterangan',title:'Keterangan',width:"25%",halign:'center',align:'left'},
				{field:'tagihan',title:'Total Bayar',width:"10%",halign:'center',align:'right', formatter: formatRupiah},
	        ]],
	    });
	})

	function inputterbilang() {
		$('.money').mask('0.000.000.000', {reverse: true});
       	var input = document.getElementById("txt-tagihan").value.replace(/\./g, "");
       	document.getElementById("txt-terbilang").value = terbilang(input).replace(/ +/g, ' ');
    } 

	function filter(){
		var dg=$('#dg-pelanggan').datagrid('loadData',[]);
		var criteria=$('#txt-search').val();
		$.ajax({
			url     :"<?php echo base_url("master/pelanggan/filter"); ?>",
			type    :"POST",
			dataType:'json',
			success:function(data, textStatus, jqXHR){
				// console.log(data);
				$('#dg-pelanggan').datagrid('loadData',data);
			},
			error:function(){
				alert('Error,something goes wrong');
			},
			complete:function(){
				//
			}
		})
	}

	function create(){
		var kode=$('#txt-kode_pelanggan').val();
    	var layanan=$('#cmb-layanan option:selected').val();
    	var nama_pelanggan=$('#txt-nama_pelanggan').val();
    	var tagihan=$('#txt-tagihan').val();
    	var terbilang=$('#txt-terbilang').val();
    	var keterangan=$('#txt-keterangan').val();

    	if (kode=='') {
	      	$.messager.alert('Warning!', 'ID Pelanggan tidak boleh kosong.');
	      	return false;
	    }
	    if (layanan=='') {
	      	$.messager.alert('Warning!', 'Layanan tidak boleh kosong.');
	      	return false;
	    }
	    if (nama_pelanggan=='') {
	      	$.messager.alert('Warning!', 'Nama Pelanggan tidak boleh kosong.');
	      	return false;
	    }
	    if (tagihan=='') {
	      	$.messager.alert('Warning!', 'Tagihan tidak boleh kosong.');
	      	return false;
	    }
	    if (terbilang=='') {
	      	$.messager.alert('Warning!', 'Terbilang tidak boleh kosong.');
	      	return false;
	    }
	    if (keterangan=='') {
	      	$.messager.alert('Warning!', 'Keterangan tidak boleh kosong.');
	      	return false;
	    }

	    $.ajax({
			url     :"<?php echo base_url("master/pelanggan/create"); ?>",
			type    :"POST",
			dataType:'json',
			data    :'kode='+kode+'&layanan='+layanan+'&nama_pelanggan='+nama_pelanggan+'&tagihan='+toUang(tagihan)+'&terbilang='+terbilang+'&keterangan='+keterangan,
	    	success:function(data, textStatus, jqXHR){
	    		$.messager.alert('Success!',data.message);
	    		$('#win-tambah_pelanggan').window('close');
	    		filter();
	    	},
	    	error:function(jqXHR, textStatus, errorThrown){
              	alert('Error,something goes wrong');
          	},
          	complete:function(){
          		//
          	}
	    })
	}

	function update(){
		var id=$('#txt-id').val();
    	var kode=$('#txt-kode_pelanggan').val();
    	var layanan=$('#cmb-layanan option:selected').val();
    	var nama_pelanggan=$('#txt-nama_pelanggan').val();
    	var tagihan=$('#txt-tagihan').val();
    	var terbilang=$('#txt-terbilang').val();
    	var keterangan=$('#txt-keterangan').val();

    	$.ajax({
			url     :"<?php echo base_url("master/pelanggan/update"); ?>",
			type    :"POST",
			dataType:'json',
			data    :'id='+id+'&kode='+kode+'&layanan='+layanan+'&nama_pelanggan='+nama_pelanggan+'&tagihan='+toUang(tagihan)+'&terbilang='+terbilang+'&keterangan='+keterangan,
    		success:function(data){
    			$.messager.alert('Success!',data.message);
				$('#win-tambah_pelanggan').window('close');
				filter();
    		},
    		error:function(jqXHR, textStatus, errorThrown){
              	alert('Error,something goes wrong');
          	},
          	complete:function(){
          		//
          	}

    	})
	}

	function getData(row){
		$.ajax({
			url     :"<?php echo base_url("master/pelanggan/getData"); ?>",
			type    :"POST",
			dataType:'json',
			data    :{id:row.id},
			success:function(data){
				$('#win-tambah_pelanggan').window({
					onOpen:function(){
						set_form(data);
					}
				});
          		// set_form(data);
			},
			error:function(jqXHR, textStatus, errorThrown){
              	alert('Error,something goes wrong');
          	},
          	complete:function(){
            	//
          	}
		})
	}

	function set_form(data){
		if(view==true){
			$('#txt-id').val(data[0].id);
    		$('#txt-kode_pelanggan').val(data[0].kode);
	    	$('#cmb-layanan').val(data[0].layanan).change();
	    	$('#txt-nama_pelanggan').val(data[0].nama_pelanggan);
	    	$('#txt-tagihan').val('Rp '+formatRupiah(data[0].tagihan));
	    	$('#txt-terbilang').val(data[0].terbilang);
	    	$('#txt-keterangan').val(data[0].keterangan);

	    	$('#txt-id').attr('disabled',true);
	    	$('#txt-kode_pelanggan').attr('disabled',true);
	    	$('#cmb-layanan').attr('disabled',true);
	    	$('#txt-nama_pelanggan').attr('disabled',true);
	    	$('#txt-tagihan').attr('disabled',true);
	    	$('#txt-terbilang').attr('disabled',true);
	    	$('#txt-keterangan').attr('disabled',true);

	    	$('#div_update').hide();
	    	$('#div_simpan').hide();
		}
		else{
			$('#txt-id').val(data[0].id);
    		$('#txt-kode_pelanggan').val(data[0].kode);
	    	$('#cmb-layanan').val(data[0].layanan).change();
	    	$('#txt-nama_pelanggan').val(data[0].nama_pelanggan);
	    	$('#txt-tagihan').val('Rp '+formatRupiah(data[0].tagihan));
	    	$('#txt-terbilang').val(data[0].terbilang);
	    	$('#txt-keterangan').val(data[0].keterangan);

	    	$('#txt-id').attr('disabled',true);
	    	$('#txt-kode_pelanggan').attr('disabled',false);
	    	$('#cmb-layanan').attr('disabled',false);
	    	$('#txt-nama_pelanggan').attr('disabled',false);
	    	$('#txt-tagihan').attr('disabled',false);
	    	$('#txt-terbilang').attr('disabled',true);
	    	$('#txt-keterangan').attr('disabled',false);

	    	$('#div_simpan').hide();
	    	$('#div_update').show();
		}
	}

	function delete_row(){
		var row=$('#dg-pelanggan').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning!','Tidak ada data yang dipilih.');
		}
		$.messager.confirm('Confirm','Apakah Anda yakin ingin menghapus Data Pelanggan ?',function(r){
			if(r){
				var row=$('#dg-pelanggan').datagrid('getSelected');
				$.ajax({
					url:"<?php echo base_url("master/pelanggan/delete_row");?>",
					type:"POST",
					dataType:'json',
					data:{id:row.id},
					success:function(data){
						$.messager.alert('Success!',data.message);
		            	filter();
					},
					error:function(jqXHR, textStatus, errorThrown){
		              	alert('Error,something goes wrong');
		          	},
		          	complete:function(){
		            	//
		          	}
				})
			}
		})
	}

	function reset_form(){
		$('#txt-id').attr('disabled',true);
    	$('#txt-kode_pelanggan').attr('disabled',false);
    	$('#cmb-layanan').attr('disabled',false);
    	$('#txt-nama_pelanggan').attr('disabled',false);
    	$('#txt-tagihan').attr('disabled',false);
    	$('#txt-terbilang').attr('disabled',true);
    	$('#txt-keterangan').attr('disabled',false);

    	$('#txt-id').val('');
    	$('#txt-kode_pelanggan').val('');
    	$('#txt-nama_pelanggan').val('');
    	$('#txt-tagihan').val('');
    	$('#txt-terbilang').val('');
    	$('#txt-keterangan').val('');

    	$('#div_simpan').show();
	}

	function cancel(){
		$('#win-tambah_pelanggan').window('close');
	}
</script>