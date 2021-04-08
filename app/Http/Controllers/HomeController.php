<?php

namespace App\Http\Controllers;

use App\User;
use App\M_Customer;
use App\Logs;
use App\Logging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::paginate(5);
        $customer = M_Customer::paginate(5);

        return view('dashboard.admin.index', compact('user', 'customer'));
    }

    public function logs()
    {
        if(Gate::allows('usir_customer')){
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }

        $logs = Logging::paginate(5);

        return view('dashboard.admin.logs', compact('logs'));
    }
}
