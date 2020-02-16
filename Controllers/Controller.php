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
                if (isset($_POST)) {
                    echo $this->prepareDataAndCreate($_POST);
                }
                break;

            default:
                require "views/start.php";
                break;
        }
    }


    private function prepareDataAndCreate($post)
    {
        unset($post['subBtn']);
        $post['hash_key'] = hash('sha512', $post['receipt_id']);
        $post['entry_at'] = date('Y-m-d');
        $post['buyer_ip'] = $this->getIpAddr();
        $id = $this->db->create('tbl_data', $post);
        if ($id == false) {
            $data['status'] = 500;
            $data['message'] = 'SomeThing Went Wrong!';
        } else {
            $data['status'] = 201;
            $data['id'] = $id;
        }

        return json_encode($data);
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
}
