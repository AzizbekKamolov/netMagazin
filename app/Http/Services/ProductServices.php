<?php
namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductServices
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function productValidate($request):array
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'img' => 'required',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
        ]);
        return $data;
    }
    public function productSave($request)
    {
        $data = $this->productValidate($request);

        if ($request->hasFile('img')){
            foreach ($request->file('img') as $file){
                $name = $file->hashName();
                $file->move(public_path().'/storage/files/', $name);
                $ar[] = $name;
            }
        }
        $product = $this->product;
        $product->img = json_encode($ar);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->created_by = auth()->user()->email;
        $product->price = $data['price'];
        $product->size = $data['size'];
        $product->save();
        return true;
    }


    public function updateProduct($request, $product)
    {
        $data = $this->productValidate($request);

        $product = $this->getFindById($product);
        $img = json_decode($product->img, true);
        if ($request->hasFile('img')){
            foreach ($request->file('img') as $file){
                $name = $file->hashName();
                $file->move(public_path().'/storage/files/', $name);
                array_push($img, $name);
            }
        }

        $product->img = json_encode($img);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->created_by = auth()->user()->email;
        $product->price = $data['price'];
        $product->size = $data['size'];
        $product->update();
        return true;
    }

    public function getAllProduct():Collection
    {
        return Product::all();
    }

    public function getFindById($id)
    {
        return Product::find($id);
    }

    public function unlinkPhoto($productImg){
        foreach ($productImg as $item => $value){
                if (file_exists(public_path('storage/files/'.$value))){
                    unlink(public_path('storage/files/'.$value));
                }
        }
        return true;
    }

    public function photoDelete($img){
        $product = $this->getFindById($img[0]);
        if ($product){
            $productImg = json_decode($product->img, true);

            foreach ($productImg as $item => $value){
                if ($img[1] == $value){
                    if (file_exists(public_path('storage/files/'.$value))){
                        unlink(public_path('storage/files/'.$value));
                    }
                    unset($productImg[$item]);
                    array_values($productImg);
                }
            }
            $product->update([
                'img' => json_encode($productImg)
            ]);
            return true;
        }
    }
}
