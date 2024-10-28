<html>
    <head>
        <title>College Panel - Login</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <section class="college-enquiry-login py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">College Panel - Login</h2>
                </div>
                
                <div class="col-md-6 mx-auto my-4">
                    <div class="card p-4">
                        @if(Session::has('message'))
                           <div class="alert alert-danger"> {{ Session::get('message') }} </div>
                        @endif
                        
                        <form action="{{ route('enquiry-login-process') }}" method="post" class="m-0">
                            @csrf
                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                            
                            <div class="form-group  mb-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            
                                <input type="submit" class="btn btn-primary mt-2" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>