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

class PurchaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            "date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			],
			"device_number"=>[
				"string",
				"nullable"
			],
			"amount"=>[
				"string",
				"nullable"
			],
			"purchase_from"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "date"=>"Date &amp; Time",
			"device_number"=>"Device Number",
			"amount"=>"Amount",
			"purchase_from"=>"Purchase From"
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