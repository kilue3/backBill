<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\NotificationsModel;
use App\Models\CommentModel;

use ResourceBundle;


class Notifications extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function selectfollow($id = null)

    {

        $model = new NotificationsModel();
        $data = $model->where('student_id', $id)->join('subsch_table', '	ssch_id  =	scholar_id  ', 'left')->findAll();
        return $this->respond($data);
    }
    public function followScholar()

    {

        $model = new NotificationsModel();
        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');
        $data = [
            "student_id" => $this->request->getVar('s_id'),
            "scholar_id" => $this->request->getVar('scholarid'),
            "fow_time" => $myTime

        ];

        $follow =   $model->insert($data);
        if ($follow) {

            $response = [

                'message'  => 'success'
            ];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
        return $this->respond($data);
    }
    public function checkfollow()

    {

        $model = new NotificationsModel();

        $data = [
            "student_id" => $this->request->getVar('sid'),
            "scholar_id" => $this->request->getVar('schid'),


        ];
        $checkid = $model->where('student_id', $data['student_id'])->where('scholar_id', $data['scholar_id'])->findAll();

        if ($checkid == null) {

            $response = [
                'mean' => 'ยังไม่มีค่ากดติดตาม',

                'message'  => 'yes'
            ];
            return $this->respond($response);
        } else {
            foreach ($checkid as $row) {
                $nid = $row['noti_id'];
            }
            $response = [
                'mean' => 'มีค่ากดติดตามแล้ว',
                'nid' => $nid,
                'message' => 'none'
            ];
            return $this->respond($response);
        }
    }
    ///delect/////////////
    public function DelectN($id = null)
    {

        $model = new NotificationsModel();
        $data = $model->where('noti_id', $id)->findAll();
        if (count($data) == 1) {
            $model->where('noti_id', $id)->delete();
            $response = [

                'message' =>  'success'
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No Mscholar ID');
        }
    }

    ////////////show commet notifly//////////////////////
    public function show_comment_noti($id = null)
    {
        $model = new NotificationsModel();
        $data = $model->where('student_id', $id)
            ->join('comment', '	scholar_id  =	 sch_id ', 'left')
            ->select('cm_id')->select('cm_dt')->select('Cm_time')
            ->where('comment.Cm_time > fow_time')->where('user_id !=', $id)
            ->join('subsch_table', '	ssch_id  =	scholar_id  ', 'left')
            ->select('ssch_id')->select('ssch_name')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->limit(5)->find();
        if ($data) {
            $response = [
                'message' => 'success',
                'data' => $data


            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
    public function show_comment_noti_all($id = null)
    {
        $model = new NotificationsModel();
        $data = $model->where('student_id', $id)
            ->join('comment', '	scholar_id  =	 sch_id ', 'left')
            ->select('cm_id')->select('cm_dt')->select('Cm_time')
            ->where('comment.Cm_time > fow_time')->where('user_id !=', $id)
            ->join('subsch_table', '	ssch_id  =	scholar_id  ', 'left')
            ->select('ssch_id')->select('ssch_name')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->findAll();
        if ($data) {

            return $this->respond($data);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
    public function show_comment_noti_staff($id = null)
    {
        $model = new CommentModel();
        $data = $model->select('cm_id')->select('cm_dt')->select('Cm_time')->where('user_id !=', $id)->like('ssch_id', 'sch')
            ->join('subsch_table', '	ssch_id  =	sch_id  ', 'left')
            ->select('ssch_id')->select('ssch_name')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->limit(5)->find();
        if ($data) {
            $response = [
                'message' => 'success',
                'data' => $data


            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
    public function show_comment_noti_staff_all($id = null)
    {
        // $model = new NotificationsModel();
        $model = new CommentModel();
        $data = $model->select('cm_id')->select('cm_dt')->select('Cm_time')->where('user_id !=', $id)->like('ssch_id', 'sch')
            ->join('subsch_table', '	ssch_id  =	sch_id  ', 'left')
            ->select('ssch_id')->select('ssch_name')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->orderBy('Cm_time', 'DESC')
            ->findAll();
        if ($data) {

            return $this->respond($data);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
    public function show_comment_noti_staff_msch($id = null)
    {
        $model = new CommentModel();
        $data = $model->select('cm_id')->select('Cm_time')->where('user_id !=', $id)->notlike('msch_id', 'sch')
            ->join('msch_table', '	msch_id  =	sch_id  ', 'left')
            ->select('msch_id')->select('msch_name')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->limit(5)->find();
        if ($data) {
            $response = [
                'message' => 'success',
                'data' => $data


            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
    public function show_comment_noti_staff_msch_all($id = null)
    {
        $model = new CommentModel();
        $data = $model->select('cm_id')->select('cm_dt')->select('Cm_time')->where('user_id !=', $id)
            ->join('msch_table', '	msch_id  =	sch_id  ', 'left')
            ->select('msch_id')->select('msch_name')->notlike('msch_id', 'sch')
            ->join('student_table', '	s_id  =	user_id  ', 'left')
            ->select('s_id')->select('s_fname')
            ->join('staff_table', '	st_id  =	user_id  ', 'left')
            ->select('st_id')->select('st_fname')
            ->orderBy('Cm_time', 'DESC')
            ->orderBy('Cm_time', 'DESC')
            ->findAll();
        if ($data) {

            return $this->respond($data);
        } else {
            $response = [
                'message' => 'fail'

            ];
            return $this->respond($response);
        }
    }
}
