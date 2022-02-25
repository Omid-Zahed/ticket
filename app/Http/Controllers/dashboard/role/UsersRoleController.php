<?php

namespace App\Http\Controllers\dashboard\role;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Http\Requests\role_form;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Http\Client\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class UsersRoleController extends BaseDashboardController
{
    public function index(){
        $table=Table::init("/dashboard/course?1=1")
            ->addColumn(Column::init("شناسه 	","id")->setSearch())
            ->addColumn(Column::init("نام","name")->setSearch())
            ->addColumn(Column::init("تاریخ بروزرسانی","updated_at")->setSearch())
            ->addColumn(Column::init("تاریخ ایجاد","created_at")->setSearch())
            ->addColumn(Column::init("عملیات","created_at")->setCallback(function ($data){
                $url=route("dashboard.role.edit",$data->id);
                return "<a href='$url' class='btn btn-primary'>ویرایش</a>";
            }));

        $data = QueryBuilder::for(Role::class)
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

    public function create(){
        $permissions=Permission::all();
        return view("dashboard.role.create",compact('permissions'));
    }

    public function edit(Role $role)
    {
        $role->load("permissions");
        $permissions=Permission::all();

       return view("dashboard.role.edit",compact("role","permissions"));
    }

    public function update(role_form  $request,Role  $role){
      $role->name=$request->name;
      $role->save();
      $role->permissions()->sync($request->permissions);
      return redirect()->back()->with("success","اطلاعات با موفقیت ثبت شد");

    }


}
