<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;

use ResourceBundle;

class Userlist extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
        $umodel = new StaffModel();
        $data = $umodel->orderBy('st_id', 'DESC')->findAll();
        return $this->respond($data);
    }
    public function ListUserByclass($classroom = null)

    {
        $model = new StudentModel();
        $checks = $model->where('s_class', $classroom)->findAll();

        return $this->respond($checks);
    }


    public function UpuserClass($id = null)
    {
        $model = new StudentModel();

        $data = $id + '1';

        $model->set('s_class', $data)->where('s_class', $id)->update();

        if ($model) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }
}
