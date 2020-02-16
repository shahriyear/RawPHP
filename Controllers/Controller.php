<?php

class Controller
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index()
    {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        switch ($page) {
            case ($page === "show"):
                require "views/show.php";
                break;
            case ($page === "create"):
                print_r($_POST);
                die;
                if (isset($_POST['subBtn'])) {
                    $id = $this->prepareData($_POST);
                    header('Location: /index.php?page=show');
                    exit();
                }
                require "views/show.php";
                break;

            default:
                require "views/start.php";
                break;
        }
    }


    private function prepareData($post)
    {
        unset($post['subBtn']);
        $post['hash_key'] = hash('sha512', $post['receipt_id']);
        $post['entry_at'] = date('Y-m-d');
        $post['buyer_ip'] = $this->getIpAddr();
        $id = $this->db->create('tbl_data', $post);
        return $id ?? false;
    }

    public function getIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    public function success()
    {
        if (isset($_GET['insert_success_movie']) && $_GET['insert_success_movie']) {
            echo "<p>Your movie was successfully inserted! If you want to see your movie click <a href='/index.php?page=update_movie&id=" . $_GET['id'] . "'>Here</a></p>";
        } elseif (isset($_GET['insert_success_director']) && $_GET['insert_success_director']) {
            echo "<p>Your director was successfully inserted! If you want to see your director click <a href='/index.php?page=update_director&id=" . $_GET['id'] . "'>Here</a></p>";
        } elseif (isset($_GET['insert_success_movie']) && !$_GET['insert_success_movie']) {
            echo "<p>Something went wrong!</p>";
        } elseif (isset($_GET['insert_success_director']) && !$_GET['insert_success_director']) {
            echo "<p>Something went wrong!</p>";
        }
    }
}
