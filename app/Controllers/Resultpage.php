<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MshModel;
use App\Models\Resultscholar;

use ResourceBundle;


class Resultpage extends ResourceController
{
    use ResponseTrait;
    //get all product

    public function index()

    {

        $model = new Resultscholar();
        $data = $model->orderBy('adate', 'DESC')->limit(5)->find();
        return $this->respond($data);
    }

    public function allResult()

    {

        $model = new Resultscholar();
        $data = $model->orderBy('adate', 'DESC')->find();
        return $this->respond($data);
    }
    public function create()
    {
        $Msmodel = new Mshmodel();
        $model = new Resultscholar();

        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');

        $characters = '0123456789';
        $length = 8;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $data = [
            "result_id" => 're' . $randomString,
            "result_name" => $this->request->getVar('result_name'),
            "result_detail" => $this->request->getVar('result_detail'),
            // "msch_year" => $this->request->getVar('msch_year'),
            // "file" => $this->request->getVar('file'),
            "main_scholar_id" => $this->request->getVar('main_scholar_id'),
            "adate" => $myTime,
            "addby" => $this->request->getVar('addby'),



        ];

        $checks = $model->where('result_name', $data['result_name'])->first();



        if ($checks === null) {

            $model->insert($data);

            $response = [


                'message'  => 'success'
            ];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
    public function getResultbyID($id = null)
    {
        $model = new Resultscholar();


        $checks = $model->where('result_id', $id)->findAll();
        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['result_id'];
                $content = $row['result_detail'];
                $name = $row['result_name'];
                $namescholar = $row['main_scholar_id'];
                $file = $row['file'];
            }
            $response = [
                'id' => $id,
                'name' => $name,
                'content' => $content,
                'namescholar' => $namescholar,
                'file' => $file,
                'message'  => 'success'
            ];
            return $this->respond($response);
        } else {
            $response = [

                'message'  => 'ไม่พบไอดีนี้'
            ];
            return $this->respond($response);
        }
    }
    public function ResultAndUsername()
    {
        $model = new Resultscholar();
        $data = $model->orderBy('adate', 'DESC')->join('staff_table', 'st_id = addby')->findAll();
        return $this->respond($data);
    }


    public function getResultpage_byID($id = null)

    {
        $model = new Resultscholar();

        $checks = $model->where('result_id', $id)->findAll();


        return $this->respond($checks);
    }

    public function editresult($id = null)
    {
        $model = new Resultscholar();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');

        $data = [
            "result_name" => $this->request->getVar('result_name'),
            "result_detail" => $this->request->getVar('result_detail'),
            // "msch_year" => $this->request->getVar('msch_year'),
            "file" => $this->request->getVar('file'),
            "main_scholar_id" => $this->request->getVar('main_scholar_id'),
            "adate" => $myTime,
            "addby" => $this->request->getVar('addby'),


        ];


        // $checks = $model->where('result_name', $data['result_name'])->findAll();
        // if (count($checks) == 1) { ///เช็คชื่อซ้ำ
        //     $response = ['message'  => 'duplicate'];
        //     return $this->respond($response);
        // } else {
        ///update
        $model->update($id, $data);
        if ($model) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
        // }
    }



    public function resultfile($id = null)
    {
        $model = new Resultscholar();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');

        $data = [

            "file" => $this->request->getVar('file'),

            "adate" => $myTime,
            "addby" => $this->request->getVar('addby'),


        ];


        ///update
        $model->update($id, $data);
        if ($model) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }



    public function delectresult($id = null)
    {
        $model = new Resultscholar();
        $data = $model->where('result_id', $id)->findAll();
        if (count($data) == 1) {
            $model->where('result_id', $id)->delete();
            $response = [
                'status' => 201,
                'error' => null,
                'message' =>
                'success'
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No result ID');
        }
    }
}
