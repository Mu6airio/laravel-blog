@extends('layouts.app')

@section('content')
<br>
{{ Session::get('massage') }}



<div id="edit" class="w3-modal">
 <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
 <div class="w3-center"><br>
 <span onclick="document.getElementById('edit').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
 </div>
 <header class="w3-container w3-text-indigo w3-margin-top-64">
 <h1>Edit Profile</h1>
 </header>
 <div class="panel-body">
   <div class="row">
   <div class="col-lg-6">

   {!! Form::open(['url' => '/profile/save','method'=>'post','role'=>'form']) !!}



 {{ csrf_field() }}
 <input type="hidden" name="id" value="{{Auth::user()->id}}">
 <div class="w3-section">
 <div class="w3-row">
 <div class="w3-col s4"><label><b>First name</b></label></div>
 <div class="w3-col s8"><input class="w3-input w3-border w3-margin-bottom" id="fname" type="text" placeholder="Enter First name" name="firstname" required>
 </div>
 </div>
 <div class="w3-row">
 <div class="w3-col s4">
 <label><b>Last name</b></label>
 </div>
 <div class="w3-col s8"><input class="w3-input w3-border w3-margin-bottom" id="lname" type="text" placeholder="Enter Last name" name="lastname" required></div>
 </div>
 <div class="w3-row">
 <div class="w3-col s4">
 <label><b>Gender</b></label>
 </div>
 <div class="w3-col s8">
 <select class="w3-select w3-border w3-margin-bottom" id="gender" name="gender" required>
 <option value="" disabled selected>Choose your option</option>
 <option value="1">Male</option>
 <option value="2">Female</option>
 </select>
 </div>
 </div>

 <div class="w3-row">
 <div class="w3-col s4">
 <label><b>Country</b></label>
 </div>
 <div class="w3-col s8"><input class="w3-input w3-border w3-margin-bottom" id="country" type="text" placeholder="Enter Country" name="country" required></div>
 </div>
<br>
 <button type="submit" class="btn btn-primary">
     Save
 </button>
 </div>
  </div>
   </div>
    </div>
     </div>
      </div>
 {!! Form::close() !!}
 </form>
 </div>
 </div>




@endsection
