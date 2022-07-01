<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods:GET, POST ,OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;
use App\Models\StaffModel;
use App\Models\UserModel;

use ResourceBundle;

class AllowUser extends ResourceController
{
    use ResponseTrait;
    //get all product
    public function index()
    {
        $umodel = new UserModel();
        $data = $umodel->orderBy('user_id', 'DESC')->findAll();
        return $this->respond($data);
    }
    public function finduser($id = null)
    {
        $umodel = new UserModel();
        $data = $umodel->where('user_id', $id)->findAll();
        foreach ($data as $row) {
            $id = $row['user_id'];
            $fname = $row['username'];
            $lname = $row['userlastname'];
            $useremail = $row['useremail'];
            $usertel = $row['usertel'];
            $status = $row["userstatus"];
            $class = $row["class"];

        }
        $response = [
            'message' =>  'success',
            'username' => $fname,
            'userlastname' => $lname,
            'useremail' => $useremail,
            'usertel' => $usertel,
            'user_id' => $id,
            'class' => $class,

            'status' =>  $status
        ];

        return $this->respond($response);
    }


    //insert new product
    public function Allow()
    {
        // $requestData = json_decode(file_get_contents('php://input'), true);

        $smodel = new StudentModel();
        $stmodel = new StaffModel();
        $umodel = new UserModel();
        $id = $this->request->getVar('user_id');

        $dataallow = [
            "allow_to_use" => $this->request->getVar('allow')
        ];

        if ($dataallow["allow_to_use"] == "Yes") {
            $check = $umodel->where('user_id', $id)->first();
            if ($check != null) {
                $s_id = $check["user_id"];
                $s_title = $check["usertitle"];
                $s_fname = $check["username"];
                $s_lname = $check["userlastname"];
                $s_email = $check["useremail"];
                $s_password = $check["userpassword"];
                $status = $check["userstatus"];
                $tel = $check["usertel"];
                $img = $check["img"];
                $class = $check["class"];

                if ($status  === "นักเรียน") {
                    $umodel->update($id, $dataallow);

                    $studentdata = [
                        "s_id" => "s" . $s_id,
                        "s_title" => $s_title,
                        "s_fname" => $s_fname,
                        "s_lname"  => $s_lname,
                        "s_email" => $s_email,
                        "s_password" => $s_password,
                        "status" =>  $status,
                        "s_tel" => $tel,
                        "s_img" => $img,
                        "s_class" => $class,


                    ];
                    $smodel->insert($studentdata);
                    if ($smodel) {
                        $umodel->delete($id);
                        $response = [
                            "status" =>  $status,

                            'message' =>  'success'

                        ];
                        return $this->respond($response);
                    } else {
                        $response = [
                            'message' =>  'fail'

                        ];
                        return $this->respond($response);
                    }
                } elseif ($status === "อาจารย์") {
                    $umodel->update($id, $dataallow);

                    $staffdata = [
                        "st_id" => "st" . $s_id,
                        "st_title" => $s_title,
                        "st_fname" => $s_fname,
                        "st_lname"  => $s_lname,
                        "st_email" => $s_email,
                        "st_password" => $s_password,
                        "status" => $status,
                        "st_tel" => $tel,
                        "st_img" => $img

                    ];
                    $stmodel->insert($staffdata);
                    if ($stmodel) {
                        $umodel->delete($id);
                        $response = [
                            "status" =>  $status,

                            'message' =>  'success'

                        ];
                        return $this->respond($response);
                    } else {
                        $response = [
                            'message' =>  'fail'

                        ];
                        return $this->respond($response);
                    }
                } else {
                    $response = [
                        'message' =>  'fail'

                    ];
                    return $this->respond($response);
                }
            } else {
                $response = [
                    
                    'message' => [
                        'Deny' => 'this user not exit '
                    ]
                ];
                return $this->respond($response);
            }
        } else {
            $umodel->where('user_id', $id)->delete();

            $response = [
                // 'status' => 08,
                // 'error' => null,
                'message' => 'Deny'

            ];
            return $this->respond($response);
        };
    }


    // }
}
