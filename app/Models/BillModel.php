<?php

namespace App\Models;

use CodeIgniter\Model;

class BillModel extends Model
{
    protected $table = 'datebill';
    protected $primaryKey = 'bill_op_id';
    protected $allowedFields = ['bill_op_id', 'bill_op_date', 'bill_end_date'];
}
