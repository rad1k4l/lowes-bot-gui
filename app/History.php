<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    public $timestamps = false;

    public function link(){
        return $this->hasOne("App\Link", "id" , "link_id");
    }
}
