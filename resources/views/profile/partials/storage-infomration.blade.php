<div class="card shadow-lg mt-4">
    <div class="card-body">
        <div class="section-divider">
            <h5>Storage Information</h5>
            <hr>
            <div class="mb-4 space-info">
                <div>
                    <p><strong>Storage Usage:</strong></p>
                    <p>Used: {{$storage['used']}} GB / {{$storage['allowed']}} GB</p>
                </div>
                <div>
                    <p><strong>Remaining:</strong></p>
                    <p>{{$storage['remaning']}} GB</p>
                </div>
            </div>
            <!-- Storage Progress Bar -->
            <div class="mb-4">
                <label class="form-label">Storage Visual</label>
                <div class="progress" style="background-color: #d2d4d2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$storage['leftPercent']}}%" aria-valuenow="{{$storage['leftPercent']}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>