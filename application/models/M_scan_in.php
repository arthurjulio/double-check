<?php
class M_scan_in extends CI_Model
{
    function insert_label($jai_label, $assy_code_label, $ctn_no1, $ctn_no2, $jai_qr, $assy_code_qr, $ctn_no_qr, $status)
    {
        $query = "INSERT INTO `scan_in`( `jai_label`, `assy_code_label`, `ctn_no1`, `ctn_no2`, `jai_qr`, `assy_code_qr`, `ctn_no_qr`, `status`) 
		VALUES ('$jai_label','$assy_code_label','$ctn_no1','$ctn_no2','$jai_qr','$assy_code_qr','$ctn_no_qr','$status')";
        $this->db->query($query);
    }
}