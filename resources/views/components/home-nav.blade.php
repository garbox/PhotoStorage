<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">PhotoStorage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="/#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a></li>
                @if (Auth::user() != NULL)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item" href="/dashboard">Your Galleries</a>
                        <a class="dropdown-item nav-item" href="/profile">Profile</a>
                        <a class="dropdown-item nav-item" href="">Settings</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <a onclick="event.preventDefault(); this.closest('form').submit()" class="dropdown-item nav-item" href='{{route('logout')}}'>Logout</a>
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

