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

class UsersRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name"=>[
				"string",
				"nullable"
			],
			"mobile"=>[
				"string",
				"nullable"
			],
			"city"=>[
				"string",
				"nullable"
			],
			"basic_amount"=>[
				"string",
				"nullable"
			],
			"user_type"=>[
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "name"=>"Name",
			"mobile"=>"Mobile",
			"city"=>"City",
			"basic_amount"=>"Basic Amount",
			"user_type"=>"User Type"
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