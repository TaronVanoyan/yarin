<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'position', 'guest',
    ];


    /**
     * Get the thumbnail record associated with the emage.
     */
    public function thumbnail()
    {
        return $this->hasOne('App\ImageManager','object_id')->where("type","thumbnail")->where("object_type","teacher");
    }
    public function originalImage()
    {
        return $this->hasOne('App\ImageManager','object_id')->where("type","original")->where("object_type","teacher");;
    }
    /**
     * @return bool|null
     * @throws \Exception
     * parent overrided
     */
    public function delete()
    {
        $this->thumbnail()->delete();
        $this->originalImage()->delete();
        return parent::delete();
    }


}
