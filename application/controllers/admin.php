<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function index() {
		$this->load->model('auth_model', 'auth');
		if(!$this->auth->isLoggedIn() || !$this->auth->isAdmin(null, null, null, null)) {
			$this->output->set_header('Location: '.base_url());
			$this->output->set_status_header('302');
			$this->output->_display();
		} else {
			$this->load->model('admin_model', 'admin');

			$data['page_title'] = 'Admin | RocReport';
			$data['page_id'] = 3;
			$data['is_logged_in'] = $this->auth->isLoggedIn();
			$data['is_admin'] = $this->auth->isAdmin(null, null, null, null);
			$data['is_super_admin'] = $this->auth->isSuperAdmin();
			$data['browser'] = $this->config->item('browser');
			$data['all_reports'] = $this->admin->get_reports($data['is_logged_in']);

			$this->load->view('app/header', $data);
			$this->load->view('app/navbar', $data);
			$this->load->view('admin/nav.php', $data);
			$this->load->view('admin/content.php', $data);
			$this->load->view('app/footer', $data);
		}
	}

	function api($method) {
		$this->load->model('auth_model', 'auth');
		$this->load->model('client_model', 'client');
		$id = $this->input->post('id');

		$valid = ($id ? $this->client->isValid($id) : false);
		$rate_limit = ($valid ? $this->client->check_rate_limit($id) : false);

		if($id && $valid && $rate_limit ) {
			if(!$this->auth->isLoggedIn() || !$this->auth->isAdmin(null, null, null, null)) {
				$this->output->set_header('Location: '.base_url());
				$this->output->set_status_header('302');
				$this->output->_display();
			} else {
				$this->load->model('admin_model', 'admin');
				$email = $this->auth->isLoggedIn();

				switch ($method) {
					case 'get_reports':
						$data = $this->admin->get_reports($email);
						$this->_response_success($data);
						break;
					case 'get_reports_closed':
						$data = $this->admin->get_reports_closed($email);
						$this->_response_success($data);
						break;
					case 'save_update':
						$text = $this->input->post('update');
						$reportid = $this->input->post('report_id');
						if($text && $reportid) {
							$this->admin->save_update($email, $text, $reportid, 'open');
							$this->_response_success(array());
						}
						break;
					case 'set_open':
						$report = $this->input->post('report');
						$this->admin->set_report_open($report);
						$this->admin->save_update($email, "Report opened", $report, 'open');
						$this->_response_success($data);
						break;
					case 'set_close':
						$report = $this->input->post('report');
						$this->admin->set_report_close($report);
						$this->admin->save_update($email, "Report closed", $report, 'close');
						$this->_response_success($data);
						break;
                                        case 'pay_money':
                                                //print_r($_POST);
						$amount = $this->input->post('amount');
                                                $user_email = $this->input->post('user_email');
                                                //print_r($_POST);
						$this->admin->sendMoneyUsingDwolla($user_email, $amount);
                                                //print_r($_POST);
						$this->_response_success(array());
					default:
						# code...
						break;
				}
			}
		}
	}

	function _response_success($vars) {
		$data['status'] = true;
		$data['data'] = $vars;
		$this->load->view('api/response', $data);
	}

}
