<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class CustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name"=>[
				"string",
				"required"
			],
			"address"=>[
				"string",
				"required"
			],
			"adhar_number"=>[
				"string",
				"nullable"
			],
			"adhar_front_image"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"adhar_back_image"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"mobile"=>[
				"string",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "name"=>"Name",
			"address"=>"Address",
			"adhar_number"=>"Adhar Number",
			"adhar_front_image"=>"Adhar Front Image",
			"adhar_back_image"=>"Adhar Back Image",
			"mobile"=>"Mobile"
        ];
    }
    
    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}