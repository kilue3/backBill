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
        $umodel->select(' DAY(bill_END_date) AS Days');
        $checkdate = $umodel->findAll();

        foreach ( $checkdate as $row ) {

            $days = $row['Days'];
        }
        $response = [ 'Days' => $days ];
        return $this->respond( $response );

    }

    public function openbill()
 {
        $umodel = new BillModel();
        $data = [
            'bill_op_date' => $this->request->getVar( 'opdate' ),
            'bill_end_date' => $this->request->getVar( 'enddate' ),
        ];

        if ( $data[ 'bill_end_date' ] == '0000-00-00' ) {
            $response = [ 'message' => 'fail' ];
            return $this->respond( $response );

        } else {
            $umodel->insert( $data );
            $response = [ 'message' => 'success' ];
            return $this->respond( $response );
        }

    }

    public function checkDate()
 {
        $umodel = new BillModel();
        date_default_timezone_set("Asia/bangkok");
        $myTime = date('Y-m-d H:i:s');
      
        $data = [
            'bill_op_date' => $this->request->getVar( 'date' ),
        ];
        $checkdate = $umodel->orderBy( 'bill_op_id', 'DESC' )->limit( 1 )->find();
        foreach ( $checkdate as $row ) {

            $opdate = $row[ 'bill_op_date' ];
            $eddate = $row[ 'bill_end_date' ];
        }
        // $response = [ 'opdate' => $opdate,
        //              'eddate'=>$eddate ];
        //              return $this->respond( $response );
     
     if ( $data['bill_op_date']<$opdate ) {
            $response = [ 'message' => 'ahead_of_time' ];
            return $this->respond( $response );

        } elseif ($data['bill_op_date']>$eddate ) {
            $response = [ 'message' => 'overtime' ];
            return $this->respond( $response );
        }
        elseif($data['bill_op_date']>=$opdate){
            $response = [ 'message' => 'intime1' ];
            return $this->respond( $response );
        }
        elseif($data['bill_op_date']<=$eddate){
            $response = [ 'message' => 'intime1' ];
            return $this->respond( $response );
        }
       

    }
    public function updateEndbill()
    {
           $umodel = new BillModel();
           $data = [
               'bill_op_date' => $this->request->getVar( 'opdate' ),
               'bill_end_date' => $this->request->getVar( 'enddate' ),
           ];
   
           if ( $data[ 'bill_end_date' ] == '0000-00-00' ) {
               $response = [ 'message' => 'fail' ];
               return $this->respond( $response );
   
           } else {
            $id = '35';
               $umodel->update($id,$data);
               $response = [ 'message' => 'success' ];
               return $this->respond( $response );
           }
   
       }
    
}
