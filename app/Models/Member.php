<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'is_verified',
        'is_checked',
        'gender',
        'dob',
        'city',
        'profession',
        'bc',
        'company',
        'phone',
        'expertises',
        'expertise_categories',
        'instagram',
        'linkedin',
        'facebook',
        'github',
        'wifi_username',
        'wifi_password',
        'wifi_ssid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genderIcon()
    {
        if ($this->gender == 'Male') {
            return '<i class="fas fa-male"></i>';
        }
        return '<i class="fas fa-female"></i>';
    }

    public function getWifiPassword()
    {
        return (empty($this->wifi_password) ? '' : base64_decode($this->wifi_password));
    }
}
