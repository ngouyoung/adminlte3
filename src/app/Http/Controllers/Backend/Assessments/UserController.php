<?php

namespace App\Http\Controllers\Backend\Assessments;

use App\Http\Controllers\Backend\BackendController as parentAlias;
use App\Models\User;
use App\Services\Roles\RoleService;
use App\Services\Users\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserController extends parentAlias
{
    private RoleService $roleService;

    public function __construct(User $user, UserService $userService, RoleService $roleService)
    {
        $this->mainPath = 'assessments.users.';
        $this->mainRoute = 'assessments.users.';
        $this->model = $user;
        $this->service = $userService;
        $this->roleService = $roleService;
    }

    public function getData($relation = null)
    {
        $relation = ['roles', 'permissions'];
        return parent::getData($relation)
            ->addColumn('roles', function ($object) {
                if ($object->isAdmin) return '<span class="badge badge-success text-capitalize">' . "All" . '</span>';
                else return $object->roles->map(function ($role) {
                    return '<span class="badge badge-success text-capitalize">' . $role->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('permissions', function ($object) {
                return $object->permissions->map(function ($permission) {
                    return '<span class="badge badge-success text-capitalize">' . $permission->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('actions', function ($object) {
                $html = '';
                if (auth()->user()->can('change-password-user'))
                    $html = $html . ' <a href="' . route('admin.assessments.users.change-password', Crypt::encrypt($object->id)) . '" class="' . config('class.button.change-password') . '" data-toggle="tooltip" title="Change Password"><i class="' . config('class.icon.change-password') . '"></i></a> ';
                return $html . BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'user');
            })
            ->rawColumns(['actions', 'roles', 'permissions'])
            ->make(true);
    }

    public function create($compact = null): View|Factory|Application
    {
        $compact['roles'] = $this->roleService->query()
            ->orderBy('name')
            ->get();
        return parent::create($compact);
    }

    public function edit($id, $compact = null): View|Factory|Application|RedirectResponse
    {
        $compact['roles'] = $this->roleService->query()
            ->orderBy('name')
            ->get();
        return parent::edit($id, $compact);
    }

    public function changePassword($id)
    {
        $compact['object'] = $this->service->getById(Crypt::decrypt($id));
        return $this->viewCompact('change_password', $compact);
    }

    public function updatePassword($id, Request $request)
    {
        try {
            DB::beginTransaction();
            // 1. Check validation
            $this->validate($request, $this->model::rulesToUpdatePassword());
            // 3. Try to update the records
            $updatedObject = $this->service->updatePasswordById($id, $request);
            $errors = $this->viewErrors($updatedObject);
            if (!$errors) {
                DB::commit();
                // 4. If everything is fine, return to page list
                return $this->redirectRoute('index');
            }
            // 5. When something went wrong return to page error.
            DB::rollBack();
            return $errors;
        } catch (ValidationException $e) {
            DB::rollBack();
            // 2. return to back with fail validation
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
