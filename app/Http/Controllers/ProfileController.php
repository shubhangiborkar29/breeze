<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $country = Country::find($user->country_id);
        $state = State::find($user->state_id);
        $city = City::find($user->city_id);

        return view('dashboard',compact('user','country','state','city'));
    }
    public function table(){
        $d=Auth::user();
        $country = Country::find($d->country_id);
        $state = State::find($d->state_id);
        $city = City::find($d->city_id);
        return view('table',compact('d','country','state','city'));
    }
    public function edit($id){
        $data=Auth::user();
        $countries = Country::get(["name", "id"]);
        return view('edit',compact('data','countries'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'password' => ['nullable','max:8'],

            ]);
        $data=User::find($id);
        $data->name=$request->name;
        $data->surname=$request->surname;
        $data->email=$request->email;
        $data->phone_number=$request->phone_number;
        $data->address=$request->address;
        $data->pin_code=$request->pin_code;
        $data->country_id=$request->country_id;
        $data->state_id=$request->state_id;
        $data->city_id=$request->city_id;
        $data->password=bcrypt($request->password);
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->route('table')->with('msg','Data Update Successfully!');
    }
}
