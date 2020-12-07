<?php

namespace App\Http\Controllers;
use App\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    //


    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articulos = Articulo::latest()->paginate(5);
        return view('articulos.index',compact('articulos'))->with('i',(request()->input('page',1)-1)*5);
    }

    
    public function create()
    {
        return view('articulos.create');
    }

   public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' =>'required'
        ]);
  
        Articulo::create($request->all());
   
        return redirect()->route('articulos.index')
                        ->with('success','Contac created successfully.');
    }
   
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit',compact('articulo'));
    }

    
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' =>'required'
        ]);
  
        $articulo->update($request->all());
  
        return redirect()->route('articulos.index')
                        ->with('success','Contac updated successfully');
    }
  
   
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
  
        return redirect()->route('articulos.index')
                        ->with('success','Contac deleted successfully');
    }
}
