<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\BillModel;
use App\Models\BilladdModel;


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


    public function selectToday()
    {
           $umodel = new BillModel();
           $checkdate = $umodel->findAll();
   
           foreach ( $checkdate as $row ) {
   
               $days = $row['bill_end_date'];
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
            $response = [ 'message' => 'intime' ];
            return $this->respond( $response );
        }
        elseif($data['bill_op_date']<=$eddate){
            $response = [ 'message' => 'intime' ];
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

       //////////////////////addbill/////////////////////
       public function Addbill()
       {
              $umodel = new BilladdModel();
              date_default_timezone_set("Asia/bangkok");
              $myTime = date('Y-m-d H:i:s');
             
              $data = [
                  'bill_id' => $this->request->getVar( 'bill_id' ),
                  'bill_amount' => $this->request->getVar( 'number' ),
                  'bill_detail' => $this->request->getVar( 'bill_detail' ),
                  'store_id' => $this->request->getVar( 'store_id' ),
                  'bill_op_time' => $myTime,
                  'bill_status' => "wait",
              ];
              //   return $this->respond( $data );
              $checkuser = $umodel->where( 'bill_id', $data[ 'bill_id' ] )->findAll();
              if ( count( $checkuser ) === 0 ) {
      
                  $umodel->insert( $data );
                    $response = [
                   
                      'message'  => 'success'
                  ];
                  return $this->respond( $response );
              } else {
                  $response = [ 'message' => 'fail' ];
                  return $this->respond( $response );
              }
              //
      
          }
          public function Billative($id = null)
          {
                 $umodel = new BilladdModel();
                 
                 $bill = $umodel->where( 'bill_status','wait' )->findAll();
                //  foreach ( $bill as $row ) {

                //     $bid = $row[ 'bill_id' ];
                //     $amount = $row[ 'bill_amount' ];
                //     $detail = $row[ 'bill_detail' ];
                //     $billtime = $row[ 'bill_op_time' ];
                //     $billstatus = $row[ 'bill_status' ];

                // }
                //  $response = [
                   
                //     'message'  => 'success',
                //     'id'  => $bid,
                //     'amount'  => $amount,
                //     'detail'  => $detail,
                //     'billtime'  => $billtime,
                //     'billstatus'  => $billstatus,

                // ];
                     return $this->respond($bill);
            
         
             }
}
