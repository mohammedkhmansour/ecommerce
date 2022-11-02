<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();

        // $categories = Category::With('parent')->latest()->filter($request->query())->paginate(5);
        $categories = Category::leftJoin('categories as parents','parents.id','=','categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_name'
        ])->latest()->withCount('products')->filter($request->query())->paginate(5);

        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::get();
        $category = new Category;
        return view('dashboard.categories.create',compact('parents','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->rouls($request);

       $data = $request->except('image');
       if($request->hasFile('image')){
        $file = $request->file('image');
        if($file->isValid()){
            $data['image']  = $file->store('categories',['disk'=>'public']);
        }
       }
            $data['slug']  = Str::slug($request->post('name'));

        $categories = Category::create($data);

        flash()->addSuccess('تم الاضافة بنجاح');


        return redirect()->route('categories.index')->with('msg', 'تم الاضافة بنجاح')->with('type', 'success');
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
        $category = Category::findOrFail($id);

        $parents = Category::where('id','<>',$id)
        ->where(function($query) use($id){
            $query->whereNull('parent_id')
                  ->orWhere('parent_id','<>',$id);
        })->get();

        return view('dashboard.categories.edit',compact('category','parents'));
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


        $category = Category::findOrFail($id);

        $data = $request->except('image');

        $old_image = $category->image;

        $new_image = $this->uploadeImage($request);
        if($new_image){
            $data['image'] = $new_image;
        }

        $category->update($data);

        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }

        flash()->addInfo('تم الاضافة بنجاح');
        return redirect()->route('categories.index');

        // return redirect()->route('categories.index')->with('msg', 'تم التعديل بنجاح')->with('type', 'info');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        $category->delete();

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('categories.trashed');
    }

    public  function rouls(Request $request){
        $request->validate([
            'name'  => "required|min:3|max:255|",
            'parent_id' => [
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
        $path = $file->store('categories',
        ['disk' => 'public']
    );
    return $path;

    /**
     * احنا هان جبنا الكود يلي بيتكرر معي في اكثر من مكان وعملتله ميثود
     * وفي شغلة هي كويسة من ناحية انو الكود يكون نظيف
     * انو في الشرط احاول اني اقلل من الاكواد
     * وهان عملت عكس الشرط وحكيتله انو لو م في صورة انو خلاص م يعمل شي لهيك حكيتله ريتيرن بس
     * اما لو في صورة انو يعمل الخطوات هاد والفكرة هاد مشروحة اخر ربع ساعة من محاضرة Filesystem
     */
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        // return view('dashboard.categories.trashed',compact('categories'));
        return view('dashboard.categories.trashed',compact('categories'));
    }

    public function restore($id)
    {
        $categories = Category::onlyTrashed()->findOrFail($id);
        $categories->restore();

        return redirect()->route('categories.index');
    }

    public function forsedelete($id)
    {
        $categories = Category::onlyTrashed()->findOrFail($id);
        $categories->forceDelete();

        if($categories->image){
            Storage::disk('public')->delete($categories->image);
        }

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('categories.index');
    }

}
