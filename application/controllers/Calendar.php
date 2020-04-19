<?php defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->table 		= 'calendar';
		$this->load->model('Globalmodel', 'modeldb');
		// is_logged_in();
	}

	public function index()
	{
		$data_calendar = $this->modeldb->get_list($this->table);
		$calendar = array();
		foreach ($data_calendar as $key => $val) {
			$calendar[] = array(
				'id' 	=> intval($val->id),
				'title' => $val->title,
				'description' => trim($val->description),
				'start' => date_format(date_create($val->start_date), "Y-m-d H:i:s"),
				'end' 	=> date_format(date_create($val->end_date), "Y-m-d H:i:s"),
				'color' => $val->color,
			);
		}

		$data = array();
		$data['get_data']			= json_encode($calendar);
		$data['title'] = 'Calendar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/calen_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/calendar', $data);
		$this->load->view('templates/calen_footer');
	}

	public function save()
	{
		$response = array();
		$this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
		if ($this->form_validation->run() == TRUE) {
			$param = $this->input->post();
			$calendar_id = $param['calendar_id'];
			unset($param['calendar_id']);

			if ($calendar_id == 0) {
				$param['create_at']   	= date('Y-m-d H:i:s');
				$insert = $this->modeldb->insert($this->table, $param);

				if ($insert > 0) {
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $insert;
				} else {
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			} else {
				$where 		= ['id'  => $calendar_id];
				$param['modified_at']   	= date('Y-m-d H:i:s');
				$update = $this->modeldb->update($this->table, $param, $where);

				if ($update > 0) {
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $calendar_id;
				} else {
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			}
		} else {
			$response['status'] = FALSE;
			$response['notif']	= validation_errors();
		}

		echo json_encode($response);
	}

	public function delete()
	{
		$response 		= array();
		$calendar_id 	= $this->input->post('id');
		if (!empty($calendar_id)) {
			$where = ['id' => $calendar_id];
			$delete = $this->modeldb->delete($this->table, $where);

			if ($delete > 0) {
				$response['status'] = TRUE;
				$response['notif']	= 'Success delete calendar';
			} else {
				$response['status'] = FALSE;
				$response['notif']	= 'Server wrong, please save again';
			}
		} else {
			$response['status'] = FALSE;
			$response['notif']	= 'Data not found';
		}

		echo json_encode($response);
	}
}
