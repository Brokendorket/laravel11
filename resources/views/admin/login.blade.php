<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login - Laundry Service</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('css/st_login.css') }}" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand">
      <img src="{{ asset('img/logoo.png') }}" alt="" width="200" height="200" class="d-inline-block align-text-center" />
    </a>
  </nav>
  <br>

  <!-- Login Section -->
  <div class="container py-5">
    <br>
    <h2 class="text-center mb-4">Admin Login</h2>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!-- Session Status -->
        @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
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
        <form method="POST" action="{{ route('login') }}" class="mt-4">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @if ($errors->has('email'))
              <div class="mt-2 text-sm text-red-600">
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password" />
            @if ($errors->has('password'))
              <div class="mt-2 text-sm text-red-600">
                {{ $errors->first('password') }}
              </div>
            @endif
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center py-4">
    <br><br><br>
    <p>&copy; 2024 Laundry PodoMoro. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
