<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormResults extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [

        'is_new'
    ];

    public function form()
    {
        return $this->BelongsTo(Form::class,'form_id');
    }
}
