<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Setup_slideModel;

use ResourceBundle;


class Setup_slide extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new Setup_slideModel();
        $data = $model->orderBy('ssd_id', 'DESC')->findAll();
        return $this->respond($data);
    }




    public function create()
    {
        $model = new Setup_slideModel();


        

        
        $characters = '0123456789';
        $length = 8;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $data = [ 
            "ssd_id" => "sst" . $randomString,
            "ssd_slide" => $this->request->getVar('ssd_slide'),
            "ssd_name" => $this->request->getVar('ssd_name'),
            "ssd_by" => $this->request->getVar('ssd_by'),


        ];


        $checks = $model->where('ssd_name', $data['ssd_name'])->first();



        if ($checks === null) {

            $model->insert($data);
            $checkmsch = $model->where('ssd_name', $data['ssd_name'])->first();
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
        $model = new Setup_slideModel();


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
       

            "ssd_name" => $this->request->getVar('ssd_name'),
            "ssd_by" => $this->request->getVar('ssd_by'),
        ];
        $checks = $model->where('ssd_name', $data['ssd_name'])->findAll();

        // if (count($checks) == null) { 
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
        
    }



    public function editimg($id = null)
    {
        $model = new Setup_slideModel();
    

        $data = [
            "ssd_slide" => $this->request->getVar('ssd_slide'),
     
            "ssd_by" => $this->request->getVar('ssd_by'),
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


    public function delect($id = null)
    {
        $model = new Setup_slideModel();
        $data = $model->where('ssd_id', $id)->findAll();
        if (count($data) ) {
            $model->where('ssd_id', $id)->delete();
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

    public function getID($id = null)

    {
        $model = new Setup_slideModel();

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
    $checks = $model->where('ssd_id', $id)->findAll();
      if (count($checks) == 1) {
          foreach ($checks as $row) {
              $id = $row['ssd_id'];
            $content = $row['ssd_slide'];
            $name = $row['ssd_name'];
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