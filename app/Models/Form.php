<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class Form extends Model
{
    use HasFactory ,SoftDeletes;


    public function FormResults()
    {
        return $this->hasMany(FormResults::class);
    }
    public function User()
    {
        return $this->BelongsToMany(User::class,'form_users');
    }

    public function leading()
    {
        return $this->BelongsToMany(User::class,'form_users');
    }
    public function addedby()
    {
        return $this->belongsTo('App\Models\user','added_by');
    }
    public function getFlexibleContentAttribute()
    {
        return $this->flexible('flexible-content', [
            'wysiwyg' => \App\Nova\Flexible\Layouts\WysiwygLayout::class,
        ]);
    }
}
