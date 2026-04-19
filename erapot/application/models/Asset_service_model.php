<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Asset_service_model extends CI_Model {
 
    var $table = 'asset_service';
    var $column_order = array('keterangan',null); //set column field database for datatable orderable
    var $column_search = array('keterangan'); //set column field database for datatable searchable
    var $order = array('id' => 'desc'); // default order 
	var $filter = 'id_m_asset'; // default filter
 
    public function __construct()
    {
        parent::__construct();
    }
 
    private function _get_datatables_query($id) {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
		
		if (isset($id)) {
			$filter = $this->filter;
			$this->db->where($filter, $id);
		}
    }
 
    function get_datatables($id) {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($id) {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
	
	public function getbyasset($id) {
		$where = array('id_m_asset'=>$id);
		$query = $this->db->where($where)->get($this->table);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get($id) {
		$query = $this->db->where('id', $id)->get($this->table, 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}