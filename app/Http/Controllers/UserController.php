<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\{Country, State, City};

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $cruds = User::with('country')->orderBy('id','desc')->paginate(config('page.items')); 
        return view('viewuser',compact('cruds'));
    }
    public function adduser()
    {
        $countries = Country::get(["name", "id"]);
        //$state = State::get(["name","id"]);
        //$city = City::get(["name","id"]);
        //$data['state'] = State::get(["name", "id"]);
        //$data['city'] = City::get(["name", "id"]);
        return view('adduser',compact('countries'));
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
                    ->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                    ->get(["name", "id"]);       
        return response()->json($data);
    }

    public function insert(Request $request)
    {
         $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'image' => 'required|mimes:png,jpeg,gif',
            'dob' => 'required',
            'gender' => 'required',
            'mobile' => 'required|digits:10',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'terms&condition' => 'required',

        ],
        [
            'firstname.required'=>'Please enter your Firstname',
            'lastname.required'=>'Please enter your Lastname',
            'email.required'=>'Please enter your Email',
            'password.required'=>'Please enter your Password',
            'password_confirmation.required'=>'Please enter your Confirm Password',
            'image.required'=>'Please upload your Image',
            'dob.required'=>'Please enter your BirthDate',
            'mobile.required'=>'Please enter your Mobile Number',
            'gender.required'=>'Please Select your Gender',
            'country_id.required'=>'Please Select your Country',
            'state_id.required'=>'Please Select your State',
            'city_id.required'=>'Please Select your City',
            'terms&condition.required'=>'Please Accept Your Terms & Condition',
        ]);
       
            $users = new user;
        
                $users->firstname = $request->firstname;
                $users->lastname = $request->lastname;
                $users->email = $request->email;
                $users->password = Hash::make($request['password']);
                //$users->confirmpassword =  Hash::make($request['confirmpassword']);
                
                $imageName = time().'.'.$request->image->extension();
                
                $request->image->move(public_path('image'), $imageName);
                
                $users->image = $imageName;

                $users->dob = $request->dob;
                $users->gender = $request->gender;
                $users->mobile = $request->mobile;
                $users->country_id = $request->country_id;
                $users->state_id = $request->state_id;
                $users->city_id = $request->city_id;

                $users->save();

                return redirect('/')->with('success', 'User Added Successfully.');
    }

    public function edit($id){
        $crud= User::find($id);
        $users=User::find($id); 
        $countries = Country::get(["name", "id"]);
        $state = State::where("country_id",$users->country_id)->get(["name","id"]);
        $city = City::where("state_id",$users->state_id)->get(["name","id"]);
        return view('edit',compact('crud','countries','users','state','city'));
    }

    public function update(Request $request,$id){
        //echo "<pre>"; print_r(expression); exit;

         $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'image' => 'mimes:png,jpeg,gif',
            // 'password' => 'required',
            // 'confirmpassword' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'mobile' => 'required|digits:10',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'terms&condition' => 'required',
        ]);

         $users = user::find($id);
              // echo "<pre>"; print_r($users); exit;
                $users->firstname = $request->firstname;
                $users->lastname = $request->lastname;
                $users->email = $request->email;
    
                if(isset($request->image)) 
                {
                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('image'), $imageName);
                    $users->image = $imageName;
                } 
    
                $users->dob = $request->dob;
                $users->gender = $request->gender;
                $users->mobile = $request->mobile;
                $users->country_id = $request->country_id;
                $users->state_id = $request->state_id;
                $users->city_id = $request->city_id;

                $users->save();
                return redirect('/')->with('success', 'User Updated Successfully.');
    }

    public function single($id){
        $crud= User::find($id);  
        return view('single',compact('crud'));
    }

    public function destroy($id){

        $users=User::find($id);  
        $users->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully.');  

    }
}
