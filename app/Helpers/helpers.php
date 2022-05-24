<?php
function convert_to_rupiah($angka)
{
    $angka = ceil($angka);
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}

function convert_to_number($rupiah)
{
    return intval(preg_replace('/[^0-9]/', '', $rupiah));
}

function to_number($angka)
{
    $ex = explode('.', $angka);
    $digit = count($ex) > 1 ? strlen($ex[1]) : 0;
    return number_format($angka, $digit, ',', '.');
}
