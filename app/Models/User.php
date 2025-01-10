<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';
    protected $fillable = [
        'tick'
    ];
    protected $guarded=[];
    public function tick() {
        return $this->belongsTo(Tag::class,'tick');
    }
}
