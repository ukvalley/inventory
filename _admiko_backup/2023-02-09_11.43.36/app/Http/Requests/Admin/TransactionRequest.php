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

class TransactionRequest extends FormRequest
{
    public function rules()
    {
        return [
            "sender"=>[
				"nullable"
			],
			"receiver"=>[
				"nullable"
			],
			"date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			],
			"amount"=>[
				"string",
				"nullable"
			],
			"transaction_type"=>[
				"string",
				"nullable"
			],
			"quantity"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "sender"=>"Sender",
			"receiver"=>"Receiver",
			"date"=>"Date",
			"amount"=>"Amount",
			"transaction_type"=>"Transaction Type",
			"quantity"=>"Quantity"
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