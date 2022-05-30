<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task','status_id'        
    ];

    public function status(){
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function formatted_task(){
        if($this->status_id == 2){
            return '<del>'.$this->task.'</del>';
        } else {
            return $this->task;
        }
    }

}
