<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name', 'coverImage','data','description', 'bgColor'];
    protected $dates = ['data'];
    protected $hidden   = [
        'created_at', 'updated_at',
    ];

    public function musics()
    {
        return $this->belongsToMany(Music::class, null, 'channels', 'musics');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, null, 'channels', 'genres');
    }
// تبدیل کارکتر عددی فارسی به انگلیسی
function convertPersianToEnglish($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $output= str_replace($persian, $english, $string);
    return $output;
    }
   /*
   ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   *author:mohsenbaghri
   ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   !name:fnValidateDate
   ?param:timedata
   *des:اعتبارسنجی دیتاتایم فرم
   '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   */
  function fnValidateDate($date){

    $validate =preg_match('#^([0-9]?[0-9]?[0-9]{2}[- /.](0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01]))*$#', $date);

    if($validate == 0){
    return false;
    }
    return true;

}


}
