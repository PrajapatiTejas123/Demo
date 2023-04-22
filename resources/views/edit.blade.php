@extends('main')
@section('content')

<form method="POST" action="{{ route('update',$crud->id)}}" enctype="multipart/form-data">
  @csrf
<div class="container">
  <div class="row">
      <div class="col-md-12 text-center form p-4">
          <h3>Edit User</h3>
      </div>
  </div>
  <div class="container">
      <div class="row mt-2">
        <div class="col">
          <label for="First Name" class="form-label">First Name<span style="color: red;">*</span></label>
          <input type="text" name="firstname" value="{{old('firstname',$crud->firstname)}}" class="form-control" placeholder="First name">
          @error('firstname')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col">
          <label for="Last Name" class="form-label">Last Name<span style="color: red;">*</span></label>
          <input type="text" name="lastname" value="{{old('lastname',$crud->lastname)}}" class="form-control" placeholder="Last name">
          @error('lastname')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
          <label for="email" class="form-label">Your Email<span style="color: red;">*</span></label>
          <input type="email" name="email" value="{{old('email',$crud->email)}}" class="form-control" placeholder="Your Email">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col">
          <label for="image" class="form-label">Upload Image</label>
          <input type="file" name="image" value="{{old('image',$crud->image)}}" class="form-control" placeholder="Upload Image">
          @error('image')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

       <div class="row mt-0">
        <div class="col">
          <label for="dob" class="form-label">Date Of Birth<span style="color: red;">*</span></label>
          <input type="date" name="dob" value="{{old('dob',$crud->dob)}}" class="form-control" placeholder="Date Of Birth">
          @error('dob')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col mt-4">
           <label for="gender">Gender</label>
          <div class="form-check form-check-inline">
            <input type="radio" id="male" name="gender" value="male"{{ old('gender',$crud->gender) == 'male' ? 'checked' : '' }} >
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" id="female" name="gender" value="female"{{ old('gender',$crud->gender) == 'female' ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio2">Female</label>
        </div> 
         <div class="col">
           @error('gender')
          <span class="text-danger">{{ $message }}</span>
          @enderror</div>
      </div>
      </div>

      <!-- <label for="gender" class="form-label">Gender</label>
      <div class="mb-3">
        <div class="form-check form-check-inline">
          <input type="radio" id="male" name="gender" value="male">
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" id="female" name="gender" value="female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
      </div> -->

      <div class="row mt-2">
        <div class="col">
          <label for="mobile" class="form-label">Mobile No<span style="color: red;">*</span></label>
          <input type="text" name="mobile" value="{{old('mobile',$crud->mobile)}}" class="form-control" placeholder="Mobile No">
          @error('mobile')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col">
          <div class="form-group mb-3 mt-4">
            <label for="country" class="form-label">Select Country<span style="color: red;">*</span></label>
            <select  id="country-dropdown" name="country_id" class="form-control">
              <option value="">Select Country</option>
                  @foreach ($countries as $data)
                    <option value="{{$data->id}}" {{(old('country_id',$users->country_id) == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                        @endforeach
            </select>
            @error('country_id')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
         <!--  <label for="country" class="form-label">Country<span style="color: red;">*</span></label>
           <select name="country" id="country" value="{{old('country')}}" class="form-select form-control" aria-label="Default select example">
            <option value="">Select Country</option>
            <option value="India" {{ old('country',$crud->country) == 'India' ? 'selected' : '' }}>India</option>
            <option value="Australia"{{ old('country',$crud->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
            <option value="USA" {{ old('country',$crud->country) == 'USA' ? 'selected' : '' }}>USA</option>
           </select>
           @error('country')
          <span class="text-danger">{{ $message }}</span>
          @enderror  -->
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
          <div class="form-group mb-3">
            <label for="state" class="form-label">Select State<span style="color: red;">*</span></label>
            <select name="state_id" id="state-dropdown" class="form-control">
               <option value="">Select State</option>
                  @foreach ($state as $data)
                    <option value="{{$data->id}}" {{(old('state_id',$users->state_id) == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                        @endforeach
            </select>
          @error('state_id')
            <span class="text-danger">{{ $message }}</span>
          @enderror 
          </div>
          <!-- <label for="state" class="form-label">State<span style="color: red;">*</span></label>
           <select name="state" value="{{old('state',$crud->state)}}" class="form-select form-control" aria-label="Default select example">
            <option value="">Select State</option>
            <option value="Gujarat" {{ old('state',$crud->state) == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
            <option value="MP" {{ old('state',$crud->state) == 'MP' ? 'selected' : '' }}>MP</option>
            <option value="UP" {{ old('state',$crud->state) == 'UP' ? 'selected' : '' }}>UP</option>
           </select>
           @error('state')
          <span class="text-danger">{{ $message }}</span>
          @enderror  -->
        </div>
        <div class="col">
          <div class="form-group">
            <label for="city" class="form-label">Select City<span style="color: red;">*</span></label>
            <select name="city_id" id="city-dropdown" class="form-control">
               <option value="">Select City</option>
                  @foreach ($city as $data)
                    <option value="{{$data->id}}" {{(old('city_id',$users->city_id) == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                        @endforeach
            </select>
          @error('city_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>
          <!-- <label for="city" class="form-label">City<span style="color: red;">*</span></label>
           <select name="city" value="" class="form-select form-control" aria-label="Default select example">
            <option value="">Select City</option>
            <option value="Ahmedabad" {{ old('city',$crud->city) == 'Ahmedabad' ? 'selected' : '' }}>Ahmedabad</option>
            <option value="Surat" {{ old('city',$crud->city) == 'Surat' ? 'selected' : '' }}>Surat</option>
            <option value="Dholka" {{ old('city',$crud->city) == 'Dholka' ? 'selected' : '' }}>Dholka</option>
           </select>
           @error('city')
          <span class="text-danger">{{ $message }}</span>
          @enderror  -->
        </div>
      </div>
     
    <div class="text-center">
      <div class="form-check form-check-inline text-center mt-4">
        <input class="form-check-input" checked type="checkbox" {{ old('terms&condition') == '1' ? 'checked' : '' }} name="terms&condition" id="inlineCheckbox1" value="1">
        <label class="form-check-label" for="inlineCheckbox1">I agree all statements in Terms of service</label>
      </div>
    </div>
    <div class="text-center">
      @error('terms&condition')
      <span class="text-danger text-center" style="text-align: center;">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3 text-center pt-2">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function getState(idCountry){
  // $("#state-dropdown").html('');
       $.ajax({
                    url: "{{url('fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value=""> Select City </option>');
                    }
                });
}
function getCity(idState){
  // $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
}

      $(document).ready(function () {
          var oldcity = "{{old('city')}}";
          var oldcountry = "{{old('country')}}";
          if(oldcountry){
            $('#country-dropdown option[value="'+oldcountry+'"]').attr('selected','selected');
              getState(oldcountry);
              setTimeout(function(){
                $('#state-dropdown option[value="'+oldstate+'"]').attr('selected','selected');
              }, 400);
              getCity(oldstate)
          }
          var oldstate = "{{old('state')}}";
          if(oldstate){
            $('#state-dropdown option[value="'+oldstate+'"]').attr('selected','selected');
              setTimeout(function(){
                $('#city-dropdown option[value="'+oldcity+'"]').attr('selected','selected');
              }, 400);
            getCity(oldstate);
          }

            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                  getState(idCountry)
            });
  
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                getCity(idState)
               
            });
  
        });
</script>

@endsection