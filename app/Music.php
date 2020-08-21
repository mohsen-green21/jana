<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Music extends Model
{
    protected $collection = 'musics';
    protected $fillable = [
        'name', 'releasedata', 'coverImage', 'color', 'audioLink', 'likes', 'views',
    ];
    protected $dates = ['releasedata'];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, null, 'music', 'artists');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, null, 'music', 'genre');
    }
    public function albums()
    {
        return $this->belongsToMany(Album::class, null, 'music', 'album');
    }
    public function channels()
    {
        return $this->belongsToMany(Genre::class, null, 'musics', 'channels');
    }

    public function slider()
    {
        return $this->belongsToMany(Slider::class, null, 'music', 'slider');
    }

/*
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 *author:mohsenbaghri
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
!name:validate_music
?param:(file $music)
 *des:اعتبار سنجی فایل موزیک
'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 */
    public function validate_music($music)
    {
        if ($music->clientExtension() == "mp3") {
            return true;
        };

        return false;
    }

}
