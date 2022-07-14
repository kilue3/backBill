<?php

namespace App\Models;

use CodeIgniter\Model;

class BilladdModel extends Model
{
    protected $table = 'opbill';
    protected $primaryKey = 'bill_id';
    protected $allowedFields = ['bill_id', 'bill_amount', 'bill_detail', 'id_store', 'bill_op_time', 'bill_status'];
}
