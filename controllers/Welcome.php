<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		// $this->load->view('welcome_message');
		$this->load->view('home_view');
	}

	public function candle()
	{
		$candles = [1, 3, 2, 1, 3];

		$start_time = microtime(true);

		// Panggil fungsi candle() di sini
		$result = $this->birthdayCakeCandles($candles);

		$end_time = microtime(true);
		$duration = ($end_time - $start_time) * 1000; // Konversi ke milidetik

		echo "Waktu eksekusi program: " . $duration . " ms";
	}

	public function birthdayCakeCandles($candles)
	{
		$maxHeight = $candles[0];
		$count = 0;

		for ($i = 0; $i < count($candles); $i++) {
			if ($candles[$i] > $maxHeight) {
				$maxHeight = $candles[$i];
				$count = 1;
			} else if ($candles[$i] === $maxHeight) {
				$count++;
			}
		}

		return $count;
	}
}
