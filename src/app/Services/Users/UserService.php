<?php


namespace App\Services\Users;


use App\Models\User;
use App\Services\BaseService;
use App\Services\Roles\RoleService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    private RoleService $roleService;

    public function __construct(User $user, RoleService $roleService)
    {
        $this->model = $user;
        $this->roleService = $roleService;
    }

    public function create($attributes)
    {
        if (!$attributes) {
            return '400';
        }
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['email'] = strtolower($attributes['email']);
        $object = $this->model->create($attributes->all());
        if ($object instanceof $this->model) {
            if (!empty($attributes->roles)) {
                $getArray = $this->roleService->getByArray('id', $attributes->roles);
                $object->assignRole($getArray);
            }
        }
        return $object;
    }

    public function updateById($id, $attribute)
    {
        if (!$attribute && !$id) {
            return '400';
        }
        $modelObj = $this->getById($id);
        $attribute['email'] = strtolower($attribute['email']);
        $result = $modelObj->fill($attribute->all());
        $result->update();
        if (!empty($attribute->roles)) {
            $roles = $this->roleService->getByArray('id', $attribute->roles);
            $result->syncRoles($roles);
        } else $result->syncRoles('');
        return $result;
    }

    public function updatePasswordById($id, $attribute)
    {
        if (!$attribute && !$id) {
            return '400';
        }
        $modelObj = $this->getById($id);
        $attribute['password'] = Hash::make($attribute['password']);
        $result = $modelObj->fill($attribute->all());
        $result->update();
        return $result;
    }

    public function updatePassword($attribute): bool
    {
        $object = $this->getById(auth()->user()->getAuthIdentifier());
        if (Hash::check($attribute->old_password, $object->password)) {
            return $object->update(['password' => Hash::make($attribute->password)]);
        }
        return false;
    }

    public function updateProfile($attribute)
    {
        $object = $this->getById(auth()->user()->getAuthIdentifier());
        if ($object) {
            return $object->update(['name' => $attribute->name]);
        }
        return false;
    }

    public function changeAvatar($attribute)
    {
        if ($attribute->input('avatar')) {
            $object = $this->getById(auth()->user()->getAuthIdentifier());
            $avatar = $attribute->input('avatar');
            $avatar = str_replace('data:image/jpeg;base64,', '', $avatar);
            $avatar = str_replace(' ', '+', $avatar);
            $name = time() . '.' . 'png';
            $folder = '/storage/users';
            $avatarName = $folder . '/' . $name;
            if (!File::exists(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0777, true, true);
            }
            File::put(public_path($folder) . '/' . $name, base64_decode($avatar));
            if ($object->avatar !== 'img/default.png') {
                $authAvatar = public_path($object->avatar);
                if (File::exists($authAvatar)) {
                    File::delete($authAvatar);
                }
            }
            return $object->update(['avatar' => $avatarName]);
        }
        return false;
    }
}
