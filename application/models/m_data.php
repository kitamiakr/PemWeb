<?php

class M_data extends CI_Model{
	
	function jml_sklh()
    {
        $data = $this->db->query('SELECT jenjang, count(npsn) as jumlah from profil group by jenjang;')->result_array();
        return $data;
    }
    function jml_siswa()
    {
        $data = $this->db->query('select p.jenjang as jenjang, sum(s.jumlah_siswa) as jumlah_siswa, sum(s.rombel) as jml_rombel from profil as p join siswa as s on p.npsn=s.npsn GROUP by p.jenjang ')->result_array();
        return $data;
    }
    function jml_guru()
    {
        $data = $this->db->query('select p.jenjang as jenjang, count(g.npsn) as jumlah_guru from profil as p join data_guru as g on p.npsn=g.npsn GROUP by p.jenjang ')->result_array();
        return $data;
    }
    
    //
    //KABUPTEN
    function jml_siswakab()
    {
        $data = $this->db->query('SELECT k.id as id, k.kabupaten as kab, SUM(s.jumlah_putra+s.jumlah_putri) jumlah_siswa, SUM(s.jumlah_putra) as jumlah_putra, SUM(s.jumlah_putri) jumlah_putri FROM kabupaten as k JOIN profil as p ON k.id=p.kab JOIN siswa as s ON p.npsn=s.npsn GROUP BY p.kab ')->result_array();
        return $data;
    }
    //
    //Data siswa per-KECAMATAN
    function jml_siswakec($a)
    {
        $sql = "select k.kode_kab as id_kab, k.kode_kec as id_kec, k.nama_kec as kec, sum(s.jumlah_putra) as putra, sum(s.jumlah_putri) as putri, sum(s.jumlah_putra+s.jumlah_putri) as jumlah FROM kecamatan as k join profil as p on k.kode_kec=p.kec join siswa as s on p.npsn=s.npsn where k.kode_kab=$a group by p.kec";
        $data = $this->db->query($sql)->result_array();
        
        return $data;
    }
    //Data siswa Per-Sekolah
    function jml_siswanpsn($a)
    {
        $sql  ="SELECT p.kec as kec, p.npsn as npsn, p.nama_sekolah as nm_sklh, p.jenjang as jenjang, sum(s.jumlah_putri) as putri, sum(s.jumlah_putra) as putra, SUM(s.jumlah_putra+s.jumlah_putri) jumlah FROM profil as p JOIN siswa as s ON p.npsn=s.npsn where p.kec='$a' GROUP BY p.npsn";
        $data =  $this->db->query($sql)->result_array();
        return $data;
    }
    //
    
    //Jumlah Sekolah perJenjang (Kabupaten)
    function jml_sklh_jenjang($a,$b)
    {
        $sql    ="SELECT k.id as id, k.kabupaten as kab, COUNT(p.npsn) jml_sklh FROM kabupaten as k JOIN profil as p on k.id=p.kab WHERE p.jenjang='$a' or p.jenjang='$b' GROUP BY p.kab; ";
        $data =  $this->db->query($sql)->result_array();
        return $data; 
    }
    //Jumlah semua sekolah
    function jml_sklh_jenjang_semua()
    {
        $sql    ="SELECT k.id as id, k.kabupaten as kab, COUNT(p.npsn) jml_sklh FROM kabupaten as k JOIN profil as p on k.id=p.kab GROUP BY p.kab; ";
        $data =  $this->db->query($sql)->result_array();
        return $data; 
    }
    //AMBIL Kecamatan yang ada Sekolahnya
    function sekolahkec($a)
    {
        $sql="SELECT k.kode_kec as id, k.nama_kec as kec, count(p.npsn) jumlah FROM kecamatan as k join profil as p on k.kode_kec=p.kec where k.kode_kab='$a' group by p.kec";
        $data =  $this->db->query($sql)->result_array();
        return $data;
    }
    //Jumlah Sekolah perJenjang (Kecamatan)
    function  jml_sklh_jenjang_kec($a,$b)
    {
        $sql    ="SELECT k.kode_kec as id, k.nama_kec as kec, count(p.npsn) jumlah FROM kecamatan as k join profil as p on k.kode_kec=p.kec where p.jenjang='$a' or '$b' group by p.kec";
        $data =  $this->db->query($sql)->result_array();
        return $data;
    }
    //Data Sekolah npsn, jenjang, nama_sekolah, 
    function data_sekolah($a)
    {
        $sql="SELECT npsn, nama_sekolah as nm_sklh, jenjang  FROM `profil` WHERE kec='$a' GROUP by npsn";
        $data =  $this->db->query($sql)->result_array();
        return $data;
    }
    //Jumlah KMS Non-KMS PerKabupaten
    function kms_kab(){
        $sql="select k.id as id, k.kabupaten as kab, sum(s.kms) as kms, sum(s.non_kms) as non_kms from profil as p join kabupaten as k on p.kab=k.id join siswa as s on s.npsn=p.npsn group by p.kab";
        $data =  $this->db->query($sql)->result_array();
        return $data;
    }
}