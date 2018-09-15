<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index() {
		$this->add();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role']){
			$data['page_title'] = 'Daftar Pembelian';
			$data['page_note'] = 'Daftar seluruh transaksi yang telah dilakukan user';

			if ($_SESSION['printer']['user']['role'] == 2) // client
				$data['row'] = $this->MOrder->getHistoryBeliClient();
			else if ($_SESSION['printer']['user']['role'] == 1) // pegawai
				$data['row'] = $this->MOrder->getHistoryBeli();

			$this->load->view('header', $data);
			$this->load->view('historybeli_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function detail($id=null) {
		if ($_SESSION['printer']['user']['role']){
			$data['page_title'] = 'Detail Pembelian';
			$data['page_note'] = 'Rincian transaksi pembelian';

			$trans = $this->MOrder->getOneHeader($id);
			$data['trans'] = $trans[0];

			$data['row'] = $this->MOrder->getDetailBeli($id);
			$data['pesan'] = $this->MOrder->getPesanTrans($id);

			if ($this->input->post('button') == 'savenewmessage'){ // save message left by client or admin alike
				$result = $this->MOrder->insertPesanTrans($this->input->post('id_trans'),$this->input->post('newmessage'));
				if ($result) $this->session->set_flashdata('msg', 'Pesan berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detail/'.$id);
			} else if ($this->input->post('button') == 'savenewprice'){ // admin can change price total after nego
				$result = $this->MOrder->updateHargaTrans($this->input->post('id_trans'),$this->input->post('newprice'));
				if ($result) $this->session->set_flashdata('msg', 'Perubahan total harga berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detail/'.$id);
			} else if ($this->input->post('button') == 'continuetopickup'){ // customer agree with the price, order can be picked up
				$result = $this->MOrder->updateStatusTrans($this->input->post('id_trans'),21);
				if ($result) $this->session->set_flashdata('msg', 'Perubahan total harga berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detail/'.$id);
			} else if ($this->input->post('button') == 'continuetodone'){ // mark as done
				$result = $this->MOrder->updateStatusTrans($this->input->post('id_trans'),1);
				if ($result) $this->session->set_flashdata('msg', 'Status order selesai berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detail/'.$id);
			} 

			$this->load->view('header', $data);
			$this->load->view('historybeli_detail', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function lstcetak() {
		if ($_SESSION['printer']['user']['role']){
			$data['page_title'] = 'Daftar Order Cetakan';
			$data['page_note'] = 'Daftar seluruh order cetakan yang pernah dimasukkan user';

			if ($_SESSION['printer']['user']['role'] == 2) // client
				$data['row'] = $this->MProses->getHistoryCetakClient();
			else if ($_SESSION['printer']['user']['role'] == 1) // pegawai
				$data['row'] = $this->MProses->getHistoryCetak();

			$this->load->view('header', $data);
			$this->load->view('historycetak_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function detailcetak($id=null) {
		if ($_SESSION['printer']['user']['role']){
			$data['page_title'] = 'Detail Pembelian';
			$data['page_note'] = 'Rincian transaksi pembelian';
			$data['edited'] = 'detail';

			$data['jenis_cetak'] = $this->MJenisCetak->getAll();
			$data['jenis_kertas'] = $this->MJenisKertas->getCombo();
			$data['laminasi'] = $this->MProses->getComboLaminasi();
			$data['varian'] = $this->MBarang->getAll();
			
			$trans = $this->MProses->getHistoryCetak($id);
			$data['proses'] = $trans[0];

			$data['pesan'] = $this->MProses->getPesanProses($id);
		   	$data['row'] = $this->MProses->getImageProses($id);

		   	$comment = array();
		   	foreach ($data['row'] as $row) {
		   		$result = $this->MProses->getCommentImage($row->id_image);
		   		foreach ($result as $key => $value) {
		   			$comment[$row->id_image][$value['id_comment']] = $value;
		   		}
		   	}
		   	$data['comment'] = $comment;

		   	// echo '<pre>'; print_r($data); echo '</pre>';

			// upload file baru
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
			} else if ($this->input->post('button') == 'savenewcomment'){ // save comment on image, left by client or admin alike
				$result = $this->MProses->insertComment($this->input->post('id_image'),$this->input->post('newcomment'));
				if ($result) $this->session->set_flashdata('msg', 'Comment berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'savenewmessage'){ // save message left by client or admin alike
				$result = $this->MProses->insertPesan($this->input->post('id_proses'),$this->input->post('newmessage'));
				if ($result) $this->session->set_flashdata('msg', 'Pesan berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'savenewprice'){ // admin can change price total after nego
				$result = $this->MProses->updateHargaProses($this->input->post('id_proses'),$this->input->post('newprice'));
				if ($result) $this->session->set_flashdata('msg', 'Perubahan total harga berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'continuetodesign'){ // deal harga, continue to upload design
				$result = $this->MProses->changeProsesStatus($this->input->post('id_proses'),3);
				if ($result) $this->session->set_flashdata('msg', 'Deal total harga berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'continuetoprint'){ // payment confirmation - save to db hbeli & dbeli proses
				$result1 = $this->MOrder->insertBeliCetak($this->input->post('id_proses'));
				$result2 = $this->MProses->changeProsesStatus($this->input->post('id_proses'),4);
				if ($result1 && $result2) $this->session->set_flashdata('msg', 'Pembayaran telah dikonfirmasi!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'continuetoprint2'){ // deal harga, continue to upload design
				$result = $this->MProses->changeProsesStatus($this->input->post('id_proses'),5);
				if ($result) $this->session->set_flashdata('msg', 'Menuju ke proses cetak desain!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'continuetodone'){ // printing is done, customer have to pick it up
				$result = $this->MProses->changeProsesStatus($this->input->post('id_proses'),6);
				if ($result) $this->session->set_flashdata('msg', 'Proses cetak desain telah selesai!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			} else if ($this->input->post('button') == 'continuetodone2'){ // mark this proses as done
				$result = $this->MProses->changeProsesStatus($this->input->post('id_proses'),7);
				if ($result) $this->session->set_flashdata('msg', 'Penutupan proses berhasil di input!');
				else $this->session->set_flashdata('msg', 'Tidak bisa menyimpan ke database');
		    	redirect('order/detailcetak/'.$id);
			}

			$this->load->view('header', $data);
			$this->load->view('historycetak_detail', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function deletePesan($id,$id_proses) {
		if ($_SESSION['printer']['user']['role']){
			$result = $this->MProses->deletePesan($id);
			if ($result) redirect('order/detailcetak/'.$id_proses);
		} else {
			redirect('login');
		}
	}

	public function deleteComment($id) {
		if ($_SESSION['printer']['user']['role']){
			$result = $this->MProses->deleteComment($id);
			if ($result) redirect('order/detailcetak/'.$id_proses);
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

				$id = $this->MOrder->insertBeliBarang($this->input->post('total_harga'),$dbeli);
				$result = $this->MOrder->updateStatusTrans($id,20);
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
                    	$id = $this->MProses->insertProses($data['panjang'],$data['lebar'],$data['tinggi'],$data['id_jenis_cetak'],$data['id_jenis_kertas'],$data['id_varian'],$data['qty'],$data['total'],$data['id_laminasi'],$data['porforasi'],$data['numerator'],$data['uv'],$data['tanggal_jadi']);
                    	$result = $this->MProses->changeProsesStatus($id,2);
                    	redirect('order/detailcetak/'.$id,'refresh');
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

	public function upload() {
		if (!empty($_SESSION['printer']['user']['role'])){
			$data['page_title'] = 'Upload File';
			$data['page_note'] = 'Upload file yang akan dicetak';
			$data['edited'] = false;

			// generate file name
			$filename = preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["file_name"]['name']) . 'x' . preg_replace("/[^a-zA-Z0-9]/", "", strval(date('Y-m-d H:i:s'))) . 'x' . $_SESSION['printer']['user']['id_user'];

			if (!empty($_FILES["file_name"])){
			   	$config = array(
			     	'upload_path' => 'upload/',
			     	'allowed_types' => 'jpeg|jpg|png|psd|cdr', // |extensi lainnya
			     	'max_size' => '0',
			     	'file_name' => $filename,
			     	'encrypt_name' => true // encrypt file name
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

	public function deleteImage($id,$id_proses) {
		if ($_SESSION['printer']['user']['role']){
			$result = $this->MProses->deleteImage($id);
			if ($result) redirect('order/detailcetak/'.$id_proses);
		} else {
			redirect('login');
		}
	}
}
