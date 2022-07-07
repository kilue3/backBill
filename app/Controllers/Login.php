<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\Storemodel;

use ResourceBundle;

class Login extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
      
        $umodel = new UserModel();



        $logs = [
            "username" =>  $this->request->getVar('username'),
            "password" => md5($this->request->getVar('password'))
        ];

       
        $checkuser = $umodel->where($logs)->findAll();
        if (count($checkuser) == 1) {
            foreach ($checkuser as $row) {
                $id = $row['id'];
                $fname = $row['fullname'];
                $lname = $row['username'];
 
                $status = $row['status'];
            }
            $response = [
                'id' => $id,
                'fullname' => $fname,
                'username' => $lname,
                'status' => $status,
            'message'=> 'success'
            ];


            return $this->respond($response);
        } else {

            $response = [

                'message' =>  'fail'
            ];
            return $this->respond($response);
        }
    }
    public function Storelogin()
    {
      
        $umodel = new Storemodel();



        $logs = [
            "Store_username" =>  $this->request->getVar('username'),
            "Store_password" =>  md5($this->request->getVar('password'))
        ];
       
        $checkuser = $umodel->where($logs)->findAll();
        if (count($checkuser) == 1) {
            foreach ($checkuser as $row) {
                $id = $row['Store_id'];
                $fname = $row['Store_name'];
                $username = $row['Store_username'];
                $conname = $row['Contact_name'];
   $status = $row['Store_status'];
                 
            }
            $response = [
                'id' => $id,
                'fullname' => $fname,
                'username' => $username,
                'contactname' => $conname,

                'status' => $status,
            'message'=> 'success'
            ];


            return $this->respond($response);
        } else {

            $response = [

                'message' =>  'fail'
            ];
            return $this->respond($response);
        }
    }
    public function selectall()
    {
      
        $umodel = new UserModel();

       
        $checkuser = $umodel->findAll();
       


            return $this->respond($checkuser);
        
    }
  
}
