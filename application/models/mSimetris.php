<?php 

class mSimetris extends CI_Model
{

	public function getData($table)
	{
		return $this->db->get($table);
	}

	function cari($id){
		$query= $this->db->get_where('mr_pasien',array('id_catatan_medik'=>$id));
		return $query;
	}

	public function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

	public function updateData($table,$data,$where)
	{
		$this->db->update($table,$data,$where);
	}

	public function deleteData($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cekLogin()
	{
		$id_catatan_medik 	= set_value('id_catatan_medik');
		$tgl_lahir 			= set_value('tgl_lahir');

		$result = $this->db->where('id_catatan_medik',$id_catatan_medik)
		-> where('tgl_lahir',$tgl_lahir)
		-> limit('1')
		-> get('mr_pasien');

		if($result->num_rows()>0)
		{
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function hakAkses($username,$password,$id)
	{
		$result = $this->db->where('psdi_petugas.nama_user',$username)
		-> where('psdi_petugas.password',md5($password))
		-> where('psdi_riw_aplikasi.id_aplikasi',$id)
		-> limit('1')
		-> join('psdi_riw_aplikasi','psdi_petugas.id_petugas=psdi_riw_aplikasi.id_petugas')
		-> get('psdi_petugas');

		if($result->num_rows()>0)
		{
			return $result->row();
		}else{
			return FALSE;
		}
	}

	function countData($table,$where){
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function selectData($table,$column,$where){
		$this->db->select($column);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query;
	}

	function cariNamaPasienData($table,$keyword){
		$this->db->like($keyword);
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get($table);
		return $query;
	}

}

?>