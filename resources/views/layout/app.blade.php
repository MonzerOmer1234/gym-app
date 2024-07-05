

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss' , 'resources/js/app.js'])

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('welcome')}}">
               <h1 class=" text-uppercase fw-normal">gym fitness</h1>
          </a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Welcome</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{route('members-data')}}">Members</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{route('expenses-data')}}">Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{route('invoices-data')}}">Invoices</a>
              </li>
              @auth

              <li class="nav-item">
                <a class="nav-link active" href="#">{{auth()->user()->name}}</a>
              </li>
              <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">

                    @csrf
                    <a class="nav-link active" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>

                </form>
              </li>
              @endauth

              @guest

              <li class="nav-item">
                <a class="nav-link active" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{route('register')}}">Register</a>
              </li>
              @endguest


            </ul>
          </div>
        </div>
      </nav>
@yield('content')

</body>
</html>
