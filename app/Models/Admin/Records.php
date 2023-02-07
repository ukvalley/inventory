<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Records extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'records';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"device_count",
		"user_id",
    ];
    public function user_id_id()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}