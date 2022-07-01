<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MshModel;
use App\Models\Shmodel;
use ResourceBundle;

class Subscholar extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
        $model = new Shmodel();
        $data = $model->orderBy('ssch_id', 'DESC')->findAll();
        return $this->respond($data);
    }

    ////////////////ทุนใกล้หมดอายุ/////////////
    public function scholarend()
    {
        $model = new Shmodel();
        $data = $model->orderBy('ssch_dclose', 'ASC')->limit(5)->find();
        return $this->respond($data);
    }
    ///////////////////หมดอายุวันนี้//////////////
    public function scholarendtoday()
    {
        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d');
        $model = new Shmodel();
        $data = $model->where('ssch_dclose', $myTime)->findAll();
        return $this->respond($data);
    }
    //insert new scholar////////
    public function create()
    {
        $Shmodel = new Shmodel();


        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');
        $characters = '0123456789';
        $length = 8;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $data = [
            "ssch_id" => "sch" . $randomString,
            "ssch_name" => $this->request->getVar('ssch_name'),
            "ssch_detail" => $this->request->getVar('ssch_detail'),
            "ssch_budget" => $this->request->getVar('ssch_budget'),
            "ssch_amount" => $this->request->getVar('ssch_amount'),
            "ssch_note" => $this->request->getVar('ssch_note'),
            "ssch_dopen" => $this->request->getVar('ssch_dopen'),
            "ssch_dclose" => $this->request->getVar('ssch_dclose'),
            "ssch_web" => $this->request->getVar('ssch_web'),
            "ssch_file" => $this->request->getVar('ssch_file'),
            "mainsch_id" => $this->request->getVar('mainsch_id'),
            "ssch_file" => $this->request->getVar('ssch_file'),

            "by_st_id" => $this->request->getVar('by_st_id'),
            "timeadd" =>    $myTime


        ];


        $checks = $Shmodel->where('ssch_name', $data['ssch_name'])->first();



        if ($checks === null) {

            $Shmodel->insert($data);
            $checkmsch = $Shmodel->where('ssch_name', $data['ssch_name'])->first();
            foreach ($checkmsch as $row) {
            }
            $response = ['message'  => 'success'];

            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
    //////////////////////////////////////////////////////////
    public function getSchobyID($id = null)

    {
        $model = new Shmodel();

        $checks = $model->where('mainsch_id', $id)->findAll();
        foreach ($checks as $row) {
            $id = $row['ssch_id'];
            $content = $row['ssch_detail'];
            $name = $row['ssch_name'];
        }
        $response = [
            'id' => $id,
            'name' => $name,
            'content' => $content,
            'message'  => 'success'
        ];
        return $this->respond($checks);
    }
    ////////////////////////////////////////////////////////////
    public function getSpagechobyID($id = null)

    {
        $model = new Shmodel();

        $checks = $model->where('ssch_id', $id)->findAll();
        foreach ($checks as $row) {
            $id = $row['ssch_id'];
            $content = $row['ssch_detail'];
            $name = $row['ssch_name'];
            $opday = $row['ssch_dopen'];
            $edday = $row['ssch_dclose'];
            $web = $row['ssch_web'];
            $badget = $row['ssch_budget'];
            $note = $row['ssch_note'];

            $badgetfor1 = $row['Budget_per_capital'];
            $amount = $row['ssch_amount'];
            $mid = $row['mainsch_id'];
            $file = $row['ssch_file'];
        }
        $response = [
            'id' => $id,
            'name' => $name,
            'content' => $content,
            'note' => $note,
            'opday' => $opday,
            'edday' => $edday,
            'web' => $web,
            'badget' => $badget,
            'badgetfor1' => $badgetfor1,
            'amount' => $amount,
            'mid' => $mid,
            'file' => $file,
            'message'  => 'success'
        ];
        return $this->respond($response);
    }
    
    public function delectSubScholar($id = null)
    {
        $model = new Shmodel();
        $data = $model->where('ssch_id', $id)->findAll();
        if (count($data) == 1) {
            $model->where('ssch_id', $id)->delete();
            $response = [
                'status' => 201,
                'error' => null,
                'message' =>
                'success'
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No subscholar ID');
        }
    }

    public function Shedit($id = null)
    {
        $model = new Shmodel();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');
        $data = [
            "ssch_name" => $this->request->getVar('ssch_name'),
            "ssch_detail" => $this->request->getVar('ssch_detail'),
            "ssch_budget" => $this->request->getVar('ssch_budget'),
            "ssch_amount" => $this->request->getVar('ssch_amount'),
            "ssch_notes" => $this->request->getVar('ssch_notes'),
            "ssch_dopen" => $this->request->getVar('ssch_dopen'),
            "ssch_dclose" => $this->request->getVar('ssch_dclose'),
            "ssch_web" => $this->request->getVar('ssch_web'),
            // "ssch_file" => $this->request->getVar('ssch_file'),
            // // "msch_id" => $this->request->getVar('msch_id'),
            // "ssch_file" => $this->request->getVar('ssch_file'),

            "by_st_id" => $this->request->getVar('by_st_id'),
            "timeadd" =>    $myTime


        ];


        // $checks = $model->where('ssch_id', $data['ssch_id'])->findAll();
        // if (count($checks) == null) { 
        //     $response = ['message'  => 'duplicate'];
        //     return $this->respond($response);
        // } else {
        //     ///update
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

    // public function search()
    // {
    //     $model = new Shmodel();
    //     if($this->request->getGet('q')){
    //         $q=$this->request->getGet('q');
    //         $data=$model->like('ssch_name',$q);
    //     } else{
    //         $data=$model->getAll();
    //     }

    //     $response = ['message' => 'fail'];
    //             return $this->respond($data);
    // }

    public function Sheditfile($id = null)
    {
        $model = new Shmodel();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');
        $data = [
            
            "ssch_file" => $this->request->getVar('ssch_file'),

            "by_st_id" => $this->request->getVar('by_st_id'),
            "timeadd" =>    $myTime


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

    public function search()

    {
        $model = new Shmodel();


        $q = $this->request->getGet('q');
        $checks = $model->like('ssch_name', $q)->findAll();

        return $this->respond($checks);
    }
}
