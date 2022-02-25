<?php

namespace App\Http\Controllers\dashboard\users;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Http\Requests\user_create_form;
use App\Http\Requests\user_form;
use App\Models\Course;
use App\Models\User;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class UsersController extends BaseDashboardController
{

    public function index(){
        $table=Table::init("/dashboard/course?1=1")
            ->addColumn(Column::init("شناسه 	","id")->setSearch())
            ->addColumn(Column::init("نام کاربری 	","name")->setSearch())
            ->addColumn(Column::init("ایمیل 	","email")->setSearch())
            ->addColumn(Column::init("نقش 	","id")->setCallback(function (User $user){
                $roles=[];
                $user->roles->each(function ($role) use (&$roles){
                    $roles[]=$role->name;
                });
                return implode(",",$roles);
                //$user->roles()->first()->name;
            }))
            ->addColumn(Column::init("تاریخ ایجاد","created_at")->setSearch())
            ->addColumn(Column::init("عملیات","created_at")->setCallback(function ($data){
                $url=route("dashboard.users.edit",$data->id);
                return "<a href='$url' class='btn btn-primary'>ویرایش</a>";
            }));
        ;

        $data = QueryBuilder::for(User::class)
            ->with(['roles'])
            ->allowedFilters([
                "id",
                "moodle_id",
                "name",
                "tag",
                "created_at"
            ])
            ->paginate(30)->withQueryString();;

        return view("dashboard.queryBuilder.table",compact('data',"table"));
    }
    public function edit(User $user){
        $roles=Role::all();
        return view("dashboard.users.edit",compact('user','roles'));
    }

    public function update(User $user,user_form $form){
        $user->name=$form->name;
        $user->email=$form->email;
        $user->roles()->sync($form->role);
        if ($form->password){
            $user->password=Hash::make($form->password);
        }
        $user->save();
        return redirect()->back()->with("success","اطلاعات با موفقیت بروزرسانی شد");
    }

    public function create(){
        $roles=Role::all();
        return view("dashboard.users.create",compact('roles'));
    }

    public function store(user_create_form  $form){
        $user=User::create([
            "name"=>$form->name,
            "email"=>$form->email,
            "password"=>Hash::make($form->password),
        ]);
        $user->roles()->sync($form->role);
        return redirect()->route("dashboard.users.all")->with("success","کاربر با موفقیت ایجاد شد");
    }
}
