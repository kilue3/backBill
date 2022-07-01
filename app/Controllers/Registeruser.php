<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;
use App\Models\UserModel;

use ResourceBundle;

class RegisterUser extends ResourceController
{

    use ResponseTrait;
    //get all product
    public function index()
    {
        $umodel = new UserModel();
        $data = $umodel->orderBy('user_id', 'DESC')->findAll();
        return $this->respond($data);
    }

    //insert new product
    public function create()
    {
        $smodel = new StudentModel();
        $stmodel = new StaffModel();
        $umodel = new UserModel();

        $title = $this->request->getVar('title');
        $name = $this->request->getVar('name');
        $lname = $this->request->getVar('lname');

        $email = $this->request->getVar('email');
        $tel = $this->request->getVar('tel');
        $password = $this->request->getVar('password');
        $status = $this->request->getVar('status');
        $class = $this->request->getVar('class');

        $img = 'https://media1.tenor.com/images/2df7e3651741091c5e1b8f878e0f3bef/tenor.gif?itemid=13895878';

        // if (isset($requestData['name'], $requestData['lastname'])) {
        $length = 8;

        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $data = [
            "user_id" =>  $randomString,
            "usertitle" => $title,
            "username" => $name,
            "userlastname" => $lname,
            "useremail" => $email,
            "usertel" => $tel,
            "userpassword" => md5($password),
            "userstatus" => $status,
            "img" => $img,
            "class" => $class
        ];

        $checks = $smodel->where('s_email', $data['useremail'])->first();
        $checkst = $stmodel->where('st_email', $data['useremail'])->first();
        $checkuser = $umodel->where('useremail', $data['useremail'])->first();


        if ($checkst === null && $checks === null && $checkuser === null) {

            $umodel->insert($data);
            $showregiss = $umodel->where('useremail', $data['useremail'])->findAll();

            if (
                count($showregiss) === 1

            ) {
                $rs = ["message" => "success"];
                return $this->respond($rs);
            }
        } else {
            $rs = ["message" => "fail"];
            return $this->respond($rs);
        }
        // }
    }
}
