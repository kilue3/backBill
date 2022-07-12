<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\BillModel;
use App\Models\BilladdModel;
use App\Models\FilebillModel;

use ResourceBundle;

class Bill extends ResourceController
 {
    use ResponseTrait;
    //get all product

    public function index()
 {
        $umodel = new BillModel();
        $umodel->select( ' DAY(bill_END_date) AS Days' );
        $checkdate = $umodel->findAll();

        foreach ( $checkdate as $row ) {

            $days = $row[ 'Days' ];
        }
        $response = [ 'Days' => $days ];
        return $this->respond( $response );

    }

    public function selectToday()
 {
        $umodel = new BillModel();
        $checkdate = $umodel->findAll();

        foreach ( $checkdate as $row ) {

            $days = $row[ 'bill_end_date' ];
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
        date_default_timezone_set( 'Asia/bangkok' );
        $myTime = date( 'Y-m-d H:i:s' );

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

        if ( $data[ 'bill_op_date' ]<$opdate ) {
            $response = [ 'message' => 'ahead_of_time' ];
            return $this->respond( $response );

        } elseif ( $data[ 'bill_op_date' ]>$eddate ) {
            $response = [ 'message' => 'overtime' ];
            return $this->respond( $response );
        } elseif ( $data[ 'bill_op_date' ] >= $opdate ) {
            $response = [ 'message' => 'intime' ];
            return $this->respond( $response );
        } elseif ( $data[ 'bill_op_date' ] <= $eddate ) {
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
            $umodel->update( $id, $data );
            $response = [ 'message' => 'success' ];
            return $this->respond( $response );
        }

    }

    //////////////////////addbill/////////////////////

    public function Addbill()
 {
        $umodel = new BilladdModel();
        date_default_timezone_set( 'Asia/bangkok' );
        $myTime = date( 'Y-m-d H:i:s' );

        $data = [
            'bill_id' => $this->request->getVar( 'bill_id' ),
            'bill_amount' => $this->request->getVar( 'number' ),
            'bill_detail' => $this->request->getVar( 'bill_detail' ),
            'store_id' => $this->request->getVar( 'store_id' ),
            'bill_op_time' => $myTime,
            'bill_status' => 'wait',
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

    public function Billative( $id = null )
 {
        $umodel = new BilladdModel();

        $bill = $umodel->where( 'bill_status', 'wait' )->findAll();
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
        return $this->respond( $bill );

    }

    public function findBillop( $id = null )
 {
        $umodel = new BilladdModel();
        $data = $umodel->where( 'bill_id', $id )->findAll();
        if ( count( $data ) === 1 ) {
            foreach ( $data as $row ) {
                $id = $row[ 'bill_id' ];
                $amount = $row[ 'bill_amount' ];
                $billDetail = $row[ 'bill_detail' ];
                $store_id = $row[ 'store_id' ];
                $bill_op_time = $row[ 'bill_op_time' ];
                $billstatus = $row[ 'bill_status' ];

            }
            $response = [
                'message' =>  'success',
                'store_id' => $store_id,
                'amount' => $amount,
                'id' => $id,
                'billstatus' => $billstatus,
                'bill_op_time' =>  $bill_op_time,
                'billDetail' =>  $billDetail,
                // 'file_name' =>  $file_name,
                // 'file_date' =>  $file_date,
                // 'file_url' =>  $file_url,

            ];

            return $this->respond( $response );
        } else {
            $response = [
                'message' =>  'fail',

            ];

            return $this->respond( $response );
        }

    }

    public function Editamount( $id = null )
 {
        $umodel = new BilladdModel();

        $data = [
            'bill_amount' =>  $this->request->getVar( 'amount' )
        ];
        $checkbill = $umodel->where( 'bill_id', $id )->find();

        if ( count( $checkbill ) == 1 ) {
            $umodel->update( $id, $data );
            if ( $umodel ) {
                $response = [ 'message'  => 'success' ];
                return $this->respond( $response );
            } else {
                $response = [ 'message' => 'fail' ];
                return $this->respond( $response );
            }
        } else {
            $response = [ 'message' => 'notfound' ];
            return $this->respond( $response );
        }

    }

    public function Addfile( $id = null )
 {
        $umodel = new FilebillModel();
        $bmodel = new BilladdModel();

        $data = [
            'id_bill' =>  $this->request->getVar( 'bid' ),
            'file_name' =>  $this->request->getVar( 'filename' ),
            'file_url' =>  $this->request->getVar( 'fileurl' ),
            'file_date' =>  $this->request->getVar( 'filedate' )

        ];
        $checkbill = $bmodel->where( 'bill_id', $id )->findAll();

        if ( count( $checkbill ) == 1 ) {
            $umodel->insert( $data );
            if ( $umodel ) {
                $response = [ 'message'  => 'success' ];
                return $this->respond( $response );
            } else {
                $response = [ 'message' => 'fail' ];
                return $this->respond( $response );
            }
        } else {
            $response = [ 'message' => 'notfound' ];
            return $this->respond( $response );
        }

    }

    public function Listfile( $id = null )
 {
        $umodel = new FilebillModel();
        $data = $umodel->where( 'id_bill', $id )->findAll();
        if ( count( $data ) === 0 ) {
            $response = [
                'message' =>  'fail',

            ];
            return $this->respond( $response );

        } else {

            return $this->respond( $data );
        }

    }

    public function Delect_file( $id = null )
 {

        $umodel = new FilebillModel();
        $data = $umodel->where( 'id', $id )->findAll();
        if ( count( $data ) == 1 ) {
            $umodel->where( 'id', $id )->delete();
            $response = [

                'message' =>  'success'
            ];
            return $this->respond( $response );
        } else {
            return $this->failNotFound( 'No file ID' );
        }
    }

    public function Delect_bills( $id = null )
 {

        $umodel = new BilladdModel();
        $data = $umodel->where( 'bill_id', $id )->findAll();
        if ( count( $data ) == 1 ) {
            $umodel->where( 'bill_id', $id )->delete();
            $response = [

                'message' =>  'success'
            ];
            return $this->respond( $response );
        } else {
            return $this->failNotFound( 'No file ID' );
        }
    }

    public function Movefile($id = null)
 {

        $target_dir = 'C:/xampp new/htdocs/Mback/img/upload/';
        // $target_dir = 'D:/img/';

        if ( isset( $_FILES[ 'image' ][ 'name' ] ) ) {
            $target_file = $target_dir . basename( $_FILES[ 'image' ][ 'name' ] );
            $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
            if ( move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $target_file ) ) {
                $umodel = new FilebillModel();
                $bmodel = new BilladdModel();
                date_default_timezone_set( 'Asia/bangkok' );
                $myTime = date( 'Y-m-d H:i:s' );
                $data = [
                    'id_bill' =>  $id,
                    'file_name' =>  basename( $_FILES[ 'image' ][ 'name' ] ),
                    'file_url' =>  $target_file,
                    'file_date' =>  $myTime

                ];
                $checkbill = $bmodel->where( 'bill_id', $id )->findAll();

                if ( count( $checkbill ) == 1 ) {
                    $umodel->insert( $data );
                    if ( $umodel ) {
                        $response = [ 'message'  => 'success' ];
                        return $this->respond( $response );
                    } else {
                        $response = [ 'message' => 'fail' ];
                        return $this->respond( $response );
                    }
                } else {
                    $response = [ 'message' => 'notfound' ];
                    return $this->respond( $response );
                }

                echo 'The file '. basename( $_FILES[ 'image' ][ 'name' ] ),$target_file. ' has been uploaded.';
            } else {
                echo 'Sorry, there was an error uploading your file.';
            }

        } else {
            $response = [

                'message' =>  'file',
                'detail'=>'File not found.'
            ];
            return $this->respond( $response );

        }
    }

}
