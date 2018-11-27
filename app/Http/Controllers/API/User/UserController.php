<?php

namespace App\Http\Controllers\API\User;

use App\Notifications\UserRegisteredSuccessfully;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User; 
use Auth;
use Hash;

class UserController extends Controller
{
   
    public function __construct(){

        $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        
        $users = User::where('firstname', 'like', '%' . $request->filter . '%')
            ->subordinates(Auth::User())
            ->relTable()
            ->get();

        return response()->json([

            'users' => $this->paginate($users)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(User $user, Request $request)
    {
        
        $user  = User::create($request->all());
        $user = User::find($user->id);
        $user->activation_code = str_random(30).time();
        $user->password = Hash::make($request->password);
        $user->update();
        
        // $user->notify(new UserRegisteredSuccessfully($user));

        return response()->json([
                'success' => true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        
        return response()->json([
                'user' => User::where('id', $request->id)
                    ->relTable()
                    ->first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $user = User::find($request->id);
        $user->roles()->detach();
        $newroles = [];
        foreach($request->roles as $role){
            $newroles[] = ['role_id' => $role ];
        }
        $user->roles()->sync($newroles);
        $user->address()->update([
            'country_id' => $request->address['country_id'],
            'region_id' => $request->address['region_id'],
            'province_id' => $request->address['province_id'],
            'city_id' => $request->address['city_id'],
            'brgy_id' => $request->address['brgy_id'],
            'street_lot_blk' => $request->address['street_lot_blk']
        ]);
        $user->information()->update([
            'employee_id' => $request->informations['employee_id'],
            'gender_id' => $request->informations['gender_id'],
            'birthdate' => $request->informations['birthdate'],
            'mobile' => $request->informations['mobile'],
            'nationality' => $request->informations['nationality'],
            'civil_status_id' => $request->informations['civil_status_id']
        ]);
        $user->update($request->all());
        return response()->json([
               'success' => true,
               'user' => User::find($request->id)
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        //
    }


    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }

}
