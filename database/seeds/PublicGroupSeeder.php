<?php

use Illuminate\Database\Seeder;

class PublicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			'name'=>'Public',
			'tag_color'=>'#109e84',
		];
		if (Group::where('name', '=', $data['name'])->count()) {
			$group = Group::where('name', '=', $data['name'])->first();
			$group->update($data);
			echo "Grupo Public alterado!";
		} else {
			Group::create($data);
			echo "Grupo Public cadastrado!";
		}
    }
}
