<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tiket extends CI_Model {

	public $table = 'tiket';
    public $id = 'id_tiket';
    public $order = 'DESC';

	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->order_by('id_tiket', 'ASC');
        return $this->db->get($this->table)->row();
	}
	
	function get_all($comp)
    {
        $this->db->order_by('id_tiket', 'ASC');
        $this->db->join('kategori', 'tiket.id_kategori = kategori.id_kategori');
        $this->db->where('tiket.id_company', $comp);
        return $this->db->get($this->table)->result();
	}
	
	function get_all_ksr($comp,$jns)
    {
        $this->db->order_by('id_tiket', 'ASC');
        $this->db->join('kategori', 'tiket.id_kategori = kategori.id_kategori');
        $this->db->where('tiket.id_company', $comp);
        $this->db->where('tiket.jenis', $jns);
        return $this->db->get($this->table)->result();
	}
	
	// insert data
    function insert($data)
    {
        $this->db->insert('tiket', $data);
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
