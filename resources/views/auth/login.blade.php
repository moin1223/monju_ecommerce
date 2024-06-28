<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href={{ asset('frontend/Bootstrap/Css/bootstrap.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/css/login.css') }}>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 login-form">
                <h4>LOGIN FORM</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="row g-3 mt-3">
                    @csrf
                    <input type="hidden" name="device_token" id="device_token">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="loginCred" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4"
                            placeholder="******">
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <div class="mb-3">
                            <a class="ms-2 text-dark" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button form-control">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
