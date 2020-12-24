<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $links = new Link();
        $links = $links->all();
        return view("history.index", compact("links"));
    }

    public function showHistory($id)
    {
//        dd(time());
        $link = (new Link())->find($id);
        $history = $link->histories();
        return view("history.list", [
            "link" => $link,
            "history" => $history
        ]);
    }
}
