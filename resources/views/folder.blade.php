<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Folders</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<x-side-nav/>

    <div class="container my-5">
        <h1 class="text-center mb-4">Photo Folders</h1>
        <!-- Add Folder Button -->
        <div class="text-center">
          <button class="btn btn-outline-primary add-folder-btn mb-3">
              <i class="bi bi-folder-plus"></i> Add Folder
          </button>
      </div>
      
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
                            <i class="bi bi-pencil edit-icon" onclick="editFolder('{{$folder['folder_name']}}')"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap 5 JS and icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    
    <script>
        // Function to handle folder editing
        function editFolder(folderName) {
            alert("You are editing the folder: " + folderName);
            // You can replace this alert with a modal or editing functionality as needed
        }

        function FolderClicked(folderId) {
            window.open("{{url('folder')}}" + "/" + folderId);
        }
    </script>
</body>
</html>
