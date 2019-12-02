<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Group;
use App\Models\Admin\Permission;

class PermissionsDevGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_permissions = CreatedPermission::all();
        $dev_group = Group::find(1);

        $n = 0;
        $data['group_id'] = $dev_group->id;
        foreach ($created_permissions as $key => $permission) {
            $data['created_permission_id'] = $permission->id;
            
            Permission::create($data);
            echo ++$n . " - Permissão adicionada ao grupo Desenvolvedor";
        }
    }
}
