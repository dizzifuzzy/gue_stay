<?php
class Fungsi 
{

	public function upload($namaf, $sementara)
	{
		$msg = null;
		$dirUpload = "../style/gambar/";
		$terupload = move_uploaded_file($sementara, $dirUpload.$namaf);
		if ($terupload) {
    		$msg .= "success";
    			//echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
		} else {
    			$msg .= "fail";
		}
	return $msg;
	}
	public function uploadtf($namaf, $sementara)
	{
		$msg = null;
		$dirUpload = "style/buktitf/";
		$terupload = move_uploaded_file($sementara, $dirUpload.$namaf);
		if ($terupload) {
    		$msg .= "success";
    			//echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
		} else {
    			$msg .= "fail";
		}
	return $msg;
	}
	public function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
 

}