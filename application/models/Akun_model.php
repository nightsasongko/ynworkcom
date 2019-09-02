<?php
class Akun_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function cekloginmemeber($email,$password)
    {
        $vtmd5 = md5($password);
        $sql = "select count(id_member) as jml from member where email='$email' and password='$vtmd5' and status=2";
        $res = $this->db->query($sql);
        $row = $res->row_array();
        $jml = $row['jml'];
        if ($jml >0 ) {
            return true;
        } else {
            return false;
        }
        
    }
}