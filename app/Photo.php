<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'file'
    ];

    protected $filePath = '/uploads/';

    public function getFileAttribute($file)
    {
        return $this->filePath . $file;
    }
}
