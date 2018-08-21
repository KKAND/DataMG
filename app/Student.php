<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_UN = 1;
    const SEX_BOY = 2;
    const SEX_GIRL = 3;
    protected $table = 'alldata';
    protected $fillable =['name','age','sex'];
    public $timestamps =true;

    /*protected function getDateFormat()
    {
        return time();
    }
    protected function asDateTime($val)
    {
        return $val;
    }*/
    public function sex($ind = null){
        $arr =[
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
        ];
        if ($ind!==null){
            return array_key_exists($ind,$arr) ? $arr[$ind]:$arr[self::SEX_UN];
        }
        return $arr;
    }
}
