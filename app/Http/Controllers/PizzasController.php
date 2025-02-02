<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Pizza;

class PizzasController extends Controller
{
    public function home()
    {
        $pizzas = Pizza::all();
        return view('home', ['pizzas' => $pizzas]);
    }

    public function index()
    {
        return Pizza::latest()->get();
    }

    public function details($id)
    {
        $pizzas = Pizza::find($id);
        return view('details', ['id' => $id, 'pizza' => $pizzas]);
    }

    public function edit($id)
    {
        $pizzas = Pizza::find($id);
        return view('edit', ['id' => $id, 'pizza' => $pizzas]);
    }
    public function find($id)
    {
        return Pizza::find($id);
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->description = $request->description;
        $pizza->image = $request->image;
        $pizza->save();
        return response()->json($request);
        
    }
    public function store(Request $request)
    {
        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->description = request('description');

        
        $this->validate($request, [ 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
        $pizza->image = $imageName;
        $pizza->price = request('price');
        $pizza->save();

        return redirect()->route('home');
    }

    public function add()
    {
        return view('add-pizza');
    }

    public function addSubmit()
    {
        $name = request('name');
        $description = request('description');
        $image = request('image');
        $price = request('price');

        DB::update("insert into pizzas (name, price, description, image, updated_at, created_at) VALUES (?,?,?,?)",[$name,$price,$description,$image, '2020-12-03 12:27:46', '2020-12-03 12:27:46']);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return Pizza::latest()->get();
    }
}
