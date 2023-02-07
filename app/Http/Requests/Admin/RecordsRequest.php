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

class RecordsRequest extends FormRequest
{
    public function rules()
    {
        return [
            "device_count"=>[
				"string",
				"nullable"
			],
			"user_id"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "device_count"=>"Device Count",
			"user_id"=>"User_id"
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