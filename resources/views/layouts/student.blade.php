<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <style>
        header{ background: linear-gradient(358deg, #0000001c, #00000003); padding: 15px; }
        header .menu{ list-style: none; display: flex; justify-content: flex-end; margin: 0; }
        header .menu li { padding: 0 10px; }
        section { padding: 3rem; }
        .heading{ margin-bottom: 25px; }
        .cut-off-section{ background: aliceblue; }
        .student-neet-form-section{ background: antiquewhite; }
        
        
        @media(max-width:992px){
            section { padding: 2rem; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="menu">
                        <li>{{ ucfirst(Auth::guard('student')->user()->name) }}</li>
                        <li><a href="{{ url('student-logout') }}" class="nav-link">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    @yield('content')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>