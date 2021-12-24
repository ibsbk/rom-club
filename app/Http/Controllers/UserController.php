<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\History;
use App\Models\Root;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;

class UserController extends Controller
{
    public function authAdminView()
    {
        if (!Auth::user()) {
            return view('admin.authAdmin');
        } else {
            return redirect()->route('/');
        }
    }

    public function authAdminPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('login', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('lkAdmin');
        } else {
            return back()->withErrors(['authError' => 'неверный логин или пароль']);
        }
    }

    public function lkAdminView()
    {
        return view('admin.lkAdmin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }

    public function createHeroView()
    {
        $histories = History::all();
        return view('admin.createHero', compact('histories'));
    }

    public function createHeroPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'image' => 'file|mimes:png,jpg,gif|max:10240',
            'history_id' => 'required',
            'root' => 'required'
        ]);
        $date = Carbon::create($request->birthday);
        $day = $date->day;
        $month = $date->month;
        $signs = array("Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девы", "Весы", "Скорпион", "Стрелец");
        $signsstart = array(1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23);
        $zodiac_sign = $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
        $image_name = explode('/',$request->file('image')->store('public'))[1];
        $data=[
          'name'=>$request->name,
          'birthday'=>$date,
          'zodiac_sign'=>$zodiac_sign,
          'image'=>$image_name,
          'history_id'=>$request->history_id,
        ];
        $hero = Hero::create($data);
        $root_data=[
            'description'=>$request->root,
            'hero_id'=>$hero->id,
        ];
        Root::create($root_data);
        return redirect()->route('/');
    }

    public function createHistoryView(){
        return view('admin.createHistory');
    }

    public function createHistoryPost(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        History::create($request->only('name', 'description'));
        return redirect()->route('/');
    }
}
