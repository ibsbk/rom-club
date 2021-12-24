<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\History;
use App\Models\Root;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainView(){
        $histories = History::all();
        return view('main.main', compact('histories'));
    }

    public function historyView(History $id){
        $history = $id;
        $heroes = Hero::where('history_id',$id->id)->get();
        return view('main.history', compact('history','heroes'));
    }

    public function heroView(Hero $id){
        $root = Root::where('hero_id', $id->id)->first();
        $hero = $id;
        return view('main.hero', compact('root', 'hero'));
    }
}
