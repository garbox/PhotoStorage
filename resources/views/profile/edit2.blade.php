<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Photo Storage</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
        }
        .profile-header {
            text-align: center;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .space-info {
            display: flex;
            justify-content: space-between;
        }
        .section-divider {
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
            padding-bottom: 20px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .col-md-6 {
            padding-left: 15px;
            padding-right: 15px;
        }
        .section-divider h5 {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
<x-home-nav/>
<div class="container-fluid profile-container">
    <div class="row">
        <!-- Left Column for Profile Info -->
        <div class="col-md-6 col-12 mb-4">
            <!-- Profile Info Card -->
            @include('profile.partials.update-profile-information-form')

            <!-- Storage Info Card -->
            @include('profile.partials.storage-infomration')
        </div>

        <!-- Right Column for Change Password Form -->
        <div class="col-md-6 col-12 mb-4">
            <!-- Change Password Card -->
            @include('profile.partials.update-password-form')
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
