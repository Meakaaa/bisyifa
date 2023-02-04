<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
  private $_table = "supplier";

  public $id_supplier;
  public $id_barang;
  public $jumlah;

  public function rules()
  {
    return [
      [
        "field" => "id_barang",
        "label" => "ID Barang",
        "rules" => "required"
      ],
      [
        "field" => "jumlah",
        "label" => "Jumlah",
        "rules" => "numeric"
      ]
    ];
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getID($id_supplier)
  {
    return $this->db->get_where($this->_table, ["id_supplier" => $id_supplier])->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->id_barang = $post["id_barang"];
    $this->jumlah = $post["jumlah"];
    return $this->db->insert($this->_table, $this);
  }

  public function update()
  {
    $post = $this->input->post();
    $this->id_supplier= $post["id_supplier"];
    $this->id_barang = $post["id_barang"];
    $this->jumlah = $post["jumlah"];
    return $this->db->update($this->_table, $this, array('id_supplier' => $post["id_suppler"]));
  }

  public function delete($id_barang)
  {
    return $this->db->delete($this->_table, array('id_barang' => $id_barang));
  }
}
