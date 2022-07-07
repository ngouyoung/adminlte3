<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProfileController extends BackendController
{
    public function __construct(User $user, UserService $userService)
    {
        $this->mainPath = 'profile.';
        $this->mainRoute = 'profile.';
        $this->model = $user;
        $this->service = $userService;
    }

    public function updateInfo(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required|min:3']);
            $updatedObject = $this->service->updateProfile($request);
            if ($updatedObject) {
                return $this->updated($updatedObject);
            }
            return $this->error('Something has been wrong');
        } catch (ValidationException $validation) {
            return $this->unprocessable($validation->errors());
        }
    }

    public function updatePassword(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'old_password' => 'required|min:8',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required'
            ]);
            $result = $this->service->updatePassword($request);
            if (!$result) return $this->unprocessable(['old_password' => ['Record not match']]);
            else return $this->updated('Password has updated!');
        } catch (ValidationException $validation) {
            return $this->unprocessable($validation->errors());
        }
    }

    public function updateAvatar(Request $request)
    {
        DB::beginTransaction();
        $result = $this->service->changeAvatar($request);
        if ($result) {
            DB::commit();
            return $this->updated(true);
        } else {
            DB::rollBack();
            return $this->notFound();
        }
    }
}
