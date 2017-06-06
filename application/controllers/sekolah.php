<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	public function index()
	{
		
		$this->load->view('header');
		$data['dat']= $this->m_data->jml_sklh();
            $data['sis']= $this->m_data->jml_siswa();
            $data['gur']= $this->m_data->jml_guru();
            //Tabel ke-dua
            $data['kab_sklh']= $this->m_data->jml_siswakab();
            //Tabel Ke-tiga
            $data['dasar']= $this->m_data->jml_sklh_jenjang('SD','MI');
            $data['menengah']= $this->m_data->jml_sklh_jenjang('SMP','MTS');
            $data['atas']= $this->m_data->jml_sklh_jenjang('SMA','MA');
            $data['kejuruan']= $this->m_data->jml_sklh_jenjang('SMK','');
            $data['spesial']= $this->m_data->jml_sklh_jenjang('SLB','');
            $data['jumlah']= $this->m_data->jml_sklh_jenjang_semua();
            //Tabel Ke-empat

            $data['kms']= $this->m_data->kms_kab();
		$this->load->view('page/datasiswa',$data);
		$this->load->view('footer');
	}

 function siswa_kab($a)
        {
            $this->load->view('header');
            $data['kec_sklh']= $this->m_data->jml_siswakec($a);
            $this->load->view('page/siswakabupaten',$data);
            $this->load->view('footer');
        }
        
        function skl_siswa($a)
        {
            $this->load->view('header');
            $data['kec_sklh']= $this->m_data->jml_siswanpsn($a);
            $this->load->view('page/siswakab',$data);
            $this->load->view('footer');
        }
        
        function sekolah_kab($a)
        {
            $this->load->view('header');
            $data['awal']=$this->m_data->sekolahkec($a);
            $data['dasar']= $this->m_data->jml_sklh_jenjang_kec('SD','MI');
            $data['menengah']= $this->m_data->jml_sklh_jenjang_kec('SMP','MTS');
            $data['atas']= $this->m_data->jml_sklh_jenjang_kec('SMA','MA');
            $data['kejuruan']= $this->m_data->jml_sklh_jenjang_kec('SMK','');
            $data['spesial']= $this->m_data->jml_sklh_jenjang_kec('SLB','');
            $this->load->view('page/sekolahkabupaten',$data);
            $this->load->view('footer');
        }
        function skl_sekolah($a)
        {
            $this->load->view('header');
            $data['sekolah']=$this->m_data->data_sekolah($a);
            $this->load->view('page/sekolahnpsn',$data);
            $this->load->view('footer');
        }
        function siswa_kms_kab($a)
        {
            
        }

}