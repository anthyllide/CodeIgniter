<?php

$config = array(
	'contact'=> array( //la clé 'contact/index' définit que les règles s'appliquent à la méthode index du contrôleur contact
				array(
            'field' => 'name',
            'label' => 'Nom',
            'rules' => 'required', /*Champs requis*/
            'errors'=> array( 
            				'required' =>'Le champ "nom" doit être renseigné.'
        				)
        ), 
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => array('valid_email', 'required'), /* l'email doit être correct et requis */
            'errors'=> array(
            				'valid_email' => 'L\'email doit être valide',
            				'required'=> 'Le champ "Email" doit être renseigné'
            			)
        ), 
        array(
            'field'=> 'email2',
            'label' => 'confirmation Email',
            'rules'=> array('valid_email', 'required', 'matches[email]'), /* l'email doit être correct, requis et identique à l'email renseigné au-dessus */
            'errors'=> array(
                    'valid_email' => 'L\'email doit être valide',
                    'required'=> 'Le champ "Confirmation email" doit être renseigné',
                    'matches[email]'=>'L\'email doit être identique à l\'email renseigné au-dessus.'
            )
        ),
        array(
            'field' => 'title',
            'label' => 'Titre',
            'rules' => 'required',/*Champs requis*/
            'errors'=> array(
            				'required'=>'le champ "Titre" doit être renseigné.'
            			)

        ), 
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required',/*Champs requis*/
            'errors'=> array(
            				'required'=>'le champ "Message" doit être renseigné.'
            			)
        )

	),
	'connexion'=>array(
		array(
			'field'=>"username",
			'label'=>'Nom d\'utilisateur',
			'rules'=>'required', /* champs requis */
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
		)
	)

);