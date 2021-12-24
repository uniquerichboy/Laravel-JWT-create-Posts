<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::paginate(15);

        return view('home', [
            'post' => $post
        ]);
    }

    public function create(Request $request)
    {
        foreach ($_FILES["img"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["img"]["tmp_name"][$key];
                $name = basename($_FILES["img"]["name"][$key]);
                move_uploaded_file($tmp_name, "data/$name");
            }
        }

        Post::create([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'img' => $_SERVER['HTTP_REFERER'].'/data.'.'/'.$name,
            'number' => $request->get('number'),
            'country' => $request->get('country'),
            'data' => $request->get('data'),
            'end' => $request->get('end'),
        ]);

        return back();
    }

    public function delete($id)
    {
        $article = Post::findOrFail($id);
        $article->delete();
        return back();
    }
}
