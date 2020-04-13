<?php

class Accueil extends CI_controller {

	protected $titre;

	public function __construct(){

		parent::__construct();

		$this->titre = 'Bienvenue sur mon blog';

	}

	/* se lance si aucun controller dans l'URL*/
	public function index(){
		$this->accueil();
	}
	
	/* permet d'afficher la page d'accueil*/
	public function accueil(){
		$data = array(
			'title'=> $this->titre
		);

		$this->load->view('common/header', $data);
        $this->load->view('site/index', $data);
        $this->load->view('common/footer', $data);
	}

}