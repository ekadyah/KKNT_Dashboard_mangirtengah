<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_umkm extends CI_Model
{
    private $table = 'umkm';
    private $pk = 'id';

    public function GetAll()
    {
        $this->db->order_by($this->pk, 'desc');
        return $this->db->get($this->table);
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit($user)
    {
        $this->db->where($this->pk, $user);
        return $this->db->get($this->table)->row_array();
    }

    public function update($user, $data)
    {
        $this->db->where($this->pk, $user);
        return $this->db->update($this->table, $data);
    }

    public function delete($data)
    {
        $this->db->where($data);
        return $this->db->delete($this->table);
    }

    public function search($data){
        $this->db->like($this->pk, $data);
        $this->db->or_like('nama_perusahaan', $data);
        $this->db->or_like('pemilik',$data);
        return $this->db->get($this->table);
    }
}