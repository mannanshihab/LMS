<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Curriculum;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Permisstion Create
        $defaultPermission = ['lead-permission', 'create-admin', 'user_management'];
        foreach($defaultPermission as $permission){
            Permission::create(['name' => $permission]);
        }
        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');

        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');

        //Create Lead Factory
        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'lorem loremr lorem loremrlorem loremrlorem    loremrlorem loremrlorem loremrlorem loremrlorem loremrlorem loremr',  
            'image' => 'https://laravel.com/img/logomark.min.svg', 
            'user_id' => $teacher->id,
            'price' => 500
        ]);

        Curriculum::factory(10)->create();

        
    }
    
    //add user permission
    private function create_user_with_role($type, $name, $email) 
    {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password22')
        ]);

        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        }elseif($type == 'Leads'){
            $role->givePermissionTo('lead-permission');
        }

        $user->assignRole($role);

        return $user;
    }
}
