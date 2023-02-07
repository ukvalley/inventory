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

class SalesRequest extends FormRequest
{
    public function rules()
    {
        return [
            "date"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"device_id"=>[
				"string",
				"nullable"
			],
			"device_number"=>[
				"string",
				"nullable"
			],
			"allocated_to"=>[
				"string",
				"nullable"
			],
			"user_id"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "date"=>"Date",
			"device_id"=>"Device Id",
			"device_number"=>"Device Number",
			"allocated_to"=>"Allocated To",
			"user_id"=>"User Id"
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