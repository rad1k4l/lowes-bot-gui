<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "links";


    public function user(){
        return $this->hasOne("App\User" , 'id' , 'user')->first();
    }

    public function histories(){
        return $this->hasMany("App\History" ,'link_id' ,'id')->orderBy('time', 'desc')->get();
    }
}
