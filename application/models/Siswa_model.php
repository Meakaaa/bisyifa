<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model 
{
    private $_table = "siswa";

    public $nis;
    public $nama_siswa;
    public $jk;
    public $no_telp;
    public $alamat;

	public function rules()
	{
        return [
            [
                "field" => "nis",
                "label" => "NIS",
                "rules" => "required"
            ],
            [
                "field" => "nama_siswa",
                "label" => "Nama Siswa",
                "rules" => "required"
            ],
            [
                "field" => "jk",
                "label" => "Jenis Kelamin",
                "rules" => "required"
            ],
            [
                "field" => "no_telp",
                "label" => "Nomor Telpon",
                "rules" => "numeric"
            ],
            [
                "field" => "alamat",
                "label" => "Alamat",
                "rules" => "required"
            ]
            ];
	}

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getID($nis)
    {
        return $this->db->get_where($this->_table, ["nis" => $nis])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nis = $post["nis"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->jk = $post["jk"];
        $this->no_telp = $post["no_telp"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nis = $post["nis"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->jk = $post["jk"];
        $this->no_telp = $post["no_telp"];
        $this->alamat = $post["alamat"];
        return $this->db->update($this->_table, $this, array('nis' => $post["nis"]));
    }

    public function delete($nis)
    {
        return $this->db->delete($this->_table, array('nis' => $nis));
    }
}
