<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photo Storage Gallery</title>
  <!-- Bootstrap 5 CDN -->
  <link rel="stylesheet" href="{{ asset('storage/css/bootstrap.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Styling for the side menu */
    .side-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #f8f9fa;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .side-menu button {
      width: 100%;
      margin-bottom: 10px;
    }

    .main-content {
      margin-left: 270px;
    }

    /* QR Code Styling */
    .qr-code-container {
      position: absolute; /* Position it absolutely within the side menu */
      bottom: 5%; /* Place it at the bottom of the side menu */
      left: 20px;
      width: calc(100% - 40px); /* Make it responsive */
      text-align: center;
    }
  </style>
</head>
<body>
  <x-home-nav/>

  <!-- Side Menu (Upload Section) -->
  <div class="side-menu d-none d-md-block">
    <div class="upload-container">
      <h4 class="text-center mt-5">Upload Your Photo</h4>
      <hr>

      <form action="/photo" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <input type="file" name="photos[]" id="photos" multiple required>
          <input type="hidden" name="galleryId" id="galleryId" value="{{$gallery->id}}">
          <div class="form-text">Max file size: 5MB. Supported formats: JPG, PNG, JPEG.</div>
        </div>

        <button onclick="Processing()" type="submit" id="submit" class="btn btn-primary w-100">Upload</button>
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

    <!-- QR Code Container -->
    <div class="qr-code-container">
      <h4 class="text-center">Photo on your phone? Scan Here!</h4>
      <div>
        {{ QRCode::url(url("/mobile/" . Auth::user()->id ."/". $gallery->id))->setsize(6)->svg() }}
      </div>
    </div>
  </div>

  <!-- Main Content (Gallery Section) -->
  <div class="main-content container mt-5">
    <h1 class="text-center mb-4">{{$gallery->gallery_name}}</h1>
    <p class="text-center">{{$gallery->gallery_description}}</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($contents as $photo)
        <!-- Photo Card -->
        <div class="col" style="width: 18rem;">
          <div class="card" >
            <a href="{{url('photo/'. $photo['id'])}}"><img src="{{asset('storage/photos/'.$photo->filename)}}" class="card-img-top"></a>
          </div>
        </div>
        @endforeach
    </div>
  </div>

  <!-- Bootstrap 5 JS and Popper.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
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
