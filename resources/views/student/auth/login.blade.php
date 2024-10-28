@extends('layouts.site')

@section('content')
    <section class="login-section my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card p-4 shadow border-0">
                        @if(Session::has('msg'))
                                {!! Session::get('msg') !!}
                              @endif
                        @if(Session::has('login_msg'))
                            {!! Session::get('login_msg') !!}
                        @endif
                        <form action="{{ url('student_login_process') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                         <div class="text-center">
                                <a href="{{ route('student-neet-form') }}" class="text-primary">Don't have account? Sign up</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection