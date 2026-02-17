<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name','email','phone','location','size','surface','indoor_outdoor',
        'timeline','message','reference_file_path','status',
        'admin_notes','handled_by_user_id','handled_at',
    ];
}