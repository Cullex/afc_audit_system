<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Access extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $auditInclude = [];
    protected $guarded = [];
}
