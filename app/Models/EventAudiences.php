<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAudiences extends Model
{
    use HasFactory;

    protected $table = 'event_audiences';
    protected $primaryKey = 'id';
    protected $fillable = ['office_event_id','name','phone','email','gender','skills','profession','company','created_at'];
    public function officeEvent()
    {
        return $this->belongsTo(OfficeEvent::class);
    }
}
