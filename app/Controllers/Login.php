<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;
use App\Models\UserModel;

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
            "password" =>  $this->request->getVar('password')
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
    public function selectall()
    {
      
        $umodel = new UserModel();

       
        $checkuser = $umodel->findAll();
       


            return $this->respond($checkuser);
        
    }
    public function Resetpass()
    {
        $smodel = new StudentModel();
        $stmodel = new StaffModel();
        $umodel = new UserModel();

        $logsmail =  $this->request->getVar('email');


        $logspass = [
            "s_password" =>  md5($this->request->getVar('pass')),

        ];
        $logstemail =  $this->request->getVar('email');

        $logstpass = [
            "st_password" =>  md5($this->request->getVar('pass'))
        ];



        $checks = $smodel->where('s_email', $logsmail)->findAll();
        $checkst = $stmodel->where('st_email', $logstemail)->findAll();

        if (count($checks) == 1) {
            $data = $smodel->set('s_password', $logspass["s_password"])->where('s_email', $logsmail)->update();
            if ($data) {
                $response = [

                    'message' =>  'suscess'
                ];


                return $this->respond($response);
            }
        } elseif (count($checkst) == 1) {
            $data = $stmodel->set('st_password', $logstpass["st_password"])->where('st_email', $logstemail)->update();
            if ($data) {
                $response = [

                    'message' =>  'suscess'
                ];


                return $this->respond($response);
            }
        } else {

            $response = [

                'message' =>  'fail'
            ];
            return $this->respond($response);
        }
    }
}
