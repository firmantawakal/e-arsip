<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suratKeluar extends CI_Model {

	public $table = 'suratkeluar';
    public $id = 'id_suratkeluar';
    public $order = 'DESC';

	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
	}
	
	function get_all($d1,$d2)
    {
        $this->db->order_by('id_suratkeluar', 'DESC');
        $this->db->join('bagian', 'bagian.id_bagian = suratkeluar.id_bagian');
        $this->db->join('jenis', 'jenis.id_jenis = suratkeluar.id_jenis');
        $this->db->where('DATE(tgl_suratkeluar) >=', $d1);
        $this->db->where('DATE(tgl_suratkeluar) <=', $d2);
        return $this->db->get($this->table)->result();
	}

    function get_all_bagian($id,$d1,$d2)
    {
        $this->db->where('suratkeluar.id_bagian', $id);
        $this->db->order_by('suratkeluar.id_suratkeluar', 'DESC');
        $this->db->join('jenis', 'jenis.id_jenis = suratkeluar.id_jenis');
        $this->db->join('bagian', 'bagian.id_bagian = suratkeluar.id_bagian');
        $this->db->where('DATE(tgl_suratkeluar) >=', $d1);
        $this->db->where('DATE(tgl_suratkeluar) <=', $d2);
        return $this->db->get('suratkeluar')->result();
	}
	
	// insert data
    function insert($data)
    {
        $this->db->insert('suratkeluar', $data);
    }
	
	// update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
