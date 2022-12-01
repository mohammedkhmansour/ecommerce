<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-any', Product::class);


        $products = Product::with('category')->orderBy('id', 'desc')->paginate();

        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', product::class);

        $categories = Category::all();
        $product = new Product;
        return view('dashboard.products.create',compact('categories','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $this->rouls($request);

        $data = $request->except('image','tag');

        if($request->hasFile('image')){
         $file = $request->file('image');
         if($file->isValid()){
             $data['image']  = $file->store('products',['disk'=>'public']);
         }
        }
             $data['slug']  = Str::slug($request->post('name'));

         $products = Product::create($data);

        //  $tags = explode(',',$request->post('tag'));
        //  $tag_ids = [];
        //  foreach($tags as $t_name){
        //      $tag = Tag::firstOrCreate([
        //          'slug' => Str::slug($t_name),
        //      ],[
        //          'name'  => $t_name,
        //      ]);

        //      $tag_ids = $tag->id;

        //      $products->tags()->sync($tag_ids);
        $tags = explode(', ',$request->post('tag'));
        $tags_ids = [];
         $sved_tags = Tag::all();
        foreach ($tags as $t_name){
            $slug = Str::slug($t_name);
            $tag = $sved_tags->where('slug',$slug)->first();

            if(!$tag){
                $tag = Tag::create([
                    'name'  => $t_name,
                    'slug' => $slug,
                ]);
            }
            $tags_ids[] = $tag->id;

        }
        $products->tags()->sync($tags_ids);

        if($request->hasFile('galary')){
            foreach($request->file('galary') as $file){
                $image_path = $file->store('galary',['disk'=>'public']);
                $products->images()->create([
                    'image_path' => $image_path
                ]);
            }
        }

         flash()->addSuccess('تم الاضافة بنجاح');


         return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category','tags')->findOrFail($id);
        $this->authorize('update', $product);

        $categories = Category::all();
        $tags = implode(', ', $product->tags()->pluck('name')->toArray());

        return view('dashboard.products.edit',compact('product','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->rouls($request);


        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $data = $request->except('image','tag');

        $old_image = $product->image;


        $new_image = $this->uploadeImage($request);
        if($new_image){
            $data['image'] = $new_image;
        }

        $product->update($data);

        // $tags = explode(',', $request->post('tag'));
        // $tag_ids = [];
        // foreach($tags as $t_name){
        //     $tag = Tag::firstOrCreate([
        //         'slug' => Str::slug($t_name),
        //     ],[
        //         'name'  => $t_name,
        //     ]);

        //     $tag_ids = $tag->id;

        //     $product->tags()->sync($tag_ids);
        $tags = explode(', ',$request->post('tag'));
        $tags_ids = [];
         $sved_tags = Tag::all();
        foreach ($tags as $t_name){
            $slug = Str::slug($t_name);
             $tag = $sved_tags->where('slug',$slug)->first();
            // $tag = Tag::where('slug',$slug)->first();

            if(!$tag){
                $tag = Tag::create([
                    'name'  => $t_name,
                    'slug' => $slug,
                ]);
            }
            $tags_ids[] = $tag->id;

        }
        $product->tags()->sync($tags_ids);

        if($request->hasFile('galary')){
            foreach($request->file('galary') as $file){
                $image_path = $file->store('galary',['disk'=>'public']);
                $product->images()->create([
                    'image_path' => $image_path
                ]);
            }
        }


        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }


        flash()->addInfo('تم التعديل بنجاح');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);


        $product->delete();

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('products.trashed');
    }

    public  function rouls(Request $request){
        $request->validate([
            'name'  => "required|min:3|max:255|",
            'category_id' => [
                'int','nullable','exists:categories,id'
            ],
            'image'     => [
                'image','dimensions:min_width=100,min_height=100'
            ],

           ]
           ,
           [
           'name.required'  => 'هاد الحقل مطلوب',
           'name.min:3'    => 'يجب ان لا يقل عن 3 احرف',
           'name.max:255'  => 'يجب ان لا يزيد عن 255 حرف',

        ]);

     }

     protected function uploadeImage(Request $request){
        if(!$request->hasFile('image')){
            return;
        }
        $file = $request->file('image');
        $path = $file->store('products',
        ['disk' => 'public']
    );
    return $path;

    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        // return view('dashboard.categories.trashed',compact('categories'));
        return view('dashboard.products.trashed',compact('products'));
    }

    public function restore($id)
    {
        $products = Product::onlyTrashed()->findOrFail($id);
        $products->restore();

        return redirect()->route('products.index');
    }

    public function forsedelete($id)
    {
        $products = Product::onlyTrashed()->findOrFail($id);
        $products->forceDelete();

        if($products->image){
            Storage::disk('public')->delete($products->image);
        }

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('products.index');
    }
}
