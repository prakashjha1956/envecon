<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class RequestToTechnical
 *
 * @package App
 * @property string $project
 * @property string $work_type
 * @property enum $priority
 * @property string $request_name
 * @property text $small_description
 * @property string $upload_customer_sign_off_files
 * @property string $name
*/
class RequestToTechnical extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['priority', 'request_name', 'small_description', 'upload_customer_sign_off_files', 'project_id', 'work_type_id', 'name_id'];
    
    public static function boot()
    {
        parent::boot();

        RequestToTechnical::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_priority = ["High and Critical" => "High and Critical", "High" => "High", "Medium" => "Medium", "Low" => "Low"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setWorkTypeIdAttribute($input)
    {
        $this->attributes['work_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNameIdAttribute($input)
    {
        $this->attributes['name_id'] = $input ? $input : null;
    }
    
    public function project()
    {
        return $this->belongsTo(TimeProject::class, 'project_id');
    }
    
    public function work_type()
    {
        return $this->belongsTo(TimeWorkType::class, 'work_type_id');
    }
    
    public function assigned_person()
    {
        return $this->belongsToMany(User::class, 'request_to_technical_user');
    }
    
    public function name()
    {
        return $this->belongsTo(Status::class, 'name_id')->withTrashed();
    }
    
}
