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
      
        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');

        //Create Lead Factory
        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Latavel',
            'description' => 'lorem loremr lorem loremrlorem loremrlorem    loremrlorem loremrlorem loremrlorem loremrlorem loremrlorem loremr',  
            'image' => 'https://laravel.com/img/logomark.min.svg', 
            'user_id' => $teacher->id
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
            'password' => bcrypt('password')
        ]);

        if($type == 'Super Admin') {
            $permission = Permission::create([
                'name' => 'create-admin'
            ]);
            $role->givePermissionTo($permission);
        }

        $user->assignRole($role);

        return $user;
    }
}
