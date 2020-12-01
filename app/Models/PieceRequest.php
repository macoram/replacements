<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceRequest extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'piece_type_id',
        'pattern_id',
        'quantity'
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function type() {
        return $this->belongsTo('App\Models\PieceType', 'piece_type_id');
    }

    public function pattern() {
        return $this->belongsTo('App\Models\Pattern');
    }
}
