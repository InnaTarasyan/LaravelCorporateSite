<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'text',
        'customer',
        'alias',
        'img',
        'filter_alias',
        'keywords',
        'meta_desc'
    ];

    public function filter(){
        return $this->belongsTo('Corp\Filter', 'filter_alias', 'alias');
    }
}
