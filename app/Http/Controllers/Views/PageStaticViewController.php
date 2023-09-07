<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Customer;
use App\Models\Campaign;
use App\Models\Message;
use App\Models\Doctor;

class PageStaticViewController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home()
    {

        $today = now()->format('m-d');
        $customers = Customer::count();

        $campaigns = Campaign::count();
        $messages = Message::count();
        $doctors = Doctor::count() . ", 10";
        $birthdays = Customer::whereRaw("DATE_FORMAT(birthday, '%m-%d') >= '{$today}')")->paginate(5);

        return view('pages.home')
            ->with([
                'customers' => $customers,
                'campaigns' => $campaigns,
                'messages' => $messages,
                'doctors' => $doctors,
                'birthdays' => $birthdays,
                'smsCounterPerMonth' => '100, 152, 110, 60, 200, 153, 246, 542, 482, 152, 0, 0',
                'mailCounterPerMonth' => '100, 1520, 1150, 600, 2600, 953, 846, 1542, 1500, 852, 0, 0'
            ]);
    }
}
