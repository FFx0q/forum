<?php
    namespace App\Base;

    use App\Base\Model;
    use App\Models\Permission;
 
    class Acl extends Model
    {
        public function check($permission)
        {
            if(!$this->group_permissions($permission))
                return false;

            return true;
        }
        
        public function group_permissions($permission_name)
        {
            $permission = new Permission();

            if($permission->HasPermission($permission_name) > 0)
                return true;
                
            return false;
        }
    }