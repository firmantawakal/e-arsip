<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suratMasuk extends CI_Model {

	public $table = 'suratmasuk';
    public $id = 'id_suratmasuk';
    public $order = 'DESC';

	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
	}

    function get_disposisi_id($id)
    {
        $this->db->where('id_disposisi', $id);
        return $this->db->get('disposisi')->row();
	}
	
	function get_all()
    {
        $this->db->order_by('id_suratmasuk', 'DESC');
        $this->db->join('jenis', 'jenis.id_jenis = suratmasuk.id_jenis');
        return $this->db->get($this->table)->result();
	}

	function get_all_bagian($id)
    {
        $this->db->where('id_bagian', $id);
        $this->db->order_by('suratmasuk.id_suratmasuk', 'DESC');
        $this->db->join('suratmasuk', 'disposisi.id_suratmasuk = suratmasuk.id_suratmasuk');
        $this->db->join('jenis', 'jenis.id_jenis = suratmasuk.id_jenis');
        return $this->db->get('disposisi')->result();
	}
	
	// insert data
    function insert($data)
    {
        $this->db->insert('suratmasuk', $data);
    }

    // insert data
    function insert_disposisi($data)
    {
        $this->db->insert('disposisi', $data);
    }

    // update data
    function update_disposisi($id, $data)
    {
        $this->db->where('id_disposisi', $id);
        $this->db->update('disposisi', $data);
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
