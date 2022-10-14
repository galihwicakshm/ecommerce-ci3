<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-rE7F8NxFgLR5_spIKjWpYeij', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{

		$harga = $this->input->post("harga");
		$nama = $this->input->post("nama");
		$telp = $this->input->post("telp");
		$order = $this->input->post("order");
		$transaction_details = array(
			'order_id' => $order,
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		$customer_details = array(
			'first_name'    => $nama,
			'phone'         => $telp,

		);

		$credit_card['secure'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			//  'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}



	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		$data = [
			'no_order' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'pdf_url' => $result['pdf_url'],
		];
		$order_id = $result['order_id'];

		$updatecode = [
			'status_code' => $result['status_code'],
		];

		$simpan = $this->db->insert('tabel_midtrans', $data);
		$simpancode =
			$this->db->update('tabel_transaksi', $updatecode, array('no_order' => $order_id));

		if ($simpan && $simpancode) {
			redirect('pesanan_saya');
		}
	}
}
