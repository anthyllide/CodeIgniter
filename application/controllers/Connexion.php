<?php

class Connexion extends CI_controller 
{

	protected $titre;

	/* régles du formulaire */
	/*protected $rules = array(

		array(
			'field'=>"username",
			'label'=>'Nom d\'utilisateur',
			'rules'=>'required', /* champs requis 
			'errors'=> array(
						'required'=>'Le champ "Nom d\'utilisateur" est requis.'
			)
		),
		array(
			'field'=>'password',
			'label'=>'Mot de passe',
			'rules' => 'required',
			'errors' => array(
							'required'=> 'Le champ "Mot de passe" est requis.'
			)
		),
	);*/

	public function __construct(){

		parent::__construct();

		$this->titre = 'Connexion';
		$this->load->helper('form'); /* charge le helper form */
		$this->load->library('form_validation'); /* charge la librairie form_validation */

	}

	public function index(){
		$this->affichePageConnexion();
	}

	protected function affichePageConnexion(){

		$data = array(
			"title"=> $this->titre
		);

		//$this->form_validation->set_rules($this->rules); //on teste les régles

		if($this->form_validation->run('connexion')) { //si le formulaire est valide
		 	$username = $this->input->post('username'); //on récupère le username saisi
		 	$password = $this->input->post('password'); // on récupère le mot de passe
		 	$this->Auth_user->login($username,$password); // on connecte le user

		 	if($this->Auth_user->is_connected) { //si le user est connecté
                redirect(''); // on redirige vers la page d'accueil
            } else {
                $data['login_error'] = "Échec de l'authentification";
            }
		}

		$this->load->view('common/header', $data);
        $this->load->view('site/connexion', $data);
        $this->load->view('common/footer', $data);

		
	}

	public function logout(){
		$this->Auth_user->logout();
        redirect('');// on redirige vers la page d'accueil
	}

}