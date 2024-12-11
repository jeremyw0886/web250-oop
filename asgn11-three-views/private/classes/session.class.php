<?php
class Session
{
    private $member_id;
    public $username;
    private $last_login;
    private $user_level;
    public $message;

    public function __construct()
    {
        session_start();
        $this->check_stored_login();
        $this->check_message();
    }

    public function get_member_id()
    {
        return $this->member_id;
    }

    public function is_admin()
    {
        return isset($this->user_level) && $this->user_level === 'a';
    }

    public function login($member)
    {
        if ($member) {
            session_regenerate_id();
            $this->member_id = $_SESSION['member_id'] = $member->id;
            $this->username = $_SESSION['username'] = $member->username;
            $this->user_level = $_SESSION['user_level'] = $member->user_level; // Add this line
            $this->last_login = $_SESSION['last_login'] = time();
        }
        return true;
    }

    public function is_logged_in()
    {
        return isset($this->member_id) && $this->last_login_is_recent();
    }

    public function logout()
    {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }

        // Destroy the session
        session_destroy();

        // Reset object properties
        $this->member_id = null;
        $this->username = null;
        $this->last_login = null;
        $this->user_level = null;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['member_id'])) {
            $this->member_id = $_SESSION['member_id'];
            $this->username = $_SESSION['username'];
            $this->user_level = $_SESSION['user_level'];
            $this->last_login = $_SESSION['last_login'];
        }
    }

    private function last_login_is_recent()
    {
        if (!isset($this->last_login)) {
            return false;
        }
        return ($this->last_login + (60 * 60 * 24)) >= time();
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
            return true;
        } else {
            return $this->message;
        }
    }

    public function clear_message()
    {
        $this->message = '';
        unset($_SESSION['message']);
    }

    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = '';
        }
    }
}
