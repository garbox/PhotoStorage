<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photo Storage Gallery</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<x-side-nav/>

  <!-- Main Content (Gallery Section) -->
  <div class="container my-4">
    <h1 class="text-center mb-4">Photo Storage Gallery</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($contents as $photo)
      <!-- Photo Card -->
      <div class="col">
        <div class="card">
          <img src="{{asset('storage/photos/'.$photo->filename)}}" class="card-img-top" alt="Image 1">
          <div class="card-body">
            <button class="btn btn-outline-primary">
              <i class="bi bi-download"></i>
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Bootstrap 5 JS and Popper.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
