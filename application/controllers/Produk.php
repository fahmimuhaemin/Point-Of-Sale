<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
       
        }
        
    public function index()
    {
        $data['produks'] = $this->Produk_model->get_produk();
        $this->load->view('produk/list',$data);
    	$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
    }

	public function tambah()
	{
        $data['produks'] = $this->Produk_model->get_produk();
        $this->load->view('produk/tambah',$data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
    public function submit() {
        // Load form validation library
        $this->load->library('form_validation');
    
        // Set validation rules
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('modal', 'Modal', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            // Reload the form with validation errors
            $this->load->view('produk/tambah');
        } else {
            // Prepare data for insertion
            $data = [
                'nama' => $this->input->post('nama'),
                'kategori' => $this->input->post('kategori'),
                'modal' => $this->input->post('modal'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            // Handle image upload
            if (!empty($_FILES['pic']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['pic']['name'];
                
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('pic')) {
                    $uploadData = $this->upload->data();
                    $data['gambar'] = $uploadData['file_name'];
                } else {
                    $data['gambar'] = 'default.png'; // default image if upload fails
                    redirect('home');
                }
            }


        }
    }
}