<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MshModel;
use App\Models\ScholarTypeModel;

use ResourceBundle;


class ScholarType extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()

    {

        $model = new ScholarTypeModel();
        $data = $model->orderBy('type_id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $Msmodel = new ScholarTypeModel();
        $data = [

            "sch_typename" => $this->request->getVar('sch_typename'),
        ];

        $checks = $Msmodel->where('sch_typename', $data['sch_typename'])->first();
        if ($checks === null) {

            $Msmodel->insert($data);

            $response = ['message'  => 'success'];

            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
    public function delectScholarType($id = null)
    {

        $Msmodel = new ScholarTypeModel();
        $data = $Msmodel->where('type_id', $id)->findAll();
        if (count($data) == 1) {
            try {
                $Msmodel->where('type_id', $id)->delete();
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
            return $this->failNotFound('No schtype ID');
        }
    }
    public function search()

    {
        $model =  new ScholarTypeModel();


        $q = $this->request->getGet('q');
        $checks = $model->like('sch_typename', $q)->findAll();

        return $this->respond($checks);
    }
}
