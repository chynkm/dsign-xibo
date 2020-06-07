<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function category(Request $request)
    {
        $count = $request->count;
        return response()->json([
            'html' => view('category', compact('count'))->render(),
        ]);
    }

    public function image(Request $request)
    {
        $images = [
            'img_burritos_rough.png',
            'img_desert_brownie.png',
            'img_desert_churros.png',
            'img_desert_cookie.png',
            'img_fajitas_rough.png',
            'img_nachos_rough.png',
        ];
        $count = $request->count;
        return response()->json([
            'html' => view('image', compact('count', 'images'))->render(),
        ]);
    }

    public function video(Request $request)
    {
        $videos = ['sunrise.mp4', 'water.mp4',];
        $count = $request->count;
        return response()->json([
            'html' => view('video', compact('count', 'videos'))->render(),
        ]);
    }

    public function productGroup(Request $request)
    {
        $count = $request->count;
        return response()->json([
            'html' => view('productGroup', compact('count'))->render(),
        ]);
    }

    public function product(Request $request)
    {
        $productGroup = $request->product_group;
        $count = $request->count;
        return response()->json([
            'html' => view('product', compact('count'))->render(),
        ]);
    }
}
