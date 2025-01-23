<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('storage/css/bootstrap.min.css') }}">

    <style>
        .upload-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Upload Form Column -->
            <div class="col-md-6">
                <div class="upload-container">
                    <h2 class="text-center mb-4">Upload Your Photo</h2>

                    <form action="/photo" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photos" class="form-label">Select Photo</label>
                            <input type="file" name="photos[]" id="photos" multiple required>
                            <input type="hidden" name="galleryId" value="{{$galleryId}}">
                            <input type="hidden" name="folderId" value="{{$userId}}">
                            <div class="form-text">Max file size: 5MB. Supported formats: JPG, PNG, JPEG.</div>
                        </div>

                        <button type="submit" onclick="Processing()" id="submit" class="btn btn-primary w-100">Upload</button>
                        <button class="btn btn-primary w-100 d-none" type="button" id="processing" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Processing...
                        </button>

                        @if (session('success'))
                            <div class="alert alert-success mt-3" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                @foreach ($errors->get('photo') as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Photo Gallery Section -->
            <div class="col-md-6">
                <div id="image-container"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Show processing state
        function Processing() {
            document.getElementById('processing').classList.remove('d-none');
            document.getElementById('submit').classList.add('d-none');
        }
    </script>

    <script>
        // Wait for 3 seconds and then hide the alert
        setTimeout(function() {
            document.getElementById('success-alert').classList.add('fade');
        }, 3000);
    </script>
</body>
</html>
