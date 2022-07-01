<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MshModel;
use App\Models\AgenModel;
use App\Models\ScholarTypeModel;

use App\Models\New5ScholarModel;

use ResourceBundle;


class Mshcholarship extends ResourceController
{
    use ResponseTrait;
    //get new5  scholar//////////
    public function index()
    {
        $model = new Mshmodel();
        $data = $model->orderBy('timeadd', 'DESC')->limit(4)->find();
        return $this->respond($data);
    }
    /////////////get All Scholar/////////////
    public function getAllscholar()
    {
        $model = new Mshmodel();
        $data = $model->orderBy('timeadd', 'DESC')->findAll();
        return $this->respond($data);
    }
   
    /////////////join username
    public function MscholarAndUsername()
    {
        $model = new Mshmodel();
        $data = $model->orderBy('msch_id', 'DESC')->join('staff_table', 'st_id = addby')->findAll();
        return $this->respond($data);
    }
    ////////get by id/////////////////////
    public function getMbyID($id = null)
    {
        $model = new Mshmodel();
        $amodel = new AgenModel();
        $tmodel = new ScholarTypeModel();

        $checks = $model->where('msch_id', $id)->findAll();
        if (count($checks) == 1) {
            foreach ($checks as $row) {
                $id = $row['msch_id'];
                $content = $row['msch_detail'];
                $name = $row['msch_name'];
                $year = $row['msch_year'];
                $type_id = $row['sch_type_id'];
                $ag_id = $row['ag_id'];
                $m_img = $row['m_img'];

            }
            $checka = $amodel->where('agen_id', $ag_id)->findAll();
            $checkt = $tmodel->where('type_id', $type_id)->findAll();
            foreach ($checka as $row) {
                $aid = $row['agen_id'];
                $aname = $row['agen_name'];
            }
            foreach ($checkt as $row) {
                $Tid = $row['type_id'];
                $Tname = $row['sch_typename'];
            }
            $response = [
                'id' => $id,
                'name' => $name,
                'content' => $content,
                'year' => $year,
                'aname' => $aname,
                'Tname' => $Tname,
                'ag' => $ag_id,
                'type' =>  $type_id,
                'm_img'=> $m_img,
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
    ////////////////////find Name////////////////////////////
    // public function getMbyName()

    // {
    //     $model = new Mshmodel();
    //     $name =  $this->request->getVar('msch_name');


    //     $checks = $model->where('msch_name', $name)->findAll();
    //     if (count($checks) == 1) {
    //         foreach ($checks as $row) {
    //             $id = $row['msch_id'];
    //             $name = $row['msch_name'];
    //         }
    //         $response = [
    //             'id' => $id,
    //             'name' => $name,
    //             'data' => $checks,
    //             'message'  => 'success'
    //         ];
    //         return $this->respond($response);
    //     } else {
    //         $response = [

    //             'message'  => 'fail'
    //         ];
    //         return $this->respond($response);
    //     }
    // }

    ///////////////////create mscholar//////////////////
    public function create()
    {
        $Msmodel = new Mshmodel();

        date_default_timezone_set("Asia/bangkok");

        $myTime = date('Y-m-d H:i:s');

        $characters = '0123456789';
        $length = 8;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $data = [
            "msch_id" => 'ms' . $randomString,
            "msch_name" => $this->request->getVar('msch_name'),
            "msch_detail" => $this->request->getVar('msch_detail'),
            "sch_type_id" => $this->request->getVar('sch_type_id'),
            "ag_id" => $this->request->getVar('ag_id'),
            "msch_year" => $this->request->getVar('yearbudged'),
            "m_img" => $this->request->getVar('m_img'),
            "timeadd" => $myTime,
            "addby" => $this->request->getVar('addby'),
        ];
    
        $checks = $Msmodel->where('msch_name', $data['msch_name'])->first();



        if ($checks === null) {

            $Msmodel->insert($data);
          

            $checkmsch = $Msmodel->where('msch_name', $data['msch_name'])->findAll();
            foreach ($checkmsch as $row) {
                $id = $row['msch_id'];

                $name = $row['msch_name'];
            }

            $response = [
                'id' => $id,

                'message'  => 'success'
            ];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
    }


    public function Medit($id = null)
    {
        $Msmodel = new Mshmodel();
        $amodel = new AgenModel();
        $tmodel = new ScholarTypeModel();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');
        $data = [

            "msch_name" => $this->request->getVar('msch_name'),
            "msch_detail" => $this->request->getVar('msch_detail'),
            "msch_year" => $this->request->getVar('msch_year'),
            "type_id" => $this->request->getVar('sch_type_id'),
            "ag_id" => $this->request->getVar('ag_id'),
            "EditBy" => $this->request->getVar('EditBy'),
            "lastupdate" => $myTime
        ];
        $checkag = $amodel->where('agen_id', $data['ag_id'])->findAll();
        $checkty = $tmodel->where('type_id', $data['type_id'])->findAll();
        if (count($checkag) == 1 || count($checkty) == 1) {
            $checks = $Msmodel->where('msch_name', $data['msch_name'])->findAll();
            if (count($checks) == 1) { ///เช็คชื่อซ้ำ
                $response = ['message'  => 'duplicate'];
                return $this->respond($response);
            } else {
                ///update
                $Msmodel->update($id, $data);
                if ($Msmodel) {
                    $response = ['message'  => 'success'];
                    return $this->respond($response);
                } else {
                    $response = ['message' => 'fail'];
                    return $this->respond($response);
                }
            }
        } else {
            $response = ['message'  => 'error'];
            return $this->respond($response);
        }
    }

    
    ////////////edit img scholar///////////////////
    public function editimg($id = null)
    {
        $Msmodel = new Mshmodel();
    
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');
        $data = [
            "m_img" => $this->request->getVar('m_img'),
            "EditBy" => $this->request->getVar('id'),
            "lastupdate" => $myTime
        ];
        $Msmodel->update($id, $data);
        if ($Msmodel) {
            $response = ['message'  => 'success'];
            return $this->respond($response);
        } else {
            $response = ['message' => 'fail'];
            return $this->respond($response);
        }
      }

   ////// ///delect/////////////
    public function Delect_Mscholar($id = null)
    {

        $Msmodel = new Mshmodel();
        $data = $Msmodel->where('msch_id', $id)->findAll();
        if (count($data) == 1) {
            $Msmodel->where('msch_id', $id)->delete();
            $response = [

                'message' =>  'success'
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('No Mscholar ID');
        }
    }
    //////////listname_scholar_by_agen///////
    public function FindbyAgenname($id = null)
    {

        $Msmodel = new Mshmodel();
        $data = $Msmodel->where('ag_id', $id)->join('agency', '	agen_id  =	ag_id  ', 'left')->findAll();
        if ($data) {
            foreach ($data as $row) {
            
                $agname = $row['agen_name'];

            }

            $response = [
                'agname'=> $agname,
                'data'=> $data
            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' =>'fail'

            ];
            return $this->respond($response);
        }
    }
     //////////listname_scholar_by_Type///////
     public function FindbyTypename($id = null)
     {
 
         $Msmodel = new Mshmodel();
         $data = $Msmodel->where('sch_type_id', $id)->join('sch_type', '	type_id  =	sch_type_id  ', 'left')->findAll();
         if ($data) {
             foreach ($data as $row) {
             
                 $Tname = $row['sch_typename'];
 
             }
 
             $response = [
                 'Tname'=> $Tname,
                 'data'=> $data
             ];
             return $this->respond($response);
         } else {
             $response = [
                 'message' => 'fail'
 
             ];
             return $this->respond($response);
         }
     }

        //////////listname_scholar_by_Year///////
        public function FindbyYear($id = null)
        {
    
            $Msmodel = new Mshmodel();
            $data = $Msmodel->where('msch_year', $id)->findAll();
            if ($data) {
                foreach ($data as $row) {
                
                    $year = $row['msch_year'];
    
                }
            
               
                return $this->respond($data);
            } else {
                $response = [
                    'message' => 'fail'
    
                ];
                return $this->respond($response);
            }
        }
        public function list_Year()
        {
    
            $Msmodel = new Mshmodel();
            $data = $Msmodel->distinct('msch_year')->select('msch_year')->findAll();
            if ($data) {  
                return $this->respond($data);
            } else {
                $response = [
                    'message' => 'fail'
    
               ];
                return $this->respond($response);
            }
        }
        public function search()

        {
            $model = new Mshmodel();
    
    
            $q = $this->request->getGet('q');
            $checks = $model->like('msch_name', $q)->findAll();
    
            return $this->respond($checks);
        }

public function search_year()

        {
            $model = new Mshmodel();
    
    
            $q = $this->request->getGet('q');
          //   $checks = $model->like('msch_year', $q)->findAll();
            $checks = $model->distinct('msch_year')->select('msch_year')->like('msch_year', $q)->findAll();
            return $this->respond($checks);
        }
}
