<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users;
use App\Models\Admin\Device;


class DeviceTransfer extends Model
{
    use HasFactory;

    
    const STATUS_PENDING  = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'gps_device_id',
        'status',
    ];

    public function fromUser()
    {
        return $this->belongsTo(Users::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(Users::class, 'to_user_id');
    }

    public function gpsDevice()
    {
        return $this->belongsTo(Device::class);
    }

    public function accept()
    {
        $this->status = self::STATUS_ACCEPTED;
        $this->gpsDevice->blocked = true;
        $this->gpsDevice->save();
        $this->save();
    }

    public function reject()
    {
        $this->status = self::STATUS_REJECTED;
        $this->gpsDevice->blocked = false;
        $this->gpsDevice->save();
        $this->save();
    }
}


