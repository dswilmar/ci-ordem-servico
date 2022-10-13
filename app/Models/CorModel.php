<?php

namespace App\Models;

use CodeIgniter\Model;

class CorModel extends Model
{
    protected $table            = 'cores';
    protected $returnType       = 'object'; //array, object ou entity
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome'];
}
