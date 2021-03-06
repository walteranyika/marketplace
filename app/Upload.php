<?php

namespace App;

use App\Traits\HasApprovals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasApprovals,SoftDeletes;
    protected $fillable =['filename','size','approved'];

    public function file()
    {
      return $this->belongsTo('App\File');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
