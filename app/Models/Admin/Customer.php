<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Customer extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'customer';
    
    
	static $admiko_file_info = [
		"adhar_front_image"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		],
		"adhar_back_image"=>[
			"original"=>["action"=>"resize","width"=>1920,"height"=>1080,"folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"name",
		"address",
		"adhar_number",
		"adhar_front_image",
		"adhar_front_image_admiko_delete",
		"adhar_back_image",
		"adhar_back_image_admiko_delete",
		"mobile",
		"device_allocated",
    ];
    public function setAdharFrontImageAttribute()
    {
        if (request()->hasFile('adhar_front_image')) {
            $this->attributes['adhar_front_image'] = $this->imageUpload(request()->file("adhar_front_image"), Customer::$admiko_file_info["adhar_front_image"], $this->getOriginal('adhar_front_image'));
        }
    }
    public function setAdharFrontImageAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('adhar_front_image') && $value == 1) {
            $this->attributes['adhar_front_image'] = $this->imageUpload('', Customer::$admiko_file_info["adhar_front_image"], $this->getOriginal('adhar_front_image'), $value);
        }
    }
	public function setAdharBackImageAttribute()
    {
        if (request()->hasFile('adhar_back_image')) {
            $this->attributes['adhar_back_image'] = $this->imageUpload(request()->file("adhar_back_image"), Customer::$admiko_file_info["adhar_back_image"], $this->getOriginal('adhar_back_image'));
        }
    }
    public function setAdharBackImageAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('adhar_back_image') && $value == 1) {
            $this->attributes['adhar_back_image'] = $this->imageUpload('', Customer::$admiko_file_info["adhar_back_image"], $this->getOriginal('adhar_back_image'), $value);
        }
    }
}