<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index()
	{
		$this->load->model('Model_buku');
		$this->load->model('Model_penerbit');

		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

		$data['title'] = "Daftar Buku";

		$this->load->view('templates/header', $data);
		$this->load->view('daftarBuku', $data);
		$this->load->view('templates/modal');
		$this->load->view('templates/footer');
	}

	public function beranda ()
	{
		$data['title'] = "Beranda";
		$this->load->view('templates/header', $data);
		$this->load->view('beranda');
		$this->load->view('templates/footer');
	}

	public function daftarBuku()
	{
		//akan mengambil seluruh data dari tb_buku, lalu disimpan dalam array data_buku
		// $data['data_buku'] = $this->db->get('tb_buku')-> result_array();

		$this->load->model('Model_buku');
		$this->load->model('Model_penerbit');

		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

		$data['title'] = "Daftar Buku";

		$this->load->view('templates/header', $data);
		$this->load->view('daftarBuku', $data);
		$this->load->view('templates/modal');
		$this->load->view('templates/footer');
	}

	public function hapus_buku()
	{
		$kode = $this->uri->segment(3);
		$this->Model_buku->hapus_buku($kode);
		$this->session->set_flashdata('pesan',
			'<div class="alert alert-danger" role="alert">
				Data telah dihapus
		  	</div>');

		redirect('Book/daftarbuku');
	}

	public function simpan_buku()
	{
		$data = array(
			'judul_buku' => $this->input->post('judulbuku'),
			'tahun_terbit' => $this->input->post('tahunterbit'),
			'kode_penerbit' => $this->input->post('kodepenerbit')
		);
			$this->Model_buku->simpan_buku($data);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data berhasil tersimpan
		  	</div>');


			redirect('book/daftarbuku');
	}

	public function show_edit_buku()
	{
		$kode = $this->uri->segment(3);

		$this->load->model('Model_buku');
		$this->load->model('Model_penerbit');
		
		$data['data_buku'] = $this->Model_buku->get_buku_by_kode($kode)->row_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

		$data['title'] = "Daftar Buku";

		$this->load->view('templates/header', $data);
		$this->load->view('edit_buku');
		$this->load->view('templates/footer');
	}

	public function update_buku()
	{
			$data = array(
				'judul_buku' => $this->input->post('judulbuku'),
				'tahun_terbit' => $this->input->post('tahunterbit'),
				'kode_penerbit' => $this->input->post('kodepenerbit')
			);
			$kode = $this->input->post('kodebuku');
			$this->Model_buku->update_buku($data, $kode);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data telah diupdate
		  	</div>');
	
			redirect('book/daftarbuku');
	}

	//PENERBIT
	public function daftarPenerbit()
	{

		$this->load->model('Model_penerbit');

		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('daftarPenerbit', $data);
		$this->load->view('templates/modal-penerbit');
		$this->load->view('templates/footer');
	}

	public function hapus_penerbit()
    {
        $kode = $this->uri->segment(3);
        $this->Model_penerbit->hapus_penerbit($kode);
        // $this->session->set_flashdata('pesan','<div class="alert alert-secondary" role="alert"> Data Berhasil Dihapus </div>');

        redirect('book/daftarpenerbit');
    }

	public function simpan_penerbit()
	{
		$data = array(
			'nama_penerbit' => $this->input->post('namapenerbit'),
			'alamat_penerbit' => $this->input->post('alamatpenerbit')
		);
			$this->Model_penerbit->simpan_penerbit($data);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data berhasil tersimpan
		  	</div>');

			redirect('book/daftarpenerbit');
	}

	public function show_edit_penerbit()
	{
		$kode = $this->uri->segment(3);

		$this->load->model('Model_penerbit');
		
		$data['data_penerbit'] = $this->Model_penerbit->get_penerbit_by_kode($kode)->row_array();

		$data['title'] = "Daftar Penerbit";

		$this->load->view('templates/header', $data);
		$this->load->view('edit_penerbit');
		$this->load->view('templates/footer');

	}

	public function update_penerbit()
	{
			$data = array(
				'nama_penerbit' => $this->input->post('namapenerbit'),
				'alamat_penerbit' => $this->input->post('alamatpenerbit')
			);
			$kode = $this->input->post('kodepenerbit');
			$this->Model_penerbit->update_penerbit($data, $kode);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data telah diupdate
		  	</div>');
	
			redirect('book/daftarpenerbit');
	}
}