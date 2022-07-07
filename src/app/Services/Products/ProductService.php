<?php


namespace App\Services\Products;


use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Support\Facades\File;

class ProductService extends BaseService
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function changeImage($id, $attribute)
    {
        if ($attribute->input('image')) {
            $object = $this->getById($id);
            $avatar = $attribute->input('image');
            $avatar = str_replace('data:image/jpeg;base64,', '', $avatar);
            $avatar = str_replace(' ', '+', $avatar);
            $name = time() . '.' . 'png';
            $folder = '/storage/products';
            if (!File::exists(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0777, true, true);
            }
            File::put(public_path($folder) . '/' . $name, base64_decode($avatar));
            if ($object->avatar !== 'img/default_product.png') {
                $authAvatar = public_path($object->avatar);
                if (File::exists($authAvatar)) {
                    File::delete($authAvatar);
                }
            }
            $avatarName = $folder . '/' . $name;
            return $object->update(['image' => $avatarName]);
        }
        return false;
    }
}
