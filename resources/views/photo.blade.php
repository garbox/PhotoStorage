<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Display with Download and Share</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body class="bg-dark">
    <x-home-nav/>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center text-white">
            <!-- Image Display -->
            <img src="{{asset('storage/photos/'.$photo->filename)}}" alt="Image" class="img-fluid rounded mb-3" style="max-height: 80vh; width: auto;">

            <!-- Buttons for Download and Share -->
            <div class="d-flex justify-content-center">
                <!-- Download Button -->
                <a href="{{asset('storage/photos/'.$photo->filename)}}" download class="btn btn-primary mx-2">
                    Download
                </a>

                <!-- Share Button (example for Facebook) -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=your-image-url.jpg" target="_blank" class="btn btn-info mx-2">
                    Share on Facebook
                </a>

                <!-- Share Button (example for Twitter) -->
                <a href="https://twitter.com/intent/tweet?url=your-image-url.jpg" target="_blank" class="btn btn-info mx-2">
                    Share on Twitter
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, for better interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
