<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{

    public function index()
    {
        $title = 'Garage';
        $usersCount=User::count();
        $orderCount=Order::count();
        $currentWeekOrders = Order::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])->get();
        $orderData = $currentWeekOrders->groupBy(function ($order) {
            return $order->created_at->format('Y-m-d');
        })->map(function ($groupedOrders) {
            return $groupedOrders->count();
        });
        $currentYear = Carbon::now()->year;

        $months = range(1, 12); // Array of month numbers from 1 to 12

        $userRegistrations = User::whereYear('created_at', $currentYear)
        ->selectRaw("COUNT(*) as count, MONTH(created_at) as month")
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $clientCounts = [];
    $maxUsersCount = 0;
    for ($month = 1; $month <= 12; $month++) {
        $clientCounts[] = $userRegistrations[$month] ?? 0;
        $count = $userRegistrations[$month] ?? 0;
        $maxUsersCount = max($maxUsersCount, $count);
    }

        $clientCounts=json_encode($clientCounts);
        return view('admin.dashboard.index',compact('title','usersCount','orderCount','orderData','clientCounts','maxUsersCount'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){

        $user = Auth::user();
        return view('admin.settings.edit', ['title' => 'Edit Admin Profile','user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$admin->id,
            'image' =>'nullable|image'
        ]);
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = $admin->password;
        } else {
            $input['password'] = bcrypt($input['password']);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Profile-images'), $imageName);

            // Save the image file name in the database

            $input['image']=$imageName;
        }
        $admin->fill($input)->save();
        Session::flash('success_message', 'Great! admin successfully updated!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
