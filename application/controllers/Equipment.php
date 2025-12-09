<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Equipment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Equipment_model');
		// $this->load->helper(['form', 'url']);
	}

	public function index()
	{
		$products['equipment'] = $this->Equipment_model->getAll();

		$this->load->view('home', $products);
	}

	public function add()
	{
		$this->load->view('equipment/form_add');
	}

	public function store()
	{
		// --- 1. Upload Gambar Produk (image) ---
		// Konfigurasi untuk Gambar
		$configImg['upload_path']   = './uploads/images/';
		$configImg['allowed_types'] = 'jpg|png|jpeg';
		$configImg['max_size']      = 2048; // Max 2MB
		$configImg['encrypt_name']  = TRUE; // Tambahan: Enkripsi nama file agar unik

		$this->load->library('upload', $configImg);

		$image = null;
		if ($this->upload->do_upload('image')) {
			$image = $this->upload->data('file_name');
		} else {
			// Opsional: Handle error upload gambar (misalnya log error)
			// echo $this->upload->display_errors(); exit; 
		}

		// --- 2. Upload Buku Panduan (manual) ---
		// Konfigurasi untuk PDF Manual
		$configPdf['upload_path']   = './uploads/manuals/';
		$configPdf['allowed_types'] = 'pdf';
		$configPdf['max_size']      = 4096; // Max 4MB
		$configPdf['encrypt_name']  = TRUE; // Tambahan: Enkripsi nama file agar unik

		// Penting: Inisialisasi ulang library 'upload' dengan konfigurasi baru
		$this->upload->initialize($configPdf);

		$manual = null;
		if ($this->upload->do_upload('manual')) {
			$manual = $this->upload->data('file_name');
		} else {
			// Opsional: Handle error upload manual
			// Jika manual tidak wajib, Anda bisa mengabaikan error
		}

		// --- 3. Insert Data ke Database ---
		$data = [
			'name'      => $this->input->post('name'),
			'category'  => $this->input->post('category'),
			'specs'     => $this->input->post('specs'),
			'stock'     => $this->input->post('stock'),   // SESUAIKAN: Mengambil dari input name="stock"
			'location'  => $this->input->post('location'),
			'image'     => $image, // Nama file gambar atau null
			'manual'    => $manual  // Nama file manual atau null
		];

		$this->Equipment_model->insert($data);

		// Opsional: Set flashdata untuk notifikasi sukses
		// $this->session->set_flashdata('success', 'Data produk berhasil ditambahkan!');

		redirect('equipment');
	}

	public function edit($id)
	{
		$data['equipment'] = $this->Equipment_model->getById($id);
		$this->load->view('equipment/form_edit', $data);
	}

	public function update($id)
	{
		$item = $this->Equipment_model->getById($id);

		// Upload Gambar Baru
		$configImg['upload_path'] = './uploads/images/';
		$configImg['allowed_types'] = 'jpg|png|jpeg';
		$this->load->library('upload', $configImg);

		$image = $item->image;
		if ($this->upload->do_upload('image')) {
			if ($item->image && file_exists('./uploads/images/' . $item->image)) {
				unlink('./uploads/images/' . $item->image);
			}
			$image = $this->upload->data('file_name');
		}

		// Upload Manual Baru
		$configPdf['upload_path'] = './uploads/manuals/';
		$configPdf['allowed_types'] = 'pdf';
		$this->upload->initialize($configPdf);

		$manual = $item->manual;
		if ($this->upload->do_upload('manual')) {
			if ($item->manual && file_exists('./uploads/manuals/' . $item->manual)) {
				unlink('./uploads/manuals/' . $item->manual);
			}
			$manual = $this->upload->data('file_name');
		}

		// Update Data
		$data = [
			'name'      => $this->input->post('name'),
			'category'  => $this->input->post('category'),
			'specs'     => $this->input->post('specs'),
			'image'     => $image,
			'manual'    => $manual,
			'stock'     => $this->input->post('stock'),
			'location'  => $this->input->post('location')
		];

		$this->Equipment_model->update($id, $data);
		redirect('equipment');
	}

	public function delete($id)
	{
		$item = $this->Equipment_model->getById($id);

		if ($item->image && file_exists('./uploads/images/' . $item->image))
			unlink('./uploads/images/' . $item->image);

		if ($item->manual && file_exists('./uploads/manuals/' . $item->manual))
			unlink('./uploads/manuals/' . $item->manual);

		$this->Equipment_model->delete($id);
		redirect('equipment');
	}
}
