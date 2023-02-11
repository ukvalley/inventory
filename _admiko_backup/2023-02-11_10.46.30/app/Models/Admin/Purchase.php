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
use App\Models\Admin\SimTypes;
use App\Models\Admin\Users;
use App\Models\Admin\Customer;
use App\Models\Admin\Manifacturer;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Purchase extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'purchase';
    
    
	const DEVICE_STATUS_CONS = ["unsold"=>"Unsold","sold"=>"Sold"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"date",
		"ice_id",
		"quantity",
		"amount",
		"imei",
		"device_status",
		"sim1_number",
		"sim_1_type",
		"sim2_number",
		"sim_2_type",
		"user_id",
		"customer_id",
		"manufactured_by",
    ];
    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function sim_1_type_id()
    {
        return $this->belongsTo(SimTypes::class, 'sim_1_type');
    }
	public function sim_2_type_id()
    {
        return $this->belongsTo(SimTypes::class, 'sim_2_type');
    }
	public function user_id_id()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
	public function customer_id_id()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
	public function manufactured_by_id()
    {
        return $this->belongsTo(Manifacturer::class, 'manufactured_by');
    }
}