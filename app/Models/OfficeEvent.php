<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeEvent extends Model
{
    use HasFactory;

    protected $table = 'office_events';
    protected $primaryKey = 'id';
    protected $fillable = ['event_date','name','speakers','audience_count','location'];
    
    public function eventAudiences()
    {
        return $this->hasOne(EventAudiences::class, 'office_event_id', 'id');
    }
}
