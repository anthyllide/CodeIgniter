<?php

class Contact extends CI_controller {

	protected $titre;

	/* régles du formulaire */
	/*protected $rules = array(

  		array(
            'field' => 'name',
            'label' => 'Nom',
            'rules' => 'required', /*Champs requis
            'errors'=> array( 
            				'required' =>'Le champ "nom" doit être renseigné.'
        				)
        ), 
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => array('valid_email', 'required'), /* l'email doit être correct et requis 
            'errors'=> array(
            				'valid_email' => 'L\'email doit être valide',
            				'required'=> 'Le champ "Email" doit être renseigné'
            			)
        ), 
        array(
            'field'=> 'email2',
            'label' => 'confirmation Email',
            'rules'=> array('valid_email', 'required', 'matches[email]'), /* l'email doit être correct, requis et identique à l'email renseigné au-dessus 
            'errors'=> array(
                    'valid_email' => 'L\'email doit être valide',
                    'required'=> 'Le champ "Confirmation email" doit être renseigné',
                    'matches[email]'=>'L\'email doit être identique à l\'email renseigné au-dessus.'
            )
        ),
        array(
            'field' => 'title',
            'label' => 'Titre',
            'rules' => 'required',/*Champs requis
            'errors'=> array(
            				'required'=>'le champ "Titre" doit être renseigné.'
            			)

        ), 
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required',/*Champs requis
            'errors'=> array(
            				'required'=>'le champ "Message" doit être renseigné.'
            			)
        )
	);*/


	public function __construct(){

		parent::__construct();

		$this->titre = 'Contactez-nous';
		$this->load->helper('form'); /* charge le helper form */
		$this->load->library('form_validation');
        $this->load->library('email');/* charge la librairie form_validation */
		 /*charge la librairie email*/
		/*$this->config->load('email', TRUE);
        $this->email->initialize($this->config->item('email'));*/

	}

	public function index(){

		$data = array(
			"title"=> $this->titre
		);

		
		$this->load->view('common/header', $data);

		//$this->form_validation->set_rules($this->rules); //on teste les régles

        

		 if($this->form_validation->run('contact')) {
         
          	$this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('gonzalez.axa@wanadoo.fr');
            $this->email->subject($this->input->post('title'));
            $this->email->message($this->input->post('message'));
            $this->email->send();

            if($this->email->send()){
            $data['result_class'] = "alert-success";
            $data['result_message'] = "Merci de nous avoir envoyé ce mail. Nous y répondrons dans les meilleurs délais.";

        	} else {

            $data['result_class'] = "alert-danger";
            $data['result_message'] = "Votre message n'a pas pu être envoyé. Nous mettons tout en oeuvre pour résoudre le problème.";
            // Ne faites jamais ceci dans le "vrai monde"
            $data['result_message'] .= "<pre>\n";
            $data['result_message'] .= $this->email->print_debugger();
            $data['result_message'] .= "</pre>\n";
            $this->email->clear();
        	}
        
            $this->load->view('site/contact_result', $data);

        } else {
            $this->load->view('site/contact', $data);
        }

        $this->load->view('common/footer', $data);
	}
 
}


