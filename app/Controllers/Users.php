<?php
// header( 'Access-Control-Allow-Origin: *' );
// header( 'Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE' );
// header( 'Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method' );

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;

use ResourceBundle;

class Users extends ResourceController
 {
    use ResponseTrait;
    //get all product

    public function index()
 {
        $umodel = new UserModel();
        $data = $umodel->where('status','admin')->orderBy( 'id', 'ASC' )->findAll();
        return $this->respond( $data );
    }
    public function allnormaluser()
    {
           $umodel = new UserModel();
           $data = $umodel->where('status','normal')->orderBy( 'id', 'ASC' )->findAll();
           return $this->respond( $data );
       }
    public function finduser( $id = null )
 {
        $umodel = new UserModel();
        $data = $umodel->where( 'id', $id )->findAll();
        foreach ( $data as $row ) {
            $id = $row[ 'id' ];
            $fname = $row[ 'fullname' ];
            $lname = $row[ 'username' ];
            $password = $row[ 'password' ];
            $status = $row[ 'status' ];
            $tel = $row[ 'Tel' ];

        }
        $response = [
            'message' =>  'success',
            'fullname' => $fname,
            'username' => $lname,
            'id' => $id,
            'tel' => $tel,
            'password'=>$password,
            'status' =>  $status
        ];

        return $this->respond( $response );
    }

    public function Delect_User( $id = null )
 {

        $umodel = new UserModel();
        $data = $umodel->where( 'id', $id )->findAll();
        if ( count( $data ) == 1 ) {
            $umodel->where( 'id', $id )->delete();
            $response = [

                'message' =>  'success'
            ];
            return $this->respond( $response );
        } else {
            return $this->failNotFound( 'No Mscholar ID' );
        }
    }

    public function Adduser()
 {
        $umodel = new UserModel();
        $data = [
            'fullname' => $this->request->getVar( 'fullname' ),
            'username' => $this->request->getVar( 'username' ),
            'Tel' => $this->request->getVar( 'tel' ),
            'password' => md5($this->request->getVar( 'password' )),
            'status' => $this->request->getVar( 'status' ),
        ];
        $checkuser = $umodel->where( 'username', $data[ 'username' ] )->findAll();
        if ( count( $checkuser ) === 0 ) {

            $umodel->insert( $data );

            $conuser = $umodel->where( 'username', $data[ 'username' ] )->findAll();
            foreach ( $conuser as $row ) {
                $fullname = $row[ 'fullname' ];

                $uname = $row[ 'username' ];
            }

            $response = [
                'fullname' => $fullname,
                'username' => $uname,
                'message'  => 'success'
            ];
            return $this->respond( $response );
        } else {
            $response = [ 'message' => 'fail' ];
            return $this->respond( $response );
        }
        //

    }

    public function Resetpass( $id = null )
 {
        $umodel = new UserModel();

        $data = [
            'password' => md5($this->request->getVar( 'password' ))
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

}

