<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Manifacturer;
use App\Models\Admin\SimTypes;
use Carbon\Carbon;
use App\Models\Admin\Users;
use App\Models\Admin\Customer;
use App\Models\Admin\Device;

use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;



    class DeviceTransfer extends Model
{
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
