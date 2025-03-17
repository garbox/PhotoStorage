<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Folders</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <style>
        /* Custom styling for the folder cards */
        .folder-card {
            cursor: pointer;
            transition: transform 0.1s ease-in-out;
            position: relative; /* For positioning the edit icon */
        }

        .folder-card:hover {
            transform: scale(1.01);
        }

        .folder-icon {
            font-size: 48px;
            color:rgba(26, 26, 26, 0.60);
        }

        /* Style for the edit icon */
        .edit-icon {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            color:rgba(26, 26, 26, 0.60);
            cursor: pointer;
        }
        
    </style>
</head>
<body>
<x-home-nav/>
    <div class="container-fluid mt-5 mb-3 bg-secondary">
        <h1 class="text-center mb-4">Photo Galleries</h1>
        <!-- Add Folder Button -->
        <div class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-folder-plus"></i> Add Gallery
            </button>
        </div>
        <hr>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Folder Card 1 -->
            @foreach ($galleries as $gallery)
            <div class="col">
                <!-- Card Container -->
                <div class="card folder-card shadow mb-4">
                    <!-- Card Header with Edit Icon -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- Title (This will be turned into an input field) -->
                        <h5 class="mb-0" id="gallery-name">{{$gallery['gallery_name']}}</h5>
                        <i class="bi bi-pencil edit-icon" onclick="editFolder(this, '{{$gallery['id']}}')" style="cursor: pointer;"></i>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-center">
                        <!-- Folder Icon -->
                        <div class="folder-icon mb-3" onclick="FolderClicked({{$gallery['id']}})">
                            <i class="bi bi-folder" style="font-size: 40px;"></i> <!-- Using Bootstrap Icons for folder icon -->
                        </div>
                        <!-- Description (This will also be turned into a textarea) -->
                        <p class="card-text" id="gallery-description">{{$gallery['gallery_description']}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('gallery.create')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryCreateUpdate">Add Folder</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label class="form-label" for="galleryName">Folder Name</label>
                    <input class="form-control" type="text" name="galleryName" id="galleryName" required>
                    @error('galleryName')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <label class="form-label" for="description">Description</label>
                    <input class="form-control" type="text" name="description" id="description" required>
                    @error('description')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Folder</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Bootstrap 5 JS and icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN -->
    
    
    <script>
        // Function to handle folder editing
        function editFolder(element, galleryId) {
            // Get the parent container (card header or card body)
            let cardHeader = element.closest('.card-header');
            let cardText = element.parentElement.parentElement.querySelector('p.card-text');

            // Get the title and description elements
            let titleElement = cardHeader.querySelector('h5');

            // Replace the title <h5> with an <input> field
            let titleText = titleElement.innerText; // Save the current title text
            titleElement.innerHTML = `<input type="text" value="${titleText}" id="edit-title" class="form-control">`;

            // Replace the description <p> with a <textarea>
            cardText.innerHTML = `<textarea id="edit-description" class="form-control">${cardText.innerText}</textarea>`;

            // Change the pencil icon to a save icon
            element.classList.remove('bi-pencil');
            element.classList.add('bi-save');
            element.setAttribute('onclick', `saveFolder(this, '${galleryId}')`);
        }

        function FolderClicked(galleryId) {
            window.location.assign  ("{{url('gallery')}}" + "/" + galleryId);
        }
    </script>
</body>
</html>
