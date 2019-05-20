<?php
class ControllerModuleNoticeuplivesearch extends Controller {
	private $error = array();

	public function index() {

		$language_array = $this->load->language('module/noticeuplivesearch');

		foreach ($language_array as $language_key => $language_value) {
		    $data[$language_key] = $language_value;
		}


		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('noticeuplivesearch', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('module/noticeuplivesearch', 'token=' . $this->session->data['token'], 'SSL'));
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/noticeuplivesearch', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('module/noticeuplivesearch', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['noticeuplivesearch_minLength'])) {
			$data['noticeuplivesearch_minLength'] = $this->request->post['noticeuplivesearch_minLength'];
		} else {
			$data['noticeuplivesearch_minLength'] = $this->config->get('noticeuplivesearch_minLength');
		}

		if (isset($this->request->post['noticeuplivesearch_maxShownResults'])) {
			$data['noticeuplivesearch_maxShownResults'] = $this->request->post['noticeuplivesearch_maxShownResults'];
		} else {
			$data['noticeuplivesearch_maxShownResults'] = $this->config->get('noticeuplivesearch_maxShownResults');
		}

		if (isset($this->request->post['noticeuplivesearch_visibleProperties'])) {
			$data['noticeuplivesearch_visibleProperties'] = $this->request->post['noticeuplivesearch_visibleProperties'];
		} else {
			$data['noticeuplivesearch_visibleProperties'] = $this->config->get('noticeuplivesearch_visibleProperties');
		}

		if (isset($this->request->post['noticeuplivesearch_image_width'])) {
			$data['noticeuplivesearch_image_width'] = $this->request->post['noticeuplivesearch_image_width'];
		} else {
			$data['noticeuplivesearch_image_width'] = $this->config->get('noticeuplivesearch_image_width');
		}

		if (isset($this->request->post['noticeuplivesearch_image_height'])) {
			$data['noticeuplivesearch_image_height'] = $this->request->post['noticeuplivesearch_image_height'];
		} else {
			$data['noticeuplivesearch_image_height'] = $this->config->get('noticeuplivesearch_image_height');
		}

		if (isset($this->request->post['noticeuplivesearch_groupBy'])) {
			$data['noticeuplivesearch_groupBy'] = $this->request->post['noticeuplivesearch_groupBy'];
		} else {
			$data['noticeuplivesearch_groupBy'] = $this->config->get('noticeuplivesearch_groupBy');
		}

		if (isset($this->request->post['noticeuplivesearch_findCategory'])) {
			$data['noticeuplivesearch_findCategory'] = $this->request->post['noticeuplivesearch_findCategory'];
		} else {
			$data['noticeuplivesearch_findCategory'] = $this->config->get('noticeuplivesearch_findCategory');
		}

		if (isset($this->request->post['noticeuplivesearch_findDescription'])) {
			$data['noticeuplivesearch_findDescription'] = $this->request->post['noticeuplivesearch_findDescription'];
		} else {
			$data['noticeuplivesearch_findDescription'] = $this->config->get('noticeuplivesearch_findDescription');
		}


		$this->document->addStyle('../catalog/view/javascript/jquery/flexdatalist/jquery.flexdatalist.min.css');
		$this->document->addScript('../catalog/view/javascript/jquery/flexdatalist/jquery.flexdatalist.min.js');

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/noticeuplivesearch.tpl', $data));
		//$this->response->setOutput($this->load->view('extension/module/noticeupmultistore.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/noticeuplivesearch')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
