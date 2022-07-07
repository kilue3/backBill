<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Storemodel;

use ResourceBundle;


class Store extends ResourceController
{
    use ResponseTrait;
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
   
           }
           $response = [
               'message' =>  'success',
               'store_name' => $store_name,
               'username' => $username,
               'email' => $email,
               'contactname' => $name,

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
}