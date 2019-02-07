<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class ProfileController extends Controller
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
   *
   *
   *
   */
  public function index()
  {
      //$posts = Post::all();
      $user = Auth::user();

      $pass_data_to_view['user'] = $user;
      return view('pages.profile', $pass_data_to_view);

}
public function save (Request $request)
{
  $this->validate($request, [
      'firstname' => 'required|string|max:255',
      'lastname' => 'required|string|max:255',
      'gender' => 'required|in:1,2',
      'country' => 'required|string|max:255',
    ]);

  $profile = User::find($request->input('id'));

  $profile->firstname = $request->input('firstname');
  $profile->lastname = $request->input ('lastname');
  $profile->gender = $request->input ('gender');
  $profile->country = $request->input('country');
  $profile->IsProfile = 1;

  $profile->save();

  return redirect('/dashboard')->with('success',"Data insert successfully");
}

}
