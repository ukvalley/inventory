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
			"ice_id"=>[
				"string",
				"nullable"
			],
			"manufactured_by"=>[
				"string",
				"nullable"
			],
			"quantity"=>[
				"string",
				"nullable"
			],
			"amount"=>[
				"string",
				"nullable"
			],
			"imei"=>[
				"string",
				"nullable"
			],
			"device_status"=>[
				"nullable"
			],
			"sim1_number"=>[
				"string",
				"nullable"
			],
			"sim_1_type"=>[
				"nullable"
			],
			"sim2_number"=>[
				"string",
				"nullable"
			],
			"sim_2_type"=>[
				"nullable"
			],
			"user_id"=>[
				"nullable"
			],
			"customer_id"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "date"=>"Date &amp; Time",
			"ice_id"=>"ICE Id",
			"manufactured_by"=>"Manufactured By",
			"quantity"=>"Quantity",
			"amount"=>"Amount",
			"imei"=>"IMEI",
			"device_status"=>"Device Status",
			"sim1_number"=>"Sim1 Number",
			"sim_1_type"=>"SIm_1_Type",
			"sim2_number"=>"Sim2 Number",
			"sim_2_type"=>"Sim_2_type",
			"user_id"=>"User Id",
			"customer_id"=>"Customer Id"
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