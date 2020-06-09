<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $guarded = [];
    // public function getImageLinkAttribute(){
        
    //     $filePath = 'client/images';
    //     if(isset($this->attributes['image'])){
    //         $imageName = $this->attributes['image'];
    //         $directory = asset($filePath.'/'.$this->attributes['image']);
    //         return $directory;
    //    }
    //     return null;
    // }
}
