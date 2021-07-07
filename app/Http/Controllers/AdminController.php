<?php

namespace App\Http\Controllers;

use App\Notifications\Powiadomienie;
use Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/admin');
    }

    public function deleteProduct($id)
    {
        $res = DB::table('items')->select('photo')->where('id', $id)->get();
        DB::table('items')->delete($id);

        // dd($res[0]->photo);
        File::delete("images/" . $res[0]->photo);
        return back()->with('success', 'Produkt usunięty!');
    }

    public function addProductView()
    {

        $cats = \App\Categories::all();
        $category = array();
        foreach ($cats as $c) {
            array_push($category, $c->name);
        }
        // dd($category);
        return view('admin/adminAddProduct', compact('category'));
    }

    public function addProduct(Request $request)
    {
        // dd($request);
        // dd(array($request->name, $request->description, $request->price, $request->photo));
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        $imageName = time() . '.' . $request->photo->extension();

        $request->photo->move(public_path('images'), $imageName);

        DB::table('items')->insert(['name' => $request->name, 'description' => $request->description, 'price' => $request->price, 'photo' => $imageName, 'category_id' => $request->category]);

        return back()->with('success', 'Produkt dodany!');
    }

    public function listUsers()
    {
        $users = \App\User::all();

        return view('admin/userslist')->with('users', $users);
    }

    public function banUser(Request $request)
    {
        $id = $request->id;
        $banned = $request->banned;

        $user = \App\User::find($id);
        $user->banned = $banned == 0;
        $user->save();

        if($banned == 0)
            return back()->with('success', 'Użytkownik zbanowany!');   
        else
        return back()->with('success', 'Użytkownik odbanowany!');   
    }

    public function delUser(Request $request)
    {
        $id = $request->id;

        $user = \App\User::find($id);
        $user->delete();
        return back()->with('success', 'Użytkownik usunięty!');   
    }

    public function notify()
    {
        $users = \App\User::all();
        try {
            foreach ($users as $user) {
                $user->notify(new Powiadomienie("Nowe promocje!"));
            }
        } catch (\Throwable $th) {
            // dd($th);
            return back()->with('fail', 'Wystąpił problem z wysłaniem powiadomienia! ('.$th->getMessage().')');  
        }
        return back()->with('success', 'Powiadomienie wysłane!');   
    }
}
