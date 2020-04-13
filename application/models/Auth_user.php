<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_user extends CI_Model {

    protected $_username;
    protected $_id;

    public function __construct() {
        parent::__construct();
        $this->load_from_session(); //charge les informations depuis la session si elles existent
    }

    //accède au méthode __get() si l'attribut existe
    public function __get( $key) {

        $method_name = 'get_property_' . $key;

        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        } else {
            return parent::__get( $key);
        }
    }

    protected function clear_data() {
        $this->_id = NULL;
        $this->_username = NULL;
    }

    //efface la session en cours
    protected function clear_session() {
        $this->session->auth_user = NULL;
    }

    //retourne la valeur de l'ID de l'objet User
    protected function get_property_id() {
        return $this->_id;
    }

    //retourne la valeur le status (connecté ou pas)
    protected function get_property_is_connected() {
        return $this->_id !== NULL;
    }

    //retourne le username de l'objet user
    protected function get_property_username() {
        return $this->_username;
    }

    protected function load_from_session() {
        if ($this->session->auth_user) {
            $this->_id = $this->session->auth_user['id'];
            $this->_username = $this->session->auth_user['username'];
        } else {
            $this->clear_data();
        }
    }

    //va charge le user => va chercher le user dans la DB à partir du username
    protected function load_user( $username) {
        return $this->db
                    ->select('id, username, password')
                    ->from('login')
                    ->where('username', $username)
                    ->where('status', 'A')
                    ->get()
                    ->first_row();
    }

    //permet de vérifier si le password correspond au user
    public function login( $username, $password) {
        $user = $this->load_user( $username);
        if (( $user !== NULL) && password_verify($password, $user->password)) {
            $this->_id = $user->id;
            $this->_username = $user->username;
            $this->save_session();
        } else {
            $this->logout();
        }
    }

    //déconnecte le user en effacant la session et les datas
    public function logout() {
        $this->clear_data();
        $this->clear_session();
    }

    //Sauvegarde la session
    protected function save_session() {
        $this->session->auth_user = [
            'id' => $this->_id,
            'username' => $this->_username
        ];
    }
}
