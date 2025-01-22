<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<x-home-nav/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Log In</h3>
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="login" method="POST" id='login'>
                        @csrf
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value='{{ $user->email ?? '' }}' placeholder="Enter your email address" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control bg-danger-light" id="password" name="password" placeholder="Enter password" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Log In</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Need an account? <a href="/register">Create New Account</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script>
    function adminFunction() {
    // Get the input element by its ID
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var form = document.getElementById('login');
    
    // Check if the email input exists
    if (emailInput) {
        // Add the new value to the input field
        emailInput.value = 'admin@email.com';
        passwordInput.value = '123ABC';
        form.submit();
    } else {
        console.log('Input with ID "email" not found.');
    }
}

function userFunction() {
    // Get the input element by its ID
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var form = document.getElementById('login');
    
    // Check if the email input exists
    if (emailInput) {
        // Add the new value to the input field
        emailInput.value = 'user@email.com';
        passwordInput.value = '123ABC';
        form.submit();
    } else {
        console.log('Input with ID "email" not found.');
    }
}

</script>

</body>
</html>
