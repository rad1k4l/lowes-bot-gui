<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {

        $links = new Link();
        $links = $links->all();

        return view("links" , compact("links"));
    }

    public function delete (Request $request){
        $validated = $request->validate([
            "link_id" => "required|integer"
        ]);
        Link::find($validated["link_id"])->delete();
        return $this->success();
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            "url" => "required",
        ]);

        $model = new Link();
        $model->url = $validated["url"];
        $model->check = 0;
        $model->user = auth()->user()->id;
        $model->save();
        return $this->success();
    }
}
