<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoStorage - Your Trusted Photo Storage Service</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        /* Custom styles */
        .hero-section {
            background-image: url('https://as1.ftcdn.net/v2/jpg/05/26/70/36/1000_F_526703691_ggVqWeChXJo5M1bAQOfD4UqmJnuzZHo2.jpg');
            background-size: cover;
            background-position: center;
            height: 50vh;
            color: white;
        }
        .feature-icon {
            font-size: 3rem;
            color: #5c636a;
        }
        .pricing-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<x-home-nav/>

<!-- Hero Section -->
<section class="hero-section d-flex justify-content-center align-items-center text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Store Your Memories, Forever</h1>
        <p class="lead">Safe, secure, and unlimited photo storage for you and your loved ones</p>
        <a href="#pricing" class="btn btn-primary btn-lg mt-4">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Why Choose Us?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-cloud-upload"></i>
                </div>
                <h4>Massive Storage</h4>
                <p>Store all your photos with our tardis servers.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h4>Top-Notch Security</h4>
                <p>Your photos are safe with our server hamsters.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-sd-card"></i>
                </div>
                <h4>Access Anywhere</h4>
                <p>Access your photo library on any device, anytime.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Choose Your Plan</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card pricing-card">
                    <div class="card-header text-center">
                        <h4>Free Plan</h4>
                    </div>
                    <div class="card-body text-center">
                        <h2>$0</h2>
                        <p>500gb of storage</p>
                        <a href="#" class="btn btn-primary w-100">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pricing-card">
                    <div class="card-header text-center">
                        <h4>Premium Plan</h4>
                    </div>
                    <div class="card-body text-center">
                        <h2>$40/month</h2>
                        <p>1TB of storage</p>
                        <a href="#" class="btn btn-primary w-100">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pricing-card">
                    <div class="card-header text-center">
                        <h4>Business Plan</h4>
                    </div>
                    <div class="card-body text-center">
                        <h2>$115/month</h2>
                        <p>500TB of storage</p>
                        <a href="#" class="btn btn-primary w-100">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-light">
    <div class="container text-center">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us!</p>
        <a href="mailto:support@photostorage.com" class="btn btn-outline-primary">Email Us</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2025 PhotoStorage. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap 5 JS & Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
