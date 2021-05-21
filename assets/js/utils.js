// Number Format
// accounting.settings = {
// 	currency: {
// 		symbol : "Rp",   // default currency symbol is '$'
// 		format: "%s %v", // controls output: %s = symbol, %v = value/number (can be object: see below)
// 		decimal : ",",  // decimal point separator
// 		thousand: ".",  // thousands separator
// 		precision : 2   // decimal places
// 	},
// 	number: {
// 		precision : 2,
// 		thousand: ".",
// 		decimal : ","
// 	}
// }

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
}

function toUang(val){
	var total = val.replace(/[^0-9]/g,"");
	total=parseInt(total);
	return total;
}

function toInt(input) {
	let output = input
    .replace(/,.*/g, '') // cut off ',' and after
    .replace(/\D/g, ''); // remove non-digit characters

	// or in one go:
	// var output = input.replace(/,.*|\D/g, '');

	output = parseInt(output, 10); // convert to Number
	return output;
}

// Data Grid Number Format
function datagridFormatNumber(val,row){
  return accounting.formatNumber(val);
}

function appGridNumberFormatter(val, row) {
	return accounting.formatNumber(val);
}
function formatIndo(val, row) {
	return accounting.formatMoney(val," ", 0, ".", ",");
}
function appGridMoneyFormatter(val, row) {
	return accounting.formatMoney(val);
}
function formatPersen(val, row) {
	if(val=='-')
	{
		return " ";
	}
	else
	{
		return accounting.formatMoney(val,"", 2, ".", ",")+"%";
	}
}

// DateBox Date Format
function appDateFormatter(date){
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
}

function appDateParser(s){
	if (!s) return new Date();
	var ss = (s.split('/'));

	var d = parseInt(ss[0],10);
	var m = parseInt(ss[1],10);
	var y = parseInt(ss[2],10);
	if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
		return new Date(y,m-1,d);
	} else {
		return new Date();
	}
}

function appDateTimeFormatter(date){
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	var hour = date.getHours();
	var min = date.getMinutes();

	return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y+' '+(hour<10?('0'+hour):hour)+':'+(min<10?('0'+min):min);
}

function appDateTimeParser(s){
	if (!s) return new Date();
	arr_s = s.split(' ');

	var ss = (arr_s[0].split('/'));

	var d = parseInt(ss[0],10);
	var m = parseInt(ss[1],10);
	var y = parseInt(ss[2],10);

	var hh = (arr_s[1].split(':'));
	var hour = parseInt(hh[0],10);
	var min = parseInt(hh[1],10);

	if (!isNaN(y) && !isNaN(m) && !isNaN(d) && !isNaN(hour) && !isNaN(min)){
		return new Date(y, m-1, d, hour, min);
	} else {
		return new Date();
	}
}

// Date Conversion
function toAPIDateFormat(s){
	if (!s) return null;
	var ss = (s.split('/'));

	var d = parseInt(ss[0],10).toString();
	var m = parseInt(ss[1],10).toString();
	var y = parseInt(ss[2],10).toString();
	
	if (d.length<2) d = '0' + d;
    if (m.length < 2) m = '0' + m;	

	return [y, m, d].join('-');
}

function toAPIDateTimeFormat(s){
	if (!s) return null;

	var arr_dt = (s.split(' '));
	var ss = (arr_dt[0].split('/'));
	var tt = (arr_dt[0].split('/'));

	var d = parseInt(ss[0],10).toString();
	var m = parseInt(ss[1],10).toString();
	var y = parseInt(ss[2],10).toString();
	if (d.length<2) d = '0' + d;
    if (m.length < 2) m = '0' + m;	

	var hour = parseInt(tt[0],10).toString();
	var min = parseInt(tt[1],10).toString();
	var sec = parseInt(tt[2],10).toString();
	if (hour.length<2) hour = '0' + hour;
    if (min.length < 2) m = '0' + min;	
    if (sec.length < 2) m = '0' + sec;	

	return ([y, m, d].join('-')) + ' ' + ([hour, min, sec].join(':'));
}

function toAPIDateHourMinuteFormat(s){
	if (!s) return null;

	var arr_dt = (s.split(' '));
	var ss = (arr_dt[0].split('/'));
	var tt = (arr_dt[1].split(':'));

	var d = parseInt(ss[0],10).toString();
	var m = parseInt(ss[1],10).toString();
	var y = parseInt(ss[2],10).toString();
	if (d.length<2) d = '0' + d;
    if (m.length < 2) m = '0' + m;	

	var hour = parseInt(tt[0],10).toString();
	var min = parseInt(tt[1],10).toString();
	if (hour.length<2) hour = '0' + hour;
    if (min.length < 2) min = '0' + min;	

	return ([y, m, d].join('-')) + ' ' + ([hour, min].join(':'));
}

function toAPIDateHourMinuteFormat2(s){
	if (!s) return null;

	var arr_dt = (s.split(' '));
	var ss = (arr_dt[0].split('/'));
	var tt = (arr_dt[1].split(':'));
	console.log('ss')
	console.log(ss)
	var d = parseInt(ss[0]).toString();
	var m = parseInt(ss[1]).toString();
	var y = parseInt(ss[2]).toString();
	// if (d.length<2) d = '0' + d;
 //    if (m.length < 2) m = '0' + m;	

	var hour = parseInt(tt[0],10).toString();
	var min = parseInt(tt[1],10).toString();
	if (hour.length<2) hour = '0' + hour;
    if (min.length < 2) min = '0' + min;	

	return ([m, d, y].join('/')) + ' ' + ([hour, min].join(':'));
}

function toApIDateFormat2(s){
	if (!s) return null;

	var arr_dt = (s.split(' '));
	var ss = (arr_dt[0].split('/'));
	console.log('ss')
	console.log(ss)
	var d = parseInt(ss[0]).toString();
	var m = parseInt(ss[1]).toString();
	var y = parseInt(ss[2]).toString();
	// if (d.length<2) d = '0' + d;
 //    if (m.length < 2) m = '0' + m;	

	return ([m, d, y].join('/'));
}


function toAppDateFormat(p_date) {
	if (!p_date) {
		return '';
	} else {
		my_date = new Date(p_date);
	}
	
    day = '' + my_date.getDate();
	month = '' + (my_date.getMonth() + 1);
	year = my_date.getFullYear();
	
	if (day.length < 2) day = '0' + day;
    if (month.length < 2) month = '0' + month;	

	return [day, month, year].join('/');
}

function toAppDateTimeFormat(p_datetime){
	if (!p_datetime) {
		return '';
	} else {
		my_date = new Date(p_datetime);
	}
	
    var day = '' + my_date.getDate();
	var month = '' + (my_date.getMonth() + 1);
	var year = my_date.getFullYear();
	var hour = my_date.getHours();
	var min = my_date.getMinutes();
	
	if (day.length < 2) day = '0' + day;
    if (month.length < 2) month = '0' + month;	
    if (hour.length < 2) hour = '0' + hour;	
    if (min.length < 2) min = '0' + min;	

	return ([day, month, year].join('/'))+' '+[hour, min].join(':');

}

function toAppTimeFormat(p_datetime){
	if (!p_datetime) {
		return '';
	} else {
		my_date = new Date(p_datetime);
	}
	
    var day = '' + my_date.getDate();
	var month = '' + (my_date.getMonth() + 1);
	var year = my_date.getFullYear();
	var hour = my_date.getHours();
	var min = my_date.getMinutes();
	
	if (day.length < 2) day = '0' + day;
    if (month.length < 2) month = '0' + month;	
    if (hour.toString().length < 2) hour = '0' + hour;	
    if (min.toString().length < 2) min = '0' + min;	

	return [hour, min].join(':');

}


function appGridDateFormatter(val, row) {
	return toAppDateFormat(val);
}

function appGridDateTimeFormatter(val, row) {
	return toAppDateTimeFormat(val);
}

function appGridTimeFormatter(val, row) {
	return toAppTimeFormat(val);
}

function setDateNow()
{
	var now = new Date();

	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	return today;
}

function setDate(date)
{
	var now = new Date(date);

	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	return today;
}

function toTimeFromDateTimeFormat(date) {
	let dateTime = date;
	let parts = dateTime.split(/[- :]/);
	return `${parts[3]}:${parts[4]}`;
}

function notif(icon,isi){
      var text;
      if(icon=='warning'){
          text="Peringatan"
      }
      if(icon=='success'){
          text="Berhasil"
      }
      if(icon=='error'){
          text="Gagal"
      }
      if(icon=='info'){
          text="Informasi"
      }
      swal.fire(text,isi,icon)
}

function costatus()
{
	// body...
	return confirm('status',text='');
}

function cohapus()
{
	// body...
	return confirm('hapus',text='');
}

function corelease(text)
{
	// body...
	return confirm('release',text);
}

function cocustom(text)
{
	// body...
	return confirm('custom',text);
}

function confirm(argument,text)
{
	// body...
	let confirm_set;
	let type;
	let content;
	let btn_yes;
	let btn_no;

	if (argument=='status')
	{
		type="warning";
		content="Apakah anda yakin mengubah status ?";
		btn_yes="btn-primary";
		btn_no="btn-secondary";
	}
	if (argument=='hapus')
	{
		type="warning";
		content="Apakah anda yakin menghapus data ?";
		btn_yes="btn-danger";
		btn_no="btn-secondary";
	}
	if (argument=='release')
	{
		type="question";
		content=text;
		btn_yes="btn-primary";
		btn_no="btn-secondary";
	}
	if (argument=='custom')
	{
		type="warning";
		content=text;
		btn_yes="btn-primary";
		btn_no="btn-secondary";
	}
	confirm_set = {
      "title"            : "Konfirmasi",
      "text"             : content,
      "type"             : type,
      "showCancelButton" : true,
      "confirmButtonText": "Ya",
      "cancelButtonText" : "Tidak",
      "reverseButtons"   : false,
      "customClass"      : {
        "confirmButton": btn_yes,
        "cancelButton" : btn_no
      }
    }

	return confirm_set;
}

function cek_autor(){
  var password = $('#txt-passwordcek').val();
  if(password=="ide"){
    // alert('hehe')
    status(1,0);
  }
  else{
    notif('warning','Password Salah');
  }

}

function convertDateDBtoIndo(string) {
	bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
 
	tanggal = string.split("-")[2];
	bulan   = string.split("-")[1];
	tahun   = string.split("-")[0];
 
    return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
}

function convert_to_bulan(date)
{
	var months = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember" ];

	var selectedMonthName = months[date];

	return selectedMonthName;
}

function numberFormat(val, row) {
    if (val % 1 ==0) {
        return appGridNumberFormatter(val, row)
    }else{
        return val
    }
}

function unSelectDatagrid(datagrid)
{
	// body...
	let rows = $(datagrid).datagrid('getRows');
	// alert(rows.length);
	for (i=0;i<rows.length;i++)
	{
		$(datagrid).datagrid('unselectRow', i);
	}
}

function filterArray(array, string)
{
    return array.filter(o =>
        Object.keys(o).some(k => o[k].toLowerCase().includes(string.toLowerCase())));
}

function filterString(string,params)
{
	let stringlower = string.toLowerCase();
	return stringlower.match(params);
}

function cellStylerRed(value,row,index){
    if (value =="X"){
        return 'background-color:red;color:black;';
    }
}
function redirect_menu(param) {
	/*$('.redirect-link').click(function () {*/
      $('#form_menu').attr('action', base_url+"welcome/redirect_menu");
        var menu_id = $(param).data('menu_id');
        var page = $(param).data('menu_page');
        $('#menu_id').val(menu_id);
        $('#menu_page').val(page);
        if (page == '') {
          alert('Belum Ada Url');
          return false;
        }
        $('#form_menu').submit();
      // console.log($(this).data('menu_id'));
    /*})*/
}

// function show_hide_btn() {
// 	// console.log(menu_access);
// 	for (var i = 0; i < menu_access.length; i++) {
// 		// if (menu_access[i].action == 2 && menu_access[i].is_granted == false) {
// 		// 	$('#'+menu_access[i].func_object).attr("disabled", true);
// 		// }
// 		// if (menu_access[i].action == 1 && menu_access[i].is_granted == false) {
// 		// 	$('#'+menu_access[i].func_object).hide();//
// 		// 	$('#'+menu_access[i].func_object+'-s').attr("disabled", true);
// 		// 	$('#'+menu_access[i].func_object).attr("disabled", true);
// 		// }
// 		var elemen = '';
// 		if (menu_access[i].type == 'class') {
// 			elemen = '.';
// 		}else{
// 			elemen = '#';
// 		}

// 		if (menu_access[i].action == 1 && menu_access[i].is_granted == false) {
// 			$(elemen+menu_access[i].func_object).attr("disabled", true);
// 		}
// 		if (menu_access[i].action == 2 && menu_access[i].is_granted == false) {
// 			$(elemen+menu_access[i].func_object).hide();
// 		}

// 	}
// }

// function show_hide_btn() {
// 	console.log(menu_access);
// 	for (var i = 0; i < menu_access.length; i++) {
// 			if (menu_access[i].action == 2 && menu_access[i].is_granted == false) {
// 				$('#'+menu_access[i].func_object).attr("disabled", true);
// 			var elemen = '';
// 			if (menu_access[i].type == 'class') {
// 				elemen = '.';
// 			}else{
// 				elemen = '#';
// 			}

// 			if (menu_access[i].action == 1 && menu_access[i].is_granted == false) {
// 				$('#'+menu_access[i].func_object).hide();
// 				$(elemen+menu_access[i].func_object).attr("disabled", true);
// 			}
// 			if (menu_access[i].action == 2 && menu_access[i].is_granted == false) {
// 				$(elemen+menu_access[i].func_object).hide();
// 			}
// 		}
// 	}
// }

function show_hide_btn() {
	for (var i = 0; i < menu_access.length; i++) {
		
		console.log(menu_access[i].func_object + '=> ' + $('#'+menu_access[i].func_object).is("a"));
		if (menu_access[i].action == 1 && menu_access[i].is_granted == false) {
			if ($('#'+menu_access[i].func_object).is("a")) {
				$('#'+menu_access[i].func_object).hide();
			}else{
				$('#'+menu_access[i].func_object).attr("disabled", true);
			}
		}
		if (menu_access[i].action == 2 && menu_access[i].is_granted == false) {
			$('#'+menu_access[i].func_object).hide();
		}
	}
}

function gridExcel(id_datagrid,nama_file='export.xls') {
	if (id_datagrid) {
		if (typeof id_datagrid == 'string') {
			$(id_datagrid).datagrid('toExcel',nama_file);	
		}	
	}
}