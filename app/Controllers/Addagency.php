<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MshModel;
use App\Models\AgenModel;

use ResourceBundle;


class Addagency extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()

    {

        $model = new AgenModel();
        $data = $model->orderBy('agen_id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $Msmodel = new AgenModel();
        $data = [

            "agen_name" => $this->request->getVar('agen_name'),
        ];

        $checks = $Msmodel->where('agen_name', $data['agen_name'])->first();
        if ($checks === null) {

            $Msmodel->insert($data);

            $response = ['message'  => 'success'];

            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
    public function delectAgen($id = null)
    {

        $Msmodel = new AgenModel();
        $data = $Msmodel->where('agen_id', $id)->findAll();
        if ($data) {
            try {
                $Msmodel->where('agen_id', $id)->delete();
                $response = [
                    'message' =>    'success'

                ];
                return $this->respond($response);
            } catch (\Exception $Msmodel) {
                $response = [
                    'message' =>    'fail'

                ];
                return $this->respond($response);
            }
        } else {
            $response = [
                'message' =>    'fail'

            ];
            return $this->respond($response);
        }
    }
    public function search()

    {
        $model = new AgenModel();


        $q = $this->request->getGet('q');
        $checks = $model->like('agen_name', $q)->findAll();

        return $this->respond($checks);
    }
}
