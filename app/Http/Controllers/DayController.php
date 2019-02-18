<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewDay;

class DayController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Cache::remember('days', 60, function () {
            return DB::table('days')->orderBy('id', 'desck')->get();
        });
        return $days;
    }

    public function show($slug) {
        $tDay = Day::where('slug', $slug)->first();
        $tDay->view();
        return view('day.show', compact('tDay'));
    }

    public function addEmail(Request $request) {
        if(count(Email::where('email', $request->email)->first()) == 0) {
            $email = new Email;
            $email->email = $request->email;
            $email->save();
            return response()->json(['success'=>'Почта добавлена']);
        }
        else
            return response()->json(['error'=>'Данная почта уже существует']);
    }
}
