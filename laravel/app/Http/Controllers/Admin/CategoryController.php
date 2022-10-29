<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;
    public function __construct(Category $categories)
    {
        $this->modelCategory = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->modelCategory
                    ->paginate($request->get('perpage', 5))->withQueryString();
        if ($key = request()->key) {
            $categories = $this->modelCategory->where('name','like','%'.$key.'%')
                                                 ->orwhere('quantity','like','%'.$key.'%')
                                                 ->paginate($request->get('perpage', 5))->withQueryString();
        }

        return view('admin.categories.index', [

            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'quantity',
            'is_public',
        ]);
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;

         try{
            $category = $this->modelCategory->create($data);
            $msg = 'Create category success.';

            return redirect()
                ->route('admin.categories.index', ['category' => $category->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('admin.categories.index')
            ->with('error', $error);
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
        $category = $this->modelCategory->findOrFail($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
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
        $category = $this->modelCategory->findOrFail($id);
        $data = $request->only([
            'name',
            'quantity',
            'is_public',
        ]);
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        try{
            $category->update($data);
            return redirect()->route('admin.categories.index',['category'=> $category-> id])
              ->with('msg', "Update category success !!!");
          }
          catch(\Exception $e){
              \Log::error($e);
          }
          return redirect()->route('admin.categories.index')
              ->with('err', "Some thing went wrong !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->modelCategory->findOrFail($id);
        try{
            $category->delete();
            $msg= 'Delete Sucess';
            return redirect()
            ->route('admin.categories.index')
            ->with('msg',$msg);
        } catch (\Exception $e) {
            \Log::error($e);
            $error= 'Some thing went wrong !';
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('error',$error);
    }
}
