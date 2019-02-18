<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use YandexMetrika;
use App\Models\Day;
use App\User;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $userViews = YandexMetrika::getVisitsViewsUsers()->adapt()->adaptData;
        //Получаем и обрабатываем данные по регионам -> городам
        $geoRegionPie = YandexMetrika::getGeoArea()->adapt()->adaptData;
        $topPages = YandexMetrika::getTopPageViews(30, 5)->adapt()->adaptData;
        $topPlatforms = YandexMetrika::getTechPlatforms()->adapt()->adaptData;
        $countDays = count(Day::all());
        $countAdmins = count(User::all());
        $days = Day::all();

        $countViews = 0;
        foreach($days as $day) {
            $countViews += $day->views;
        }

        // dd($topPlatforms);
        return view('backpack::dashboard', $this->data, compact('countViews', 'geoRegionPie', 'topPages', 'topPlatforms', 'countDays', 'countAdmins', 'userViews'));
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }
}
