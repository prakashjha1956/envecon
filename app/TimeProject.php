<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TimeProject
 *
 * @package App
 * @property string $name
*/
class TimeProject extends Model
{
    protected $fillable = ['name'];
    
    public static function boot()
    {
        parent::boot();

        TimeProject::observe(new \App\Observers\UserActionsObserver);
    }
    
}
