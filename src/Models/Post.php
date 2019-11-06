<?php

namespace Scaffolder\Scafold\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Post extends Model {
    protected $fillable = ['title','slug','content','publication', 'user_id'];

    
    public function user() {
        return $this->belongsTo(User::class);    
    }    
}
