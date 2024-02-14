<?php
defined('BASEPATH') or exit('No direct script access allowed')
;
class Umkm extends CI_Controller
{

    private $view = "admin/v_umkm/";
    private $redirect = "Umkm";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_umkm');
    }

    function index()
    {
        /*if ($this->input->get('search')) {
            $req = $this->M_umkm->search($this->input->get('search'));
        } else {
             
            //$req = $this->M_umkm->get_all();
        }
        */
        $read = $this->M_umkm->GetAll();
        $data = array(
            'read' => $read,
            'judul' => "UMKM",
            'sub' => "Halaman UMKM",
            //'read' => $req

        );
        $this->template->load('template/template', $this->view . 'read', $data);

    }

    public function create()
    {
        $data = array(
            'create' => ''
        );
        $this->load->view($this->view . 'create', $data);
    }

    public function save()
    {

        //foto
        $name_foto = $_FILES['foto_umkm']['name'];
        $type_foto = $_FILES['foto_umkm']['type'];
        $tmp_foto = $_FILES['foto_umkm']['tmp_name'];
        //upload foto
        if (!empty($tmp_foto)) {
            if (
                $type_foto != "image/jpeg" and
                $type_foto != "image/jpg" and
                $type_foto != "image/png"
            ) {
                echo "<script>alert('Format yang digunakan .jpeg | .jpg | .png')";
                redirect($this->redirect->refresh);
            } else {
                $foto_umkm = UploadImg($_FILES['foto_umkm'], './assets/foto_umkm/', 'foto', 500);

                $data = array(
                    'id' => $this->input->post('id'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'pemilik' => $this->input->post('pemilik'),
                    'alamat' => $this->input->post('alamat'),
                    //'foto' => $this->input->post('foto'),
                    'foto' => $foto_umkm,
                    'keterangan' => $this->input->post('keterangan')
                );
                $this->M_umkm->save($data);
                redirect($this->redirect, 'refresh');
            }
        }
    }

    /*private function upload_foto()
    {
        $config['upload_path'] = './assets/foto_umkm/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = uniqid() . '_' . $_FILES['foto']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo $this->upload->display_errors();
            die();
        } else {
            return $this->upload->data('file_name');
        }
    }
    */


    public function edit()
    {
        $user = $this->uri->segment(3);
        $data = array(
            'edit' => $this->M_umkm->edit($user)
        );
        $this->load->view($this->view . 'edit', $data);
    }

    public function update()
    {
        $user = $this->uri->segment(3);

        //foto
        $name_foto = $_FILES['foto_umkm']['name'];
        $type_foto = $_FILES['foto_umkm']['type'];
        $tmp_foto = $_FILES['foto_umkm']['tmp_name'];
        //upload foto
        if (!empty($tmp_foto)) {
            if (
                $type_foto != "image/jpeg" and
                $type_foto != "image/jpg" and
                $type_foto != "image/png"
            ) {
                echo "<script>alert('Format yang digunakan .jpeg | .jpg | .png')";
                redirect($this->redirect->refresh);
            } else {
                $foto_umkm = UploadImg($_FILES['foto_umkm'], './assets/foto_umkm/', 'umkm', 500);



                $data = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'pemilik' => $this->input->post('pemilik'),
                    'alamat' => $this->input->post('alamat'),
                    // 'foto' => $this->input->post('foto'),
                    'foto' => $foto_umkm,
                    'keterangan' => $this->input->post('keterangan')
                );
                $this->M_umkm->update($user, $data);
                redirect($this->redirect, 'refresh');
            }
        }
    }

    public function delete()
    {
        $user = $this->uri->segment(3);
        $data = array(
            'nama_perusahaan' => $user
        );
        $this->M_umkm->delete($data);
        redirect($this->redirect, 'refresh');
    }

}