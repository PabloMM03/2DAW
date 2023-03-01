<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.destroy')->only('destroy');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); 
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Crear un nuevo producto
      */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {
        // return Storage::put('products',$request->file('file'));

       $product = Product::create($request->all());

       /**
        * Almacenar imagen en storage
        */
       if($request->file('file')){
       $url = Storage::put('public/products',$request->file('file'));

        $product->image()->create([             //Especificamos los campos a añadir en la tabla
            'url' => $url,
        ]);
       }

       if($request->tags){
            $product->tags()->attach($request->tags);
            
       }

       return redirect()->route('admin.products.edit', $product)->with('info', 'Producto creado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * AEditar producto
     */
    public function edit(Product $product)
    {

        $this->authorize('author', $product);// Solo los usuarios  a los que pertenezca el producto podra editarlos
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
      * Actualizar producto y comprobar si tiene una imagen asignada 
      */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('author', $product); // Solo los usuarios  a los que pertenezca el producto podra actualizarlos
        $product->update($request->all());

        if($request->file('file')){
        $url = Storage::put('public/products', $request->file('file'));

        if($product->image){
            Storage::delete($product->image->url);

            $product->image->update([
                'url' => $url,
            ]);
       
        }else{
          $product->image()->create([
            'url' => $url,
          ]);
        }
    }

    if($request->tags){
        $product->tags()->sync($request->tags);
        
   }

        return redirect()->route('admin.products.edit', $product)->with('info', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
      * Eliminar producto
      */
    public function destroy(Product $product)
    {
        $this->authorize('author', $product);  // Solo los usuarios  a los que pertenezca el producto podra eliminarlos
        $product->delete();
        return redirect()->route('admin.products.index')->with('info', 'Producto eliminado correctamente');
    }
}
