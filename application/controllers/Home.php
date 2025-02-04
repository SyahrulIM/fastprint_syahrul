<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array();
		$title = 'Home';

        // Start Kategori query
        $this->db->select();
        $kategori = $this->db->get('kategori');
		// end

        // Start Status query
        $this->db->select();
        $status = $this->db->get('status');
		// end

        $product = $this->get();

        $data = array(
            'title' => $title,
            'kategori' => $kategori,
            'status' => $status,
            'product' => $product,
        );

		$this->load->view('home/v_home',$data);
	}

	public function get()
    {
        // Start Produk query
        $this->db->select();
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');
        $this->db->where('status.nama_status', 'bisa dijual');
        $product = $this->db->get('produk');
		// end

        return $product;
    }

	public function add()
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$kategori_id = $this->input->post('kategori_id');
		$status_id = $this->input->post('status_id');
	
		$data_product = array(
			'nama_produk' => $nama_produk,
			'harga' => $harga,
			'kategori_id' => $kategori_id,
			'status_id' => $status_id,
		);

		$this->db->insert('produk', $data_product);

		redirect('home');
	}		

	public function get_edit($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id);
		$query = $this->db->get();
	
		$product = $query->row();
		echo json_encode($product); // Return product data as JSON
	}

	public function update($id)
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$kategori_id = $this->input->post('kategori_id');
		$status_id = $this->input->post('status_id');

		$data_product = array(
			'nama_produk' => $nama_produk,
			'harga' => $harga,
			'kategori_id' => $kategori_id,
			'status_id' => $status_id,
		);

		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data_product);

		redirect('home');
	}

	public function delete($id)
    {
		$data_product = array(
			'id_produk' => $id
		);

		$this->db->delete('produk', $data_product);

		redirect('home');
    }
}