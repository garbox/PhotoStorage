<!-- Profile Info Card -->
<div class="card shadow-lg">
    <div class="card-body">
        <div class="profile-header mb-4 text-center">
            <h3>{{Auth()->user()->name}}</h3>
        </div>
        <!-- Personal Info Section -->
        <div class="section-divider">
            <h5>Personal Information</h5>
            <div class="mb-3">
                <label for="customerName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="customerName" value="{{Auth()->user()->name}}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" value="{{Auth()->user()->email}}" disabled>
            </div>
        </div>
    </div>
</div>