<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\BillModel;
use App\Models\BilladdModel;
use App\Models\FilebillModel;
use App\Models\CommentModel;


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
//     public function Billinmonth()
//  {
//     $umodel = new BilladdModel();

//     $data = [
//         'month' => $this->request->getVar( 'month' )
//     ]
//         $where ="month MONTH(bill_op_time) = '".$data['month']."'"
//         $umodel->where();
//         $checkdate = $umodel->findAll();

//         foreach ( $checkdate as $row ) {

//             $days = $row[ 'Days' ];
//         }
//         $response = [ 'Days' => $days ];
//         return $this->respond( $response );

//     }

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
            'id_store' => $this->request->getVar( 'store_id' ),
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
        //  $where1 = "id_store = '".$id."' AND bill_status ='wait' OR bill_status = 'รออนุมัติ' ";

        $where = "id_store = '".$id."' AND bill_status ='wait' OR bill_status = 'รออนุมัติ'OR bill_status = 'ไม่ผ่านการอนุมัติ' ";
        $bill = $umodel->where($where)->orderBy( 'bill_op_time', 'DESC' )->findAll();
        
        return $this->respond( $bill );

    }

    public function findBillop( $id = null )
 {
        $umodel = new BilladdModel();
        $data = $umodel->where( 'bill_id', $id )->join('store', 'Store_id = id_store ', 'left')->findAll();
        if ( count( $data ) === 1 ) {
            foreach ( $data as $row ) {
                $id = $row[ 'bill_id' ];
                $amount = $row[ 'bill_amount' ];
                $billDetail = $row[ 'bill_detail' ];
                $store_id = $row[ 'id_store' ];
                $bill_op_time = $row[ 'bill_op_time' ];
                $billstatus = $row[ 'bill_status' ];
                $storename = $row[ 'Store_name' ];

            }
            $response = [
                'message' =>  'success',
                'store_id' => $store_id,
                'amount' => $amount,
                'id' => $id,
                'billstatus' => $billstatus,
                'bill_op_time' =>  $bill_op_time,
                'billDetail' =>  $billDetail,
                'Store_name' =>  $storename,

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

    public function Editdetail( $id = null )
 {
        $umodel = new BilladdModel();

        $data = [
            'bill_detail' =>  $this->request->getVar( 'newdetail' )
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

            $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_file = $target_dir.$newfilename;
            $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
            if ( move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $target_file ) ) {
                $umodel = new FilebillModel();
                $bmodel = new BilladdModel();
                date_default_timezone_set( 'Asia/bangkok' );
                $myTime = date( 'Y-m-d H:i:s' );
                $data = [
                    'id_bill' =>  $id,
                    'file_name' =>   $newfilename,
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

    public function sendApprove( $id = null )
 {
    
        $cmodel = new CommentModel();
        $bmodel = new BilladdModel();
        date_default_timezone_set( 'Asia/bangkok' );
        $myTime = date( 'Y-m-d H:i:s' );

        $data = [
            'id_bill' =>  $this->request->getVar( 'id_bill' ),
            'cm_username' =>  $this->request->getVar('username'),
            'cm_note' =>  $this->request->getVar( 'cm_note' ),
            'cm_status' =>  $this->request->getVar( 'cm_status' ),
            'cm_time' =>  $myTime,
            

        ];
        $data2 =[
            'bill_status' =>  $this->request->getVar( 'cm_status' ),
        ];
        $checkbill = $bmodel->where( 'bill_id', $id )->findAll();

        if ( count( $checkbill ) == 1 ) {
            $bmodel->update( $id, $data2);

            $cmodel->insert( $data );
            if ( $cmodel ) {
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

    public function Approve( $id = null )
    {
       
           $cmodel = new CommentModel();
           $bmodel = new BilladdModel();
           date_default_timezone_set( 'Asia/bangkok' );
           $myTime = date( 'Y-m-d H:i:s' );
   
           $data = [
               'id_bill' =>  $this->request->getVar( 'id_bill' ),
               'cm_username' =>  $this->request->getVar('username'),
               'cm_note' =>  $this->request->getVar( 'cm_note' ),
               'cm_status' =>  $this->request->getVar( 'cm_status' ),
               'cm_time' =>  $myTime,
               
   
           ];
           $data2 =[
               'bill_status' =>  $this->request->getVar( 'cm_status' ),
           ];
           $checkbill = $bmodel->where( 'bill_id', $id )->findAll();
   
           if ( count( $checkbill ) == 1 ) {
               $bmodel->update( $id, $data2);
   
               $cmodel->insert( $data );
               if ( $cmodel ) {
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
   
    public function findCmbill( $id = null )
 {
        $umodel = new CommentModel();
        $checkcm = $umodel->where( 'id_bill', $id )->findAll();

        
        $response = [ 'message,' => 'success',
        'data,' => $checkcm,
         ];
        return $this->respond( $checkcm );

    }
    public function Billlist( )
    {
           $umodel = new BilladdModel();
            $where = "bill_status ='wait' OR bill_status = 'รออนุมัติ'OR bill_status = 'ไม่ผ่านการอนุมัติ' ";
           $bill = $umodel->where($where)->join('store', 'Store_id = id_store ', 'left')->orderBy( 'bill_id', 'DESC' )->findAll();
           if ( count( $bill ) >= 1 ) {
            return $this->respond( $bill );
        } else {
            $response = [ 'message' => 'notfound' ];
            return $this->respond( $response );
        }
           return $this->respond( $bill );
   
       }
       public function Billpasslist( )
       {
              $umodel = new BilladdModel();
               $where = "bill_status = 'อนุมัติแล้ว' ";
              $bill = $umodel->where($where)->join('store', 'Store_id = id_store ', 'left')->orderBy( 'bill_op_time', 'DESC' )->findAll();
              if ( count( $bill ) >= 1 ) {
                return $this->respond( $bill );
            } else {
                $response = [ 'message' => 'notfound' ];
                return $this->respond( $response );
            }

      
          }
          public function Billhistory( $id = null )
          {
                 $umodel = new BilladdModel();
         
                 $where = "id_store = '".$id."' AND bill_status ='อนุมัติแล้ว' ";
                 $bill = $umodel->where($where)->orderBy( 'bill_op_time', 'DESC' )->findAll();
                 
                 return $this->respond( $bill );
         
             }  

             public function Monthyearlist()
             {
                    $umodel = new BilladdModel();
            $umodel->select("DISTINCT(DATE_FORMAT(bill_op_time, '%Y-%m')) AS year_and_month");
            $checkdate = $umodel->join('store', 'Store_id = id_store ', 'left')->orderBy( 'year_and_month', 'ASC' )->findAll();
                    
                    return $this->respond( $checkdate );
            
                }  

                public function Billbymonthyearlist($id = null)
                {
                 
                       $umodel = new BilladdModel();
               $umodel->Where("DATE_FORMAT(bill_op_time, '%Y-%m') ='".$id."'AND bill_status = 'อนุมัติแล้ว'");
               $checkdate = $umodel->join('store', 'Store_id = id_store ', 'left')->findAll();
                return $this->respond( $checkdate );
               
                   }  

                   public function searchIDbill($id = null)
                   {
   
                          $umodel = new BilladdModel();
                  $umodel->Where("bill_id like '".$id."' AND bill_status = 'อนุมัติแล้ว'");
                  $checkdate = $umodel->join('store', 'Store_id = id_store ', 'left')->findAll();
                  if ( count( $checkdate ) == 1 ) {
                    return $this->respond( $checkdate );
                } else {
                    $response = [ 'message' => 'notfound' ];
                    return $this->respond( $response );
                }

            }  

            public function searchIDbillwait($id = null)
            {

                   $umodel = new BilladdModel();
           $umodel->Where("bill_id like '".$id."' AND (bill_status = 'wait'  OR bill_status = 'รออนุมัติ' OR bill_status = 'ไม่ผ่านการอนุมัติ')");
           $checkdate = $umodel->join('store', 'Store_id = id_store ', 'left')->findAll();
           if ( count( $checkdate ) == 1 ) {
             return $this->respond( $checkdate );
         } else {
             $response = [ 'message' => 'notfound' ];
             return $this->respond( $response );
         }

     }  

}
