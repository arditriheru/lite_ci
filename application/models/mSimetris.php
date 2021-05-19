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

	function dataSwabDetail($where)
	{
		$this->db->select('booking_swab.*, mr_sex.nama_sex, jadwal_swab.hari, jadwal_swab.pukul');
		$this->db->from('booking_swab');
		$this->db->join('mr_sex','booking_swab.id_sex = mr_sex.id_sex');
		$this->db->join('jadwal_swab','booking_swab.id_jadwal_swab = jadwal_swab.id_jadwal_swab');
		$this->db->where($where);
		return $this->db->get();
	}

	function dataNoAntrian($id_booking,$id_dokter,$id_sesi,$booking_tanggal)
	{
	$query = $this->db->query("
		SELECT id_booking, nama, FIND_IN_SET( id_booking, (    
		SELECT GROUP_CONCAT( id_booking
		ORDER BY id_booking ASC ) 
		FROM booking 
		WHERE booking_tanggal = '$booking_tanggal'
		AND id_dokter = '$id_dokter'
		AND id_sesi = '$id_sesi')
		) AS noant
		FROM booking
		WHERE id_booking = '$id_booking'");
	return $query;
	}

}

?>