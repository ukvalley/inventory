<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Customer;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Vechicles extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'vechicles';
    
    
	static $admiko_file_info = [
		"rc_book_file"=>[
			"original"=>["folder"=>"upload/"]
		],
		"vehicle_image_1"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		],
		"vehicle_image_2"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		],
		"vehicle_image_3"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		],
		"vehicle_image_4"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		],
		"vehicle_image_5"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"vechicle_number",
		"customer",
		"rc_book_file",
		"rc_book_file_admiko_delete",
		"vehicle_image_1",
		"vehicle_image_1_admiko_delete",
		"vehicle_image_2",
		"vehicle_image_2_admiko_delete",
		"vehicle_image_3",
		"vehicle_image_3_admiko_delete",
		"vehicle_image_4",
		"vehicle_image_4_admiko_delete",
		"vehicle_image_5",
		"vehicle_image_5_admiko_delete",
    ];
   
    public function customer_id()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }
	public function setRcBookFileAttribute()
    {
        if (request()->hasFile('rc_book_file')) {
            $this->attributes['rc_book_file'] = $this->fileUpload(request()->file("rc_book_file"), Vechicles::$admiko_file_info["rc_book_file"], $this->getOriginal('rc_book_file'));
        }
    }
    public function setRcBookFileAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('rc_book_file') && request()->rc_book_file_admiko_delete == 1) {
            $this->attributes['rc_book_file'] = $this->fileUpload('', Vechicles::$admiko_file_info["rc_book_file"], $this->getOriginal('rc_book_file'), $value);
        }
    }
	public function setVehicleImage1Attribute()
    {
        if (request()->hasFile('vehicle_image_1')) {
            $this->attributes['vehicle_image_1'] = $this->imageUpload(request()->file("vehicle_image_1"), Vechicles::$admiko_file_info["vehicle_image_1"], $this->getOriginal('vehicle_image_1'));
        }
    }
    public function setVehicleImage1AdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('vehicle_image_1') && $value == 1) {
            $this->attributes['vehicle_image_1'] = $this->imageUpload('', Vechicles::$admiko_file_info["vehicle_image_1"], $this->getOriginal('vehicle_image_1'), $value);
        }
    }
	public function setVehicleImage2Attribute()
    {
        if (request()->hasFile('vehicle_image_2')) {
            $this->attributes['vehicle_image_2'] = $this->imageUpload(request()->file("vehicle_image_2"), Vechicles::$admiko_file_info["vehicle_image_2"], $this->getOriginal('vehicle_image_2'));
        }
    }
    public function setVehicleImage2AdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('vehicle_image_2') && $value == 1) {
            $this->attributes['vehicle_image_2'] = $this->imageUpload('', Vechicles::$admiko_file_info["vehicle_image_2"], $this->getOriginal('vehicle_image_2'), $value);
        }
    }
	public function setVehicleImage3Attribute()
    {
        if (request()->hasFile('vehicle_image_3')) {
            $this->attributes['vehicle_image_3'] = $this->imageUpload(request()->file("vehicle_image_3"), Vechicles::$admiko_file_info["vehicle_image_3"], $this->getOriginal('vehicle_image_3'));
        }
    }
    public function setVehicleImage3AdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('vehicle_image_3') && $value == 1) {
            $this->attributes['vehicle_image_3'] = $this->imageUpload('', Vechicles::$admiko_file_info["vehicle_image_3"], $this->getOriginal('vehicle_image_3'), $value);
        }
    }
	public function setVehicleImage4Attribute()
    {
        if (request()->hasFile('vehicle_image_4')) {
            $this->attributes['vehicle_image_4'] = $this->imageUpload(request()->file("vehicle_image_4"), Vechicles::$admiko_file_info["vehicle_image_4"], $this->getOriginal('vehicle_image_4'));
        }
    }
    public function setVehicleImage4AdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('vehicle_image_4') && $value == 1) {
            $this->attributes['vehicle_image_4'] = $this->imageUpload('', Vechicles::$admiko_file_info["vehicle_image_4"], $this->getOriginal('vehicle_image_4'), $value);
        }
    }
	public function setVehicleImage5Attribute()
    {
        if (request()->hasFile('vehicle_image_5')) {
            $this->attributes['vehicle_image_5'] = $this->imageUpload(request()->file("vehicle_image_5"), Vechicles::$admiko_file_info["vehicle_image_5"], $this->getOriginal('vehicle_image_5'));
        }
    }
    public function setVehicleImage5AdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('vehicle_image_5') && $value == 1) {
            $this->attributes['vehicle_image_5'] = $this->imageUpload('', Vechicles::$admiko_file_info["vehicle_image_5"], $this->getOriginal('vehicle_image_5'), $value);
        }
    }
    
}