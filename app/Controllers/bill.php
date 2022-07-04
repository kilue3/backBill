<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\BillModel;

use ResourceBundle;

class Bill extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
        $umodel = new BillModel();

       
        $checkuser = $umodel->findAll();
       


            return $this->respond($checkuser); 
        
    }
    
    public function openbill()
    {
           $umodel = new BillModel();
           $data = [
               'bill_op_date' => $this->request->getVar( 'opdate' ),
               'bill_end_date' => $this->request->getVar( 'enddate' ),
           ];
        
        if($data['bill_end_date']=="0000-00-00"){
            $response = ['message' => 'fail'];
            return $this->respond($response);
          
        }else{
            $umodel->insert( $data );
            $response = ['message' => 'success'];
            return $this->respond($response);
        }
          
     
   
       }
   
}
