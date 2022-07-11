<?php

namespace App\Models;

use CodeIgniter\Model;

class FilebillModel extends Model
{
    protected $table = 'file_bill';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_bill', 'file_name','file_url','file_date'];
}
