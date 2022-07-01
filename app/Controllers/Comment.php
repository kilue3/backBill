<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CommentModel;
use ResourceBundle;
use App\Models\MshModel;
use App\Models\Shmodel;
use App\Models\AnscomeModel;

class Comment extends ResourceController
{
    use ResponseTrait;
    //get all comment
    public function index()
    {
        $model = new CommentModel();
        $data = $model->orderBy('Cm_time', 'DESC')->limit(5)->findAll();
        return $this->respond($data);
    }




    //insert new comment
    public function createcomment()
    {
        $model = new CommentModel();
        $Mmodel = new MshModel();
        $SSmodel = new Shmodel();

        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');
        $data = [
            "user_id" => $this->request->getVar('user_id'),
            "cm_dt" => $this->request->getVar('cm_dt'),
            "sch_id" => $this->request->getVar('ssch_id'),
            "Cm_Time" => $myTime

        ];
        $checkM = $Mmodel->where('msch_id', $data['sch_id'])->findAll();
        $checkSm =  $SSmodel->where('ssch_id', $data['sch_id'])->findAll();
        if (count($checkM) == 1) {
            $check = $model->insert($data);

            $response = [

                'message' => 'success',
                'because' => 'มีทุนหลักนี้อยู่'

            ];
            return $this->respond($response);
        } else if (count($checkSm) == 1) {
            $check = $model->insert($data);

            $response = [

                'message' => 'success',
                'because' => 'มีทุนรองนี้อยู่นี้อยู่'

            ];
            return $this->respond($response);
        } else {
            $response = [

                'message' => 'fail',
                'because' => 'ไม่มีทุนที่ต้องการคอมเมนต์'

            ];
            return $this->respond($response);
        }
    }
   
    ////////////////////////////ShowcommentStaff///////////////////////////////////////////
    public function Showcomment($id = null)
    {
        $model = new CommentModel();


        $checks = $model->where('sch_id', $id)->join('staff_table', 'st_id =user_id ', 'left')
            ->join('student_table', 's_id = user_id ', 'left')->
            orderBy('Cm_time', 'DESC')->limit(8)->find();
        if ($checks) {

            return $this->respond($checks);
        } else {
            return $this->respond($checks);
        }
    }
    ///////////////////delect////////////////////
    public function delectComment($id = null)
    {

        $model = new CommentModel();
        $data = $model->where('cm_id', $id)->findAll();
        if ($data) {
            $model->where('cm_id', $id)->delete();
            $response = [
                'status' => 201,
                'error' => null,
                'message' => [
                    'success' => 'comment delect successfully'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No Comment ID');
        }
    }
    // //update comment//////////////////
    public function updateComment($id = null)
    {
        $model = new CommentModel();

        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');
        $data = [
            "cm_dt" => $this->request->getVar('cm_dt'),
            "Cm_Time" => $myTime
        ];
        // by primary
        $check = $model->where('cm_id', $id)->findAll();
        if (count($check) == 1) {
            $model->update($id, $data);
            $response = [
                'message' =>   'success'
            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' =>  'not found comment'
            ];
            return $this->respond($response);
        }
    }
    //////////////////SHOWALL///////////////////////
    public function ShowcommentAll($id = null)
    {
        $model = new CommentModel();
        $checks = $model->orderBy('Cm_time', 'DESC')->where('sch_id', $id)->join('staff_table', 'st_id =user_id ', 'left')
            ->join('student_table', 's_id = user_id ', 'left')
            ->findAll();

        if ($checks) {

            return $this->respond($checks);
        } else {
            return $this->respond($checks);
        }
    }
}
