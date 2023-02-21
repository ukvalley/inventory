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

class DeviceRequest extends FormRequest
{
    public function rules()
    {
        return [
            "make"=>[
				"string",
				"nullable"
			],
			"ice_id"=>[
				"string",
				"nullable"
			],
			"imei"=>[
				"string",
				"nullable"
			],
			"sim1"=>[
				"string",
				"nullable"
			],
			"sim_1_type"=>[
				"nullable"
			],
			"sim2"=>[
				"string",
				"nullable"
			],
			"sim_2_type"=>[
				"nullable"
			],
			"activation_date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			],
			"received_date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			],
			"renewal_date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			],
			"asset_id_type"=>[
				"string",
				"nullable"
			],
			"statuss"=>[
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
            "make"=>"Make",
			"ice_id"=>"ICE ID",
			"imei"=>"IMEI",
			"sim1"=>"SIM1",
			"sim_1_type"=>"SIM 1 Type",
			"sim2"=>"SIM2",
			"sim_2_type"=>"SIM 2 Type",
			"activation_date"=>"Activation Date",
			"received_date"=>"Received Date",
			"renewal_date"=>"Renewal Date",
			"asset_id_type"=>"Asset ID Type",
			"statuss"=>"Status",
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