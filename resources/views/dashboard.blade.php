<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Folders</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        /* Custom styling for the folder cards */
        .folder-card {
            cursor: pointer;
            transition: transform 0.1s ease-in-out;
            position: relative; /* For positioning the edit icon */
        }

        .folder-card:hover {
            transform: scale(1.02);
        }

        .folder-icon {
            font-size: 48px;
            color: rgba(26, 26, 26, 0.60);
        }

        /* Style for the edit icon */
        .edit-icon {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            color: rgba(26, 26, 26, 0.60);
            cursor: pointer;
        }
    </style>
</head>
<body>
<x-home-nav/>

<div class="container-fluid mt-5">
    <div class="bg-dark p-4 rounded">
        <h1 class="text-center text-white">Photo Galleries</h1>
        <div class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-folder-plus"></i> Add Gallery
            </button>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($galleries as $gallery)
        <div class="col">
            <div class="card folder-card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" id="gallery-name">{{$gallery['gallery_name']}}</h5>
                    <i class="bi bi-pencil edit-icon" onclick="editFolder(this, '{{$gallery['id']}}')"></i>
                </div>
                <div class="card-body text-center">
                    <div class="folder-icon mb-3" onclick="FolderClicked({{$gallery['id']}})">
                        <i class="bi bi-folder"></i>
                    </div>
                    <p class="card-text" id="gallery-description">{{$gallery['gallery_description']}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('gallery.create')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryCreateUpdate">Add Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label" for="galleryName">Folder Name</label>
                    <input class="form-control" type="text" name="galleryName" id="galleryName" required>
                    @error('galleryName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label mt-2" for="description">Description</label>
                    <input class="form-control" type="text" name="description" id="description" required>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Folder</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function editFolder(element, galleryId) {
        let cardHeader = element.closest('.card-header');
        let cardText = element.closest('.card').querySelector('p.card-text');

        let titleElement = cardHeader.querySelector('h5');

        let titleText = titleElement.innerText;
        titleElement.innerHTML = `<input type="text" value="${titleText}" class="form-control">`;

        cardText.innerHTML = `<textarea class="form-control">${cardText.innerText}</textarea>`;

        element.classList.remove('bi-pencil');
        element.classList.add('bi-save');
        element.setAttribute('onclick', `saveFolder(this, '${galleryId}')`);
    }

    function FolderClicked(galleryId) {
        window.location.assign("{{url('gallery')}}" + "/" + galleryId);
    }
</script>

</body>
</html>
