<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Users extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'users';
    
    
	const USER_TYPE_CONS = ["sales_agent"=>"Sales Agent","technician"=>"Technician","admin"=>"Admin"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"name",
		"mobile",
		"city",
		"admiko_parent_child",
		"basic_amount",
		"user_type",
    ];
    public static function buildParentChildrenBreadcrumbs($id)
    {
        $data = array();
        $UsersList = Users::where('id', $id)->first();
        if ($UsersList) {
            $data[$UsersList->id] = $UsersList->name;
            if($UsersList->admiko_parent_child > 0){
                $dataParent = Users::buildParentChildrenBreadcrumbs($UsersList->admiko_parent_child);
                if (is_array($dataParent)) {
                    $data =  $dataParent + $data;
                }
            }
            return $data;
        }
        return $data;
    }

    public static function getParentChildrenList($parentId = 0, $indent = '')
    {
        $UsersList = Users::where('admiko_parent_child', "=", $parentId)->orderByDesc("id")->get();
        if ($UsersList) {
            $data = array();
            foreach ($UsersList as $list) {
                $data[$list->id] = $indent . ' ' . $list->name;
                $dataChild = Users::getParentChildrenList($list->id, $indent . '-');
                if (is_array($dataChild)) {
                    $data = $data + $dataChild;
                }
            }
            return $data;
        }
        return '';
    }
    public function parentChildrenPrepareDelete($delete_ids)
    {
        foreach($delete_ids as $id) {
            $this->parentChildrenDelete($id);
        }
    }
    public function parentChildrenDelete($parentId)
    {
        $UsersList = Users::where('admiko_parent_child', "=", $parentId)->orderByDesc("id")->get();
        if ($UsersList) {
            foreach ($UsersList as $list) {
                Users::parentChildrenDelete($list->id);
                Users::destroy($list->id);
            }
        }
    }
}