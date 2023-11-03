<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   public $timestamps=false;
   protected $table='tb_loginform';
   protected $fillable=[
   'id',
   'email',
   'password',
   ];
}
?>
