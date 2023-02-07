<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SimTypes;
use Carbon\Carbon;
use App\Models\Admin\Users;
use App\Models\Admin\Customer;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Device extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'device';
    
    
	const STATUS_CONS = ["sold"=>"Sold","unsold"=>"Unsold"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"make",
		"ice_id",
		"imei",
		"sim1",
		"sim_1_type",
		"sim2",
		"sim_2_type",
		"activation_date",
		"received_date",
		"renewal_date",
		"asset_id_type",
		"status",
		"user_id",
		"customer_id",
    ];
    public function sim_1_type_id()
    {
        return $this->belongsTo(SimTypes::class, 'sim_1_type');
    }
	public function sim_2_type_id()
    {
        return $this->belongsTo(SimTypes::class, 'sim_2_type');
    }
	public function getActivationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setActivationDateAttribute($value)
    {
        $this->attributes['activation_date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getReceivedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setReceivedDateAttribute($value)
    {
        $this->attributes['received_date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getRenewalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setRenewalDateAttribute($value)
    {
        $this->attributes['renewal_date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function user_id_id()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
	public function customer_id_id()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}