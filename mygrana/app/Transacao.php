<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $fillable = [ 'user_id', 'valor', 'tipo', 'categoria_id', 'data' ];
    protected $table = 'transacoes';
    
    public function user(){
      return $this->belongsTo('App\User');
    }
}
