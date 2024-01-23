<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageStaticViewController extends Controller
{
    //
    public function home(): View|Factory|Application
    {
        $today = now()->format('m-d');
        $nextWeek = now()->addWeek()->format('m-d');
        $customers = Customer::count();

        $campaigns = Campaign::count();
        $messages = Message::count();
        $doctors = Doctor::count() . ", 10";

        $birthdays = Customer::whereRaw("DATE_FORMAT(birthday, '%m-%d') BETWEEN '{$today}' AND '{$nextWeek}'")->paginate(5);


        return view('pages.home')
            ->with([
                'customers' => $customers,
                'campaigns' => $campaigns,
                'messages' => $messages,
                'doctors' => $doctors,
                'birthdays' => $birthdays,
                'nextWeek' => $nextWeek,
                'smsCounterPerMonth' => '100, 152, 110, 60, 200, 153, 246, 542, 482, 152, 0, 0',
                'mailCounterPerMonth' => '100, 1520, 1150, 600, 2600, 953, 846, 1542, 1500, 852, 0, 0'
            ]);
    }
}
