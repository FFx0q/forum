<?php
    namespace App\Base;

    use App\Base\Model;
    use App\Models\Permission;
    use App\Base\Database;

    class Acl
    {
        public function check(string $permission) : bool
        {
            if ($this->groupPermission($permission)) {
                return true;
            }

            return false;
        }
        
        public function groupPermission(string $permissionName) : bool
        {
            $db = new Database();
            $permission = new Permission($db);
    
            if ($permission->hasPermission($permissionName) > 0) {
                return true;
            }
                
            return false;
        }

        public function userPermission(string $permission) : bool
        {
            //todo
        }
    }
