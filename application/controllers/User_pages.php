<?php
class User_pages extends CI_controller 
{

	protected $titre;

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->titre = 'Control panel';
		$this->displayPanel();

	}

	protected function displayPanel(){

		$data = array(
			"title"=>$this->titre
		);

		if($this->Auth_user->is_connected){
			$this->load->view('common/header', $data);
			$this->load->view('site/user_page', $data);
			$this->load->view('common/footer', $data);
		} else {
			redirect('');
		}		
	}
}