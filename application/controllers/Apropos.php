<?php

class Apropos extends CI_controller {

	protected $titre;

	public function __construct(){

		parent::__construct();

		$this->titre = 'A propos';

	}

	/* se lance si aucun controller dans l'URL*/
	public function index(){
		$this->afficheApropos();
	}
	
	/* permet d'afficher la page A propos*/
	public function afficheApropos(){
		$data = array(
			'title'=> $this->titre
		);

		$this->load->view('common/header', $data);
        $this->load->view('site/a_propos', $data);
        $this->load->view('common/footer', $data);
	}

}