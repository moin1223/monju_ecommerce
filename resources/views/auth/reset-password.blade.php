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
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{session()->get('message')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="col-md-5 login-form">
                <h4>Reset Password</h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{route('password.store')}}" class="row g-3 mt-3">
                    @csrf
                    {{-- @method('PUT') --}}
                        <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="moin@gmail.com">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="*******">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password') is-invalid @enderror" id="inputPassword4"
                            placeholder="******">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-4">
                      </div>
                    <div class="col-12">
                        <button type="submit" class="button form-control">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
