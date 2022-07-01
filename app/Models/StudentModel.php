<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'student_table';
    protected $primaryKey = 's_id';
    protected $allowedFields = ['s_id', 's_title', 's_fname', 's_lname', 's_email', 's_tel', 's_class', 'grade', 's_password', 'status','s_img'];
}
