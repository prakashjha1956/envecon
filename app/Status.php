<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 *
 * @package App
 * @property string $name
 * @property string $description
*/
class Status extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
    
    public static function boot()
    {
        parent::boot();

        Status::observe(new \App\Observers\UserActionsObserver);
    }
    
}
