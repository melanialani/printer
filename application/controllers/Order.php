<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index() {
		$this->add();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Daftar Pembelian';
			$data['page_note'] = 'Daftar seluruh transaksi yang telah dilakukan user';

			$data['row'] = $this->MOrder->getHistoryBeli();

			$this->load->view('header', $data);
			$this->load->view('historybeli_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function detail($id=null) {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Detail Pembelian';
			$data['page_note'] = 'Rincian transaksi pembelian';

			$trans = $this->MOrder->getOneHeader($id);
			$data['trans'] = $trans[0];
			$data['row'] = $this->MOrder->getDetailBeli($id);

			$this->load->view('header', $data);
			$this->load->view('historybeli_detail', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function lstcetak() {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Daftar Order Cetakan';
			$data['page_note'] = 'Daftar seluruh order cetakan yang pernah dimasukkan user';

			$data['row'] = $this->MProses->getHistoryCetak();

			$this->load->view('header', $data);
			$this->load->view('historycetak_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function detailcetak($id=null) {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Detail Pembelian';
			$data['page_note'] = 'Rincian transaksi pembelian';
			$data['edited'] = 'detail';

			$data['jenis_cetak'] = $this->MJenisCetak->getAll();
			$data['jenis_kertas'] = $this->MJenisKertas->getCombo();
			$data['laminasi'] = $this->MProses->getComboLaminasi();

			$trans = $this->MProses->getHistoryCetak($id);
			$data['proses'] = $trans[0];

			if (!empty($_FILES["file_name"])){
			   	$config = array(
			     	'upload_path' => 'upload/',
			     	'allowed_types' => 'jpeg|jpg|png|psd|cdr', // |extensi lainnya
			     	'max_size' => '0',
			     	'file_name' => preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["file_name"]['name'])
			     	//'encrypt_name' => true // encrypt file name
			   	);
			   	
			   	$this->load->library('upload');
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload('file_name')) {
		        	$this->session->set_flashdata('msg', $this->upload->display_errors());
		        } else {
		        	$data = $this->upload->data();
			 		$result = $this->MProses->insertImage($data,$id,$this->input->post('comment'));
			 		if ($result) $this->session->set_flashdata('msg', 'File berhasil di input!');
			 		else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
			     	redirect('order/detailcetak/'.$id);
		        }
			}

		   	$data['row'] = $this->MProses->getImageProses($id);

			$this->load->view('header', $data);
			$this->load->view('historycetak_detail', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function barang() {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Order Barang';
			$data['page_note'] = 'Form pembelian barang';
			$data['edited'] = false;

			// default
			$data['jenis_barang'] = $this->MJenisBarang->getAll();

			// read after post
			$list_barang = $this->MBarang->getAllWithJenis($this->input->post('jenis_barang'));
			$barang = array();
			foreach ($list_barang as $key => $value) {
				$barang[$value['id_varian']] = $value;
			}
			$data['barang'] = $barang;

			$data['id_jenis_barang'] = $this->input->post('jenis_barang') ? $this->input->post('jenis_barang') : null;

			if ($this->input->post('button') == 'save' && !empty($this->input->post('total_harga'))){
				$dbeli = array();
				foreach ($this->input->post('qty') as $key => $value) {
					if ($value > 0){
						$dbeli[$key]['varian'] = $key;
						$dbeli[$key]['qty'] = $value;
						$dbeli[$key]['jumlah'] = $value * $barang[$key]['harga_jual'];
					}
				}
				// echo '<pre>'; print_r($dbeli); echo '</pre>';
				$id = $this->MOrder->insertBeliBarang($this->input->post('total_harga'),$dbeli);
				redirect('order/detail/'.$id,'refresh');
			}
			
			$this->load->view('header', $data);
			$this->load->view('order_barang', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function cetak() {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Order Cetakan';
			$data['page_note'] = 'Form untuk order cetakan';
			$data['edited'] = false;

			$data['jenis_cetak'] = $this->MJenisCetak->getAll();
			$data['jenis_kertas'] = $this->MJenisKertas->getCombo();
			$data['laminasi'] = $this->MProses->getComboLaminasi();

			if ($this->input->post()){
				$data['edited'] = true;

				// read after post
				$data['varian'] = $this->MBarang->getAllWithJenisKertas($this->input->post('jenis_kertas'));

				// pass param back
				$data['panjang'] = $this->input->post('panjang') ? $this->input->post('panjang') : 0;
				$data['tinggi'] = $this->input->post('tinggi') ? $this->input->post('tinggi') : 0;
				$data['lebar'] = $this->input->post('lebar') ? $this->input->post('lebar') : 0;
				
				$data['qty'] = $this->input->post('qty') ? $this->input->post('qty') : 0;
				$data['total'] = $this->input->post('total') ? $this->input->post('total') : 0;

				$data['porforasi'] = $this->input->post('porforasi') ? 1 : 0;
				$data['numerator'] = $this->input->post('numerator') ? 1 : 0;
				$data['uv'] = $this->input->post('uv') ? 1 : 0;

				$data['id_laminasi'] = $this->input->post('laminasi') ? $this->input->post('laminasi') : null;		
				$data['id_jenis_cetak'] = $this->input->post('jenis_cetak') ? $this->input->post('jenis_cetak') : null;
				$data['id_jenis_kertas'] = $this->input->post('jenis_kertas') ? $this->input->post('jenis_kertas') : null;
				$data['id_varian'] = $this->input->post('varian') ? $this->input->post('varian') : null;

				// hitung harga total dan estimasi tanggal jadi --> baru masukin ke db
				if (!empty($data['qty']) && !empty($data['id_varian'])){
					foreach ($data['varian'] as $value) {
	                    if ($value['id_varian'] == $data['id_varian']){
	                    	$data['total'] = $value['harga_jual'] * $data['qty'];
	                    	break;
	                    }
                    }

                    // hitung tambahan biaya kalau pakai numerator dan porforasi
                    $str = file_get_contents('harga.txt');
                    $str = explode('=', $str);
                    $porforasi = trim($str[2]);
                    $numerator = explode('porforasi', $str[1]);
                    $numerator = trim($numerator[0]);

                    if ($data['porforasi'] == 1) $data['total'] += $porforasi;
                    if ($data['numerator'] == 1) $data['total'] += $numerator;

                    // hitung tanggal jadi -> default: seminggu setelah
                    $data['tanggal_jadi'] = date("Y-m-d H:i:s", strtotime("+3 days")); //+1 week

                    // masukin ke db
                    if ($this->input->post('button') == 'save'){
                    	$result = $this->MProses->insertProses($data['panjang'],$data['lebar'],$data['tinggi'],$data['id_jenis_cetak'],$data['id_jenis_kertas'],$data['id_varian'],$data['qty'],$data['total'],$data['id_laminasi'],$data['porforasi'],$data['numerator'],$data['uv'],$data['tanggal_jadi']);
                    }
				}
			}

			$this->load->view('header', $data);
			$this->load->view('order_cetak', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Tambah Ukuran Kertas Baru';
			$data['edited'] = false;

			$data['barang'] = $this->MBarang->getAll();

			if ($this->input->post('button') == 'save'){
				$result = $this->MUkuranKertas->insert($this->input->post('barang'),$this->input->post('nama'),$this->input->post('panjang'),$this->input->post('lebar'));
				if ($result)
					redirect('ukurankertas');
			}

			$this->load->view('header', $data);
			$this->load->view('ukurankertas_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 2){
			$data['page_title'] = 'Edit Ukuran Kertas';
			$data['edited'] = true;

			$data['barang'] = $this->MBarang->getAll();

			$detail = $this->MUkuranKertas->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MUkuranKertas->update($id,$this->input->post('barang'),$this->input->post('nama'),$this->input->post('panjang'),$this->input->post('lebar'));
				if ($result)
					redirect('ukurankertas');
			}

			$this->load->view('header', $data);
			$this->load->view('ukurankertas_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 2){
			$result = $this->MUkuranKertas->delete($id);
			if ($result) redirect('ukurankertas');
		} else {
			redirect('login');
		}
	}

	public function upload() {
		if (!empty($_SESSION['printer']['user']['role'])){
			$data['page_title'] = 'Upload File';
			$data['page_note'] = 'Upload file yang akan dicetak';
			$data['edited'] = false;

			if (!empty($_FILES["file_name"])){
			   	$config = array(
			     	'upload_path' => 'upload/',
			     	'allowed_types' => 'jpeg|jpg|png|psd|cdr', // |extensi lainnya
			     	'max_size' => '0',
			     	'file_name' => preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["file_name"]['name'])
			     	//'encrypt_name' => true // encrypt file name
			   	);
			   	
			   	$this->load->library('upload');
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload('file_name')) {
		        	$this->session->set_flashdata('msg', $this->upload->display_errors());
		        } else {
		        	$data = $this->upload->data();
			 		$result = $this->MProses->insertImage($data);
			 		if ($result) $this->session->set_flashdata('msg', 'File berhasil di input!');
			 		else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
			     	redirect('order/upload');
		        }
			}

		   	$data['row'] = $this->db->get('image')->result();

		   	$this->load->view('header', $data);
			$this->load->view('upload_file', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function download_file($str) {
		if (!empty($_SESSION['printer']['user']['role'])){
			force_download('./upload/'.$str, null);
		} else {
			redirect('login');
		}
	}

	public function deleteImage($id) {
		if ($_SESSION['printer']['user']['role'] == 2){
			$result = $this->MProses->deleteImage($id);
			if ($result) redirect('order/upload');
		} else {
			redirect('login');
		}
	}
}
