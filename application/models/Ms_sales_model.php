<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ms_sales_model extends CI_Model
{

    public $table = 'purchaseorder';
    public $id = 'po_number';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
function getField(){
    return $this->db->list_fields($this->table);
}
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('region_code', $q);
	$this->db->or_like('region_id', $q);
	$this->db->or_like('region_name', $q);
	$this->db->or_like('input_datetime', $q);
	$this->db->or_like('input_username', $q);
	$this->db->or_like('active', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('region_code', $q);
	$this->db->or_like('region_id', $q);
	$this->db->or_like('region_name', $q);
	$this->db->or_like('input_datetime', $q);
	$this->db->or_like('input_username', $q);
	$this->db->or_like('active', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file Ms_region_model.php */
/* Location: ./application/models/Ms_region_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-10 02:06:18 */
/* http://harviacode.com */