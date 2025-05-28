<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // This method will return the home view
        $data['title'] = 'Insta App';
        return view('landing', $data);
    }

    public function home()
    {
        $data['title'] = 'Insta App';
        return view('home', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Post';
        return view('add-post', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Post';
        $data['id'] = $id;
        return view('detail-post', $data);
    }
}
