<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'code', 'name', 'group', 'fee_flat', 'fee_percent', 'deactived_at'
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'deactived_at' => 'datetime',
    ];
    
    public function getStatusAttribute()
    {
        if ($this->deactived_at == NULL) {
            return 'Active';
        } else {
            return 'Nonactive';
        }
    }
}
