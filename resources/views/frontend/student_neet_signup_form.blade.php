@extends('layouts.site')
@section('content')
<style>
    label{ margin-bottom: 3px; }
</style>
<section class="student-neet-form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 card p-4 my-5 mx-auto" style="border: 0; box-shadow: 2px 2px 22px #80808047;">
                <h2 class="text-center">Student Sign Up Form</h2>
                <form action="{{ url('student_registration') }}" method="post" id="sign_up_form">
                                @csrf
                                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label>Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message  }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mobile:</label>
                                    <input type="text" class="form-control" placeholder="Enter mobile" name="mobile" required>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message  }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message  }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>State:</label>
                                    <select class="form-control" name="state">
                                        <option value="" disabled selected>Choose State</option>
                                        @foreach($states as $row)
                                        <option>{{ $row->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Interested Course:</label>
                                    <select class="form-control" name="interested_course">
                                        <option value="" disabled selected>Interested Course</option>
                                        @foreach($courses as $row)
                                        <option>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group my-2 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                                </form>
                <div class="text-center">
                    <a href="{{ route('student_login') }}" class="text-primary">Already have an account?</a>
                </div>
            </div>
        </div>   
    </div>    
</section>

<script>
 
    $('#sign_up_form').validate({  
    rules: {  
      name: 'required',  
      mobile: 'required',  
      email: 'required',  
      state: 'required',  
      interested_course: 'required',  
     },  
    messages: {  
      name: 'This field is required',  
    },  
    submitHandler: function(form) {  
      $('#sign_up_form').submit();  
    }  
  });
</script>
@endsection