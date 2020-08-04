<?php

function helper_dd($data)
{
    if ($data == null) {
        echo 'null atau array kosong' ;
    } else {
        echo '<pre>';
        print_r($data);
    }
    die();
}

function convert_date_to_indonesia($date)
{
    $tanggal = date('j', strtotime($date));
    $nomor_bulan = date('n', strtotime($date));
    $tahun = date('Y', strtotime($date));

    switch ($nomor_bulan) {
        case 1:
            $bulan = 'Januari';
            break;
        case 2:
            $bulan = 'Februari';
            break;
        case 3:
            $bulan = 'Maret';
            break;
        case 4:
            $bulan = 'April';
            break;
        case 5:
            $bulan = 'Mei';
            break;
        case 6:
            $bulan = 'Juni';
            break;
        case 7:
            $bulan = 'Juli';
            break;
        case 8:
            $bulan = 'Agustus';
            break;
        case 9:
            $bulan = 'September';
            break;
        case 10:
            $bulan = 'Oktober';
            break;
        case 11:
            $bulan = 'November';
            break;
        case 12:
            $bulan = 'Desember';
            break;
    }

    return $tanggal.' '.$bulan.' '.$tahun;
}

function convert_date_period($date)
{
    // $tanggal = date('j', strtotime($date));
    $nomor_bulan = date('n', strtotime($date));
    $tahun = date('Y', strtotime($date));

    switch ($nomor_bulan) {
        case 1:
            $bulan = 'Januari';
            break;
        case 2:
            $bulan = 'Februari';
            break;
        case 3:
            $bulan = 'Maret';
            break;
        case 4:
            $bulan = 'April';
            break;
        case 5:
            $bulan = 'Mei';
            break;
        case 6:
            $bulan = 'Juni';
            break;
        case 7:
            $bulan = 'Juli';
            break;
        case 8:
            $bulan = 'Agustus';
            break;
        case 9:
            $bulan = 'September';
            break;
        case 10:
            $bulan = 'Oktober';
            break;
        case 11:
            $bulan = 'November';
            break;
        case 12:
            $bulan = 'Desember';
            break;
    }

    return $bulan.'-'.$tahun;
}

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Bangkok');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('d\-m\-Y\ H:i:s');
}

function convert_datetime_to_indonesia($date)
{
    $tanggal = date('j', strtotime($date));
    $nomor_bulan = date('n', strtotime($date));
    $tahun = date('Y', strtotime($date));
    $pukul = date('H:i:s', strtotime($date));
    // $date = DateTime::createFromFormat('d-m-Y H:i:s',$date)->format('Y-m-d H:i:s');

    switch ($nomor_bulan) {
        case 1:
            $bulan = 'Januari';
            break;
        case 2:
            $bulan = 'Februari';
            break;
        case 3:
            $bulan = 'Maret';
            break;
        case 4:
            $bulan = 'April';
            break;
        case 5:
            $bulan = 'Mei';
            break;
        case 6:
            $bulan = 'Juni';
            break;
        case 7:
            $bulan = 'Juli';
            break;
        case 8:
            $bulan = '08';
            break;
        case 9:
            $bulan = 'September';
            break;
        case 10:
            $bulan = 'Oktober';
            break;
        case 11:
            $bulan = 'November';
            break;
        case 12:
            $bulan = 'Desember';
            break;
    }

    return $tanggal.' '.$bulan.' '.$tahun.' '.$pukul.' WIB';
}

function convert_number_to_rupiah($value, $decimal = 3)
{
    if ((float)$value == 0) {
        return '0';
    } elseif ((float)$value < 0) {
        // return '(Rp. '.number_format($value, 2, ',', '.').')';
        return '('.number_format($value*(-1), 0, ',', '.').')';
    } else {
        // return 'Rp. '.number_format($value, 2, ',', '.');
        return number_format($value, $decimal, ',', '.');
    }
}

function convert_number_to_rupiah_dua($value, $decimal = 2)
{
    if ((float)$value == 0) {
        return '0';
    } elseif ((float)$value < 0) {
        // return '(Rp. '.number_format($value, 2, ',', '.').')';
        return '('.number_format($value*(-1), 0, ',', '.').')';
    } else {
        // return 'Rp. '.number_format($value, 2, ',', '.');
        return number_format($value, $decimal, ',', '.');
    }
}

function convert_to_date($date)
{
    $d = explode('/', $date);

    return $d[2].'-'.$d[1].'-'.$d[0];
}

function convert_to_indonesia_date($date)
{
    return date('d/m/Y', strtotime($date));
}
function convert_to_indonesia_dateInd($date)
{
    return date('m/d/Y', strtotime($date));
}

function convert_to_indonesia_datetime($date)
{
    return date('d/m/Y H:i', strtotime($date));
}

function cek_email_valid($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function generate_failed_response($failed_response, $data = [])
{
    $response = [
        'code' => $failed_response['code'],
        'message' => $failed_response['message'],
        'data' => $data
    ];

    echo json_encode($response);
    die();
}

function generate_success_response($message, $data = [])
{
    $response = [
        'code' => SUKSES,
        'message' => $message,
        'data' => $data
    ];

    echo json_encode($response);
    die();
}
