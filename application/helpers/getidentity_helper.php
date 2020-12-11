<?php
/**
 * Helpher untuk menampilkan identitas aplikasi
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardi Tri Heru (arditriheruh@gmail.com)
 * @link https://github.com/arditriheru
 */

if (!function_exists('getTopTitle')) {
	function getTopTitle(){
		$getTopTitle = "Rachmi Online";
		return $getTopTitle;
	}
}

if (!function_exists('getCopyright')) {
	function getCopyright(){
		$getCopyright = "IT RSKIA Rachmi";
		return $getCopyright;
	}
}

if (!function_exists('getVersion')) {
	function getVersion(){
		$getVersion = "v2.0";
		return $getVersion;
	}
}

if (!function_exists('getDeveloper')) {
	function getDeveloper(){
		$getDeveloper = "Developer : Ardi Tri Heru | Email : arditriheruh@gmail.com | IG : @arditriheru | Summary : Aplikasi ini dibuat menggunakan framework CodeIgniter 3.1, PHP 7.3, database MySQL | Copyright : Hak Cipta,
		Pasal 12 ayat (1) huruf l, tentang ciptaan yang dilindungi termasuk database dan hasil pengalih wujudan;
		Pasal 15 huruf g, tentang pembuatan salinan cadangan program komputer;
		Pasal 30 ayat (1), tentang masa berlakunya suatu hak cipta atas program komputer;
		Pasal 72 ayat (3), tentang sanksi pidana pelanggaran hak cipta program komputer;
		Pasal 72 ayat (3) “Barangsiapa dengan sengaja dan tanpa hak memperbanyak penggunaan untuk kepentingan komersial suatu Program Komputer dipidana dengan pidana penjara paling lama 5 (lima) tahun dan/atau denda paling banyak Rp 500.000.000,00 (lima ratus juta rupiah)";
		return $getDeveloper;
	}
}

?>