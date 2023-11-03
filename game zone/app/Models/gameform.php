<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gameform extends Model
{
 public $timestamps=false;
   protected $table='tb_game';
   protected $fillable=[
   'id',
   'game_name',
   'release_year',
   'player_mode',
   'file',
   'game_type',
   ];
}
?>
