<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];
    protected $casts = ['labels'=>'array'] ;

    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirName($filePath);
        $fileName = baseName($filePath);
        $file = "{$path}/crop{$w}x{$h}_{$fileName}";
        return Storage::url($file);
    }

    public function getUrl($w = null,$h = null){
        return Image::getUrlByFilePath($this->path, $w, $h);
    }
}