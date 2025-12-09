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
		$image = null;
		$manual = null;
		$error = array();

		$configImg['upload_path']   = './uploads/images/';
		$configImg['allowed_types'] = 'jpg|png|jpeg';
		$configImg['max_size']      = 2048; // Max 2MB
		$configImg['encrypt_name']  = TRUE;

		$this->load->library('upload', $configImg);

		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data('file_name');
			} else {
				// Gagal Upload Gambar: Simpan pesan error
				$error['image'] = $this->upload->display_errors('', '');
			}
		} else {
			// Opsional: Jika gambar wajib diisi, Anda bisa menambahkan error di sini.
			// $error['image'] = 'Gambar produk wajib diisi.';
		}

		$configPdf['upload_path']   = './uploads/manuals/';
		$configPdf['allowed_types'] = 'pdf';
		$configPdf['max_size']      = 4096; // Max 4MB
		$configPdf['encrypt_name']  = TRUE;

		$this->upload->initialize($configPdf);

		if (!empty($_FILES['manual']['name'])) {
			if ($this->upload->do_upload('manual')) {
				$manual = $this->upload->data('file_name');
			} else {
				$error['manual'] = $this->upload->display_errors('', '');
			}
		} else {
			// Opsional: Jika manual wajib diisi, Anda bisa menambahkan error di sini.
		}

		if (!empty($error)) {

			$errorMessage = 'Gagal menyimpan data karena masalah upload:<br>';
			if (isset($error['image'])) {
				$errorMessage .= 'Gambar Produk: ' . $error['image'] . '<br>';
			}
			if (isset($error['manual'])) {
				$errorMessage .= 'Buku Panduan: ' . $error['manual'] . '<br>';
			}

			$this->session->set_flashdata('error', $errorMessage);
			redirect('equipment');
			return;
		}

		$data = [
			'name'      => $this->input->post('name'),
			'category'  => $this->input->post('category'),
			'specs'     => $this->input->post('specs'),
			'stock'     => $this->input->post('stock'),
			'location'  => $this->input->post('location'),
			'image'     => $image,
			'manual'    => $manual
		];

		$this->Equipment_model->insert($data);
		$this->session->set_flashdata('success', 'Data produk baru berhasil ditambahkan!');

		redirect('equipment');
	}

	public function update()
	{
		$id = $this->input->post('id');

		if (!$id || !is_numeric($id)) {
			$this->session->set_flashdata('error', 'ID tidak valid!');
			redirect('equipment');
			return;
		}

		$item = $this->Equipment_model->getById($id);

		if (!$item) {
			$this->session->set_flashdata('error', 'Produk tidak ditemukan!');
			redirect('equipment');
			return;
		}

		$error = [];
		$newImage = $item->image;
		$newManual = $item->manual;

		if (!empty($_FILES['image']['name'])) {
			$configImg['upload_path'] = './uploads/images/';
			$configImg['allowed_types'] = 'jpg|png|jpeg';
			$configImg['max_size'] = 2048;
			$configImg['encrypt_name'] = TRUE;

			$this->load->library('upload', $configImg);

			if ($this->upload->do_upload('image')) {
				$newImage = $this->upload->data('file_name');
			} else {
				$error['image'] = $this->upload->display_errors('', '');
			}
		}

		if (!empty($_FILES['manual']['name'])) {
			$configPdf['upload_path'] = './uploads/manuals/';
			$configPdf['allowed_types'] = 'pdf';
			$configPdf['max_size'] = 4096;
			$configPdf['encrypt_name'] = TRUE;

			$this->upload->initialize($configPdf);

			if ($this->upload->do_upload('manual')) {
				$newManual = $this->upload->data('file_name');
			} else {
				$error['manual'] = $this->upload->display_errors('', '');
			}
		}

		if (!empty($error)) {
			$msg = "Gagal memperbarui data:<br>";
			if (isset($error['image'])) $msg .= "Gambar: " . $error['image'] . "<br>";
			if (isset($error['manual'])) $msg .= "Manual PDF: " . $error['manual'] . "<br>";

			$this->session->set_flashdata('error', $msg);
			redirect('equipment');
			return;
		}

		if (!empty($_FILES['image']['name']) && $item->image && file_exists("./uploads/images/" . $item->image)) {
			unlink("./uploads/images/" . $item->image);
		}

		if (!empty($_FILES['manual']['name']) && $item->manual && file_exists("./uploads/manuals/" . $item->manual)) {
			unlink("./uploads/manuals/" . $item->manual);
		}

		$data = [
			'name'      => $this->input->post('name'),
			'category'  => $this->input->post('category'),
			'stock'      => $this->input->post('stok'),
			'location'  => $this->input->post('location'),
			'specs'     => $this->input->post('specs'),
			'image'     => $newImage,
			'manual'    => $newManual
		];

		$this->Equipment_model->update($id, $data);

		$this->session->set_flashdata('success', 'Data berhasil diperbarui!');
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
