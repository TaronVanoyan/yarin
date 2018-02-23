<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'sub_title1', 'sub_title2','syllabus','type','description','start_date','end_date','cost','audience','duration','comment','event_type','teacher_id','feauture_event'
    ];


    /**
     * Get the thumbnail record associated with the emage.
     */
    public function thumbnail()
    {
        return $this->hasOne('App\ImageManager','object_id')->where("type","thumbnail")->where("object_type","event");;
    }
    public function originalImage()
    {
        return $this->hasOne('App\ImageManager','object_id')->where("type","original")->where("object_type","event");;
    }
    public function submitions()
    {
        return $this->hasOne('App\Submition','event_id');
    }

    public function eventType(){
        return $this->hasOne('App\EventType','id','event_type');
    }

    public function teacher(){
        return $this->hasOne('App\Teacher','id','teacher_id');
    }
    /**
     * @return bool|null
     * @throws \Exception
     * @overrided
     */
    public function delete()
    {
        $this->thumbnail()->delete();
        $this->originalImage()->delete();
        return parent::delete();
    }

}
