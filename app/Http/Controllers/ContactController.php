<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ContactController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('contact');
    }

    protected function contact(array $data)
    {
        /*return Post::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile'=>$data['mobile']
            'subject' => $data['subject'],
        ]);*/
    }

}
