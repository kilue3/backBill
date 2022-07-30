<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Storemodel;

use ResourceBundle;


class Store extends ResourceController
{
    use ResponseTrait;
    private $db2;
    public function index()
    {
        
        $model = new Storemodel();
        $data = $model->orderBy('Store_id', 'ASC')->findAll();
        return $this->respond($data);
    }
    public function findstore ( $id = null )
    {
           $umodel = new Storemodel();
           $data = $umodel->where( 'Store_id', $id )->findAll();
           foreach ( $data as $row ) {
               $store_name = $row[ 'Store_name' ];
               $email = $row[ 'Store_email' ];
               $name = $row[ 'Contact_name' ];
               $status = $row[ 'Store_status' ];
               $username = $row[ 'Store_username' ];
               $password = $row[ 'Store_password' ];
               $tel = $row[ 'Tel' ];
               $Address = $row[ 'Address' ];
               $VendGroup = $row[ 'VendGroup' ];
               $BPC_WHTid = $row[ 'bill_BPC_WHTid' ];
               $BPC_BranchNo = $row[ 'bill_BPC_BranchNo' ];
               $bill_TaxGroup = $row[ 'bill_TaxGroup' ];

               
           }
           $response = [
               'message' =>  'success',
               'store_name' => $store_name,
               'username' => $username,
               'email' => $email,
               'Address' => $Address,
               'contactname' => $name,
               'VendGroup' => $VendGroup,
               'BPC_WHTid' => $BPC_WHTid,
               'BPC_BranchNo' => $BPC_BranchNo,
               'taxGroup' => $bill_TaxGroup,

               'tel' => $tel,
               'password'=>$password,
               'status' =>  $status
           ];
   
           return $this->respond( $response );
       }

       public function Delect_store( $id = null )
       {
      
              $umodel = new Storemodel();
              $data = $umodel->where( 'Store_id', $id )->findAll();
              if ( count( $data ) == 1 ) {
                  $umodel->where( 'Store_id', $id )->delete();
                  $response = [
      
                      'message' =>  'success'
                  ];
                  return $this->respond( $response );
              } else {
                  return $this->failNotFound( 'dont fond this id' );
              }
          }
          public function Resetpass( $id = null )
          {
                 $umodel = new Storemodel();
         
                 $data = [
                     'Store_password' => md5($this->request->getVar( 'password' ))
                 ];
                 $umodel->update( $id, $data );
                 if ( $umodel ) {
                     $response = [ 'message'  => 'success' ];
                     return $this->respond( $response );
                 } else {
                     $response = [ 'message' => 'fail' ];
                     return $this->respond( $response );
                 }
             }

             public function AddStore()
             {
                    $umodel = new Storemodel();
                   
                    $data = [
                        'Store_name' => $this->request->getVar( 'storename' ),
                        'Store_username' => $this->request->getVar( 'username' ),
                        'Store_email' => $this->request->getVar( 'email' ),
                        'Contact_name' => $this->request->getVar( 'contactname' ),
                        'Tel' => $this->request->getVar( 'tel' ),
                        'Store_password' =>  md5($this->request->getVar( 'password' )),
                        'Store_status' =>"enable" ,
                        'bill_BPC_BranchNo' => $this->request->getVar( 'BPC_BranchNo' ),
                        'bill_BPC_WHTid' => $this->request->getVar( 'BPC_WHTid' ),
                        'Address' => $this->request->getVar( 'Address' ),
                        'VendGroup' => $this->request->getVar( 'VendGroup' ),
                        'bill_TaxGroup' => $this->request->getVar( 'TaxGroup' ),

                    ];
                    //   return $this->respond( $data );
                    $checkuser = $umodel->where( 'Store_username', $data[ 'Store_username' ] )->findAll();
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

                public function CheckStore($id= null)
                {
                       $umodel = new Storemodel();
                      
                       $checkuser = $umodel->where( 'Store_username', $id )->findAll();
                       if ( count( $checkuser ) === 0 ) {
               
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

                   public function searchNameStore($id = null)
                   {
   
                    $umodel = new Storemodel();
                    $umodel->Where("Store_name Like '%".$id."%'");
                  $store = $umodel->findAll();
                  if ( count( $store ) >= 1 ) {
                    $response = [ 'message' => 'success',
                'data'=>$store ];


                    return $this->respond( $response );
                } else {
                    $response = [ 'message' => 'notfound' ];
                    return $this->respond( $response );
                }

            }  

                
}