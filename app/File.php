<?php

namespace App;

use App\Traits\HasApprovals;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class File extends Model
{
    //

    use HasApprovals,SoftDeletes;

    const  APPROVAL_PROPERTIES =['title','overview','overview_short'];
    protected $fillable=['title','overview','overview_short','price','live','approved','finished'];

    protected  static function boot()
    {
        parent::boot();
        static::creating(function ($file){
            $file->identifier=uniqid(true);
        });
    }

    public function isFree()
    {
       return $this->price==0;
    }

    public function scopeFinished(Builder $builder)
    {
      return $builder->where('finished',true);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
       return 'identifier';
    }

    public function approvals()
    {
      return $this->hasMany('App\FileApproval');
    }

    public function needsApproval(array $approvalProperties)
    {
      if ($this->currentPropertiesDifferToGiven($approvalProperties)){
         return true;
      }

      if ($this->uploads()->unapproved()->count())
      {
          return true;
      }

      return false;
    }

    protected function  currentPropertiesDifferToGiven(array $properties){
        return array_only($this->toArray(), self::APPROVAL_PROPERTIES)!=$properties;
    }

    public function createApproval(array $properties)
    {
        //dd($properties);
       $this->approvals()->create($properties);
    }

    public function uploads()
    {
        return $this->hasMany("App\Upload");
    }

    public function approve()
    {
      $this->updateToBeVisible();
      $this->approveAllUploads();
    }

    public function approveAllUploads()
    {
        $this->uploads()->update([
            'approved'=>true,
        ]); 
    }

    public function updateToBeVisible()
    {
        $this->update([
            'live'=>true,
            'approved'=>true,
        ]);
    }

    public function mergerApprovalProperties()
    {
        $this->update(array_only($this->approvals->first()->toArray(),self::APPROVAL_PROPERTIES));
    }

    public function deleteAllApprovals()
    {
       $this->approvals()->delete();
    }
}
