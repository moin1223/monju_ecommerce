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
                @if (Session::has('status'))
                    <div class="alert alert-danger">
                        {{ Session::get('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h4>Forgot Password</h4>
                <form method="POST" action="{{ route('password.email') }}" class="row g-3 mt-3">
                    @csrf
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Enter Your Email</label>
                        <input type="email" name="email" class="form-control" :value="old('email')">
                    </div>
                    <div class="col-12 mt-4">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button form-control">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</html>
