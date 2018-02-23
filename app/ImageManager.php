<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Image;
use Log;
use DB;


class ImageManager extends Model
{
    protected $table = "images";
    private  $event_tumbnail_w = 30;
    private  $event_tumbnail_h = 30;

    private  $thumbnail_path = 'images/events/thumbnails/';
    private  $original_path = 'images/events/original/';
    private $type;

    private $event_id;
    private $tumbnail_name;
    private $original_name;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'object_type', 'object_id','name',
    ];


    /**
     * @param $image
     * @param $event_id
     */
    public function create($image, $event_id){

        try{
            $this->tumbnail_name    = "tumbnail_{$event_id}.".$image->getClientOriginalExtension();
            $image_thumbnail = Image::make($image->getRealPath());
            $image_thumbnail->resize($this->event_tumbnail_w, $this->event_tumbnail_h);
            $image_thumbnail->save(public_path( $this->thumbnail_path.$this->tumbnail_name));

            $this->original_name = "original_{$event_id}.".$image->getClientOriginalExtension();
            $original = Image::make($image->getRealPath());
//           / print_r($original);die;
            $original->save(public_path( $this->original_path.$this->original_name));
        }catch(\Exception $e){
            dd($e->getMessage());
            Log::critical("image:create:error ".$e->getMessage());

        }
        $this->updateData($event_id);
    }

    /**
     * @param $event_id
     * remove old images from db and insert new ones
     */
    public function updateData($event_id){
        DB::statement("DELETE from images WHERE object_id={$event_id} AND object_type='".$this->type."'");
        DB::table("images")->insert(['type'=>'thumbnail', 'object_type'=>$this->type, 'object_id'=>$event_id,'name'=>$this->tumbnail_name]);
        DB::table("images")->insert(['type'=>'original', 'object_type'=>$this->type, 'object_id'=>$event_id,'name'=>$this->original_name]);
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $path = public_path().DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$type."s";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            mkdir($path.DIRECTORY_SEPARATOR."thumbnails", 0777, true);
            mkdir($path.DIRECTORY_SEPARATOR."originals", 0777, true);
        }

        $this->thumbnail_path = 'images/'.$type.'s/thumbnails/';
        $this->original_path = 'images/'.$type.'s/originals/';

        $this->type = $type;
    }
    /**
     * @param int $event_tumbnail_w
     */
    public function setEventTumbnailW(int $event_tumbnail_w): void
    {
        $this->event_tumbnail_w = $event_tumbnail_w;
    }

    /**
     * @param int $event_tumbnail_h
     */
    public function setEventTumbnailH(int $event_tumbnail_h): void
    {
        $this->event_tumbnail_h = $event_tumbnail_h;
    }

}
