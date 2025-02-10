<?php
namespace Core;

class Auth {
    protected $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function login($user) {
        $this->session->set('user_id', $user['id']);
        $this->session->set('user_name', $user['name']);
    }

    public function logout() {
        $this->session->remove('user_id');
        $this->session->remove('user_name');
        $this->session->destroy();
    }

    public function isLoggedIn() {
        return $this->session->get('user_id') !== null;
    }

    public function getUserId() {
        return $this->session->get('user_id');
    }

    public function getUserName() {
        return $this->session->get('user_name');
    }
}
