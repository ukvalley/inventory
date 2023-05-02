<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Admin\Users;
use App\Models\Admin\Customer;

use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'sales';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"date",
		"device_id",
		"device_number",
		"allocated_to",
		"user_id",
    ];
    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function user_id_id()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    
	public function device_id_id()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
    public function allocated_to_id()
    {
        return $this->belongsTo(Customer::class, 'allocated_to');
    }
    
}