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
                    $checked = $this->validateData($_POST);
                    if ($checked['status'] == 'failed') {
                        echo json_encode($checked);
                        exit();
                    }
                    echo $this->prepareDataAndCreate($checked['post']);
                }
                break;

            default:
                require "views/start.php";
                break;
        }
    }


    private function validateData($post)
    {
        $err = [];
        if (!is_numeric($post['amount'])) {
            $err['amount'] = 'Amount Must Be Numeric';
        }
        if (!ctype_alnum($post['buyer']) && strlen($post['buyer']) >= 20) {
            $err['buyer'] = 'Buyer Must Be Alpha Numeric Or Less Then 20 Char!';
        }
        if (!preg_match("/^[a-zA-Z ]*$/", $post['receipt_id'])) {
            $err['receipt_id'] = 'Receipt Id Must Be Alphabetic';
        }
        if (!preg_match("/^[a-zA-Z ]*$/", $post['items'])) {
            $err['items'] = 'Items Must Be Alpha';
        }

        if (!filter_var($post['buyer_email'], FILTER_VALIDATE_EMAIL)) {
            $err['email'] = 'Email Must Be Valid';
        }

        if (strlen($post['note']) >= 30) {
            $err['note'] = 'NOte Must Be Less Then 30 Char';
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $post['city'])) {
            $err['city'] = 'City Must Be Alphabetic';
        }

        if (!is_numeric(filter_var($post['phone'], FILTER_SANITIZE_NUMBER_INT))) {
            $err['phone'] = 'Phone Must Be Correct';
        }

        if (!is_numeric($post['entry_by'])) {
            $err['entry_by'] = 'Entry By Must Be Numeric';
        }

        if (count($err) != 0) {
            $res['status'] = 'failed';
            $res['errors'] = $err;
        } else {
            $res['status'] = 'passed';
            $res['post'] = $post;
        }
        return $res;
    }

    
    private function prepareDataAndCreate($post)
    {
        unset($post['subBtn']);
        $post['hash_key'] = hash('sha512', $post['receipt_id']);
        $post['entry_at'] = date('Y-m-d');
        $post['buyer_ip'] = $this->getIpAddr();
        $post['phone'] = filter_var($post['phone'], FILTER_SANITIZE_NUMBER_INT);
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
