<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Folders</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
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
            color: #007bff;
        }

        /* Style for the edit icon */
        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            color: #007bff;
            cursor: pointer;
        }
        .add-folder-btn {
            font-size: 24px;
            color: #007bff;
            cursor: pointer;
            margin-bottom: 20px;
        }
        
    </style>
</head>
<body>
<x-home-nav/>
    <div class="container mt-5 mb-3">
        <h1 class="text-center mb-4">Photo Folders</h1>
        <!-- Add Folder Button -->
        <div class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-folder-plus"></i> Add Folder
            </button>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Folder Card 1 -->
            @foreach ($folders as $folder)
                <div class="col" onclick='FolderClicked({{$folder['id']}})'>
                    <div class="card folder-card shadow">
                        <div class="card-body text-center">
                            <div class="folder-icon mb-3">
                                <i class="bi bi-folder"></i> <!-- Using Bootstrap Icons for folder icon -->
                            </div>
                            <h5 class="card-title">{{$folder['folder_name']}}</h5>
                            <p class="card-text">{{$folder['folder_description']}}</p>
                            <!-- Edit Icon -->
                            <i class="bi bi-pencil edit-icon" onclick="editFolder('{{$folder['id']}}')"></i>
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
            <form action="{{route('folder.create')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Folder</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label class="form-label" for="folderName">Folder Name</label>
                    <input class="form-control" type="text" name="folderName" id="folerName" required>
                    @error('folderName')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <label class="form-label" for="description">Description</label>
                    <input class="form-control" type="text" name="description" id="description">
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
        function editFolder(folderName) {
            alert("You are editing the folder: " + folderName);
            // You can replace this alert with a modal or editing functionality as needed
        }

        function FolderClicked(folderId) {
            window.location.replace("{{url('folder')}}" + "/" + folderId);
        }
    </script>
</body>
</html>
