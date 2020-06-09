<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
