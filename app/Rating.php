<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rating extends Model
{

    protected $fillable = array('user_id', 'rate');

    public function user() {
      return $this->belongsTo(User::class);
    }
}
