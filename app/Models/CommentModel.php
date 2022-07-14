<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'bill_cm';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_bill', 'cm_username', 'cm_note', 'cm_status', 'cm_time'];
}
