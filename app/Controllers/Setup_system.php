<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Setup_systemModel;

use ResourceBundle;


class Setup_system extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new Setup_systemModel();
        $data = $model->orderBy('sst_id', 'DESC')->findAll();
        return $this->respond($data);
    }




    public function create()
    {
        $model = new Setup_systemModel();


        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');
        $characters = '0123456789';
        $length = 8;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $data = [ 
            "sst_id" => "sst" . $randomString,
            "sst_logo" => $this->request->getVar('sst_logo'),
            "sst_name" => $this->request->getVar('sst_name'),
            "sst_by" => $this->request->getVar('sst_by'),
            


        ];


        $checks = $model->where('sst_name', $data['sst_name'])->first();



        if ($checks === null) {

            $model->insert($data);
            $checkmsch = $model->where('sst_name', $data['sst_name'])->first();
            foreach ($checkmsch as $row) {
            }
            $response = ['message'  => 'success'];

            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }




    public function edit($id = null)
    {
         $model = new Setup_systemModel();


        // date_default_timezone_set("Asia/bangkok");

        // $myTime = date('Y-m-d H:i:s');
        // $characters = '0123456789';
        // $length = 8;
        // $randomString = '';
        // for ($i = 0; $i < $length; $i++) {
        //     $randomString .= $characters[rand(0, strlen($characters) - 1)];
        // }
        $data = [ 
            // "sst_id" => "sst" . $randomString,
            // "sst_wallpaper" => $this->request->getVar('sst_wallpaper'),
            "sst_name" => $this->request->getVar('sst_name'),
            "sst_by" => $this->request->getVar('sst_by'),
        ];
        $checks = $model->where('sst_by', $data['sst_by'])->findAll();

        if (count($checks) == null) { 
            $response = ['message'  => 'duplicate'];
            return $this->respond($response);
        } else {
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
    }

    public function delect($id = null)
    {
        $model = new Setup_systemModel();
        $data = $model->where('sst_id', $id)->findAll();
        if (count($data) ) {
            $model->where('sst_id', $id)->delete();
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
    public function editimg($id = null)
    {
        $model = new Setup_systemModel();
    

        $data = [
            "sst_logo" => $this->request->getVar('sst_logo'),
      
            "sst_by" => $this->request->getVar('sst_by'),
        ];
        $model->update($id, $data);
        if ($model) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
      }
      public function getID($id = null)

      {
        $model = new Setup_systemModel();
  
    //       $checks = $model->where('sst_id', $id)->findAll();
    //       foreach ($checks as $row) {
    //           $id = $row['sst_id'];
    //           $content = $row['sst_wallpaper'];
    //           $name = $row['sst_name'];
    //       }
    //       $response = [
    //           'id' => $id,
    //           'name' => $name,
    //           'content' => $content,
    //           'message'  => 'success'
    //       ];
    //       return $this->respond($checks);
    //   }
      $checks = $model->where('sst_id', $id)->findAll();
        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['sst_id'];
              $content = $row['sst_logo'];
              $name = $row['sst_name'];
            }
           
            $response = [
                'id' => $id,
              'name' => $name,
              'content' => $content,
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
}