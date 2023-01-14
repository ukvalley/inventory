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

class VechiclesRequest extends FormRequest
{
    public function rules()
    {
        return [
            "vechicle_number"=>[
				"string",
				"required"
			],
			"customer"=>[
				"required"
			],
			"rc_book_file"=>[
				"file",
				"nullable"
			],
			"vehicle_image_1"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"vehicle_image_2"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"vehicle_image_3"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"vehicle_image_4"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
			"vehicle_image_5"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "vechicle_number"=>"Vechicle Number",
			"customer"=>"Customer",
			"rc_book_file"=>"RC Book File",
			"vehicle_image_1"=>"Vehicle Image 1",
			"vehicle_image_2"=>"Vehicle image 2",
			"vehicle_image_3"=>"Vehicle Image 3",
			"vehicle_image_4"=>"Vehicle Image 4",
			"vehicle_image_5"=>"Vehicle Image 5"
        ];
    }
    public function messages()
    {
        return [
            "rc_book_file.required_without"=>trans("validation.required")
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