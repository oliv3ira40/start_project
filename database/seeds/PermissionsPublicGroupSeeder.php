<?php

use Illuminate\Database\Seeder;

class PermissionsPublicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_permission = CreatedPermission::where('route', 'adm.index')->first();
        $dev_group = Group::find(2);

        $n = 0;
        $data['group_id'] = $dev_group->id;
        $data['created_permission_id'] = $created_permission->id;

        Permission::create($data);
        echo ++$n . " - Permissão adicionada ao grupo Public";
    }
}
