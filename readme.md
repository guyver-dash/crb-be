# Work Life Cycle Laravel 5.7#

### Create Migration ###

* E.g Model - Roles
* CLI(Command Line Interface)
* ```Php artisan make:migration create_roles_table```
* Location is in ```database/migrations``` 
* [Available Column Types](https://laravel.com/docs/5.7/migrations#columns)
* E.g 
    ```Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('parent_id');
            $table->timestamps();
    });
  

### Create a Seeder if need. ###
* Always observe the ```Naming Convention``` PluralModelTableSeeder
* ```Php artisan make:seeder RolesTableSeeder```
* Location is in ```database/seeds```
* E.g
    ```
       public function run()
          {
                $roles = ['Super Admin', 'Holding CEO'];
                foreach ($roles as $value) {
                    $role = Role::create([
                            'name' => $value,
                            'parent_id' => 0,

                        ]);
                }
           }


### Create a Model ###

* New Model CLI ```php artisan make:model Model/Role ``` 
* Location is in ```app/model``` create your own folder if need. ```ModelFolder/ModelName```
* Specify table names ```protected $table = 'roles';
* Add Fillable for mass assignment ``` protected $fillable = ['name', 'description', 'parent_id'];
* Mass Assignment using facade. ``` Role::create($request->all());

### Create a Controller ###

* New Controller CLI ```php artisan make:controller Api/Role/RoleController --resource```
* Location is in   ```app/Http/Controller/Api/Role/RoleController```
