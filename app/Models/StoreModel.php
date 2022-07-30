<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{   protected $table = 'store';
    protected $primaryKey = 'Store_id ';
    protected $allowedFields = ['Store_id ', 'Store_name', 'Store_email', 'Contact_name', 'Tel', 'Store_username', 'Store_password','Store_status','bill_TaxGroup','Address','VendGroup','bill_BPC_WHTid','bill_BPC_BranchNo'];
}
