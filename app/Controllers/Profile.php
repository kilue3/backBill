<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;

use ResourceBundle;

class Profile extends ResourceController
{

    use ResponseTrait;
    //get all product
    public function student($id = null)
    {
        $smodel = new StudentModel();

        $checks = $smodel->where("s_id", $id)->findAll();

        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['s_id'];
                $fname = $row['s_fname'];
                $lname = $row['s_lname'];
                $email = $row['s_email'];
                $tel = $row['s_tel'];
                $class = $row['s_class'];
                $img = $row['s_img'];
                $grade = $row['grade'];
                $title = $row['s_title'];
            }
            $response = [
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'tel' => $tel,
                'class' => $class,
                'img' => $img,
                'grade' => $grade,
                'title' => $title,

            ];
            return $this->respond($response);
        } else {
            $response = [
                'id' =>
                $id,
                'message' =>  'fail S'
            ];
            return $this->respond($response);
        }
    }
    public function staffprofiles($id = null)
    {
        $smodel = new StaffModel();

        $checks = $smodel->where("st_id", $id)->findAll();
        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['st_id'];
                $fname = $row['st_fname'];
                $lname = $row['st_lname'];
                $email = $row['st_email'];
                $tel = $row['st_tel'];
                $img = $row['st_img'];
                $title = $row['st_title'];
                $status =$row['status'];
            }
            $response = [
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'tel' => $tel,
                'img' => $img,
                'title' => $title,
                'status'=> $status

            ];
            return $this->respond($response);
        } else {
            $response = [
                'id' =>
                $id,
                'message' =>  'fail T'
            ];
            return $this->respond($response);
        }
    }

    public function edit_imgStudent($id = null)
    {
        $smodel = new StudentModel();
        $data = [
            "s_img" => $this->request->getVar('img'),
        ];
        $smodel->update($id, $data);
        if ($smodel) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }

    public function edit_imgStaff($id = null)
    {
        $smodel = new StaffModel();
        $data = [
            "st_img" => $this->request->getVar('img'),
        ];
        $smodel->update($id, $data);
        if ($smodel) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }

    public function edit_infostudent($id = null)
    {
        $smodel = new StudentModel();
        $data = [
            "s_fname" => $this->request->getVar('fname'),
            "s_lname" => $this->request->getVar('lname'),
            "s_tel" => $this->request->getVar('tel'),
            "s_class" => $this->request->getVar('class'),
            "grade" => $this->request->getVar('grade'),
        ];
        $checks = $smodel->update($id, $data);
        if ($checks) {

            $response = [
                'message'  => 'success', 'data' => $id
            ];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }


    public function edit_infoStaff($id = null)
    {
        $smodel = new StaffModel();
        $data = [
            "st_fname" => $this->request->getVar('fname'),
            "st_lname" => $this->request->getVar('lname'),
            "st_tel" => $this->request->getVar('tel'),
        ];
        $smodel->update($id, $data);
        if ($smodel) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
}
