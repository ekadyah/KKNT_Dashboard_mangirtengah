<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
    private $table = 'penduduk';
    private $pk = 'nik';

    public function getAll()
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
}
