<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search_component extends CI_Model {
	public function provinsi()
	{
		
		return $this->db->get('provinsi')->result_array();
	}

	public function kota($provId)
	{
		$result = "";
		$this->db->order_by('nama', 'asc');
		$this->db->where('id_prov', $provId);
		$kota = $this->db->get('kota');

		foreach ($kota->result_array() as $data){
			$result.= "<option value='$data[id_kota]'>$data[nama]</option>";
		}

		return $result;
	}
}

/* End of file m_search_component.php */
/* Location: ./application/models/m_search_component.php */