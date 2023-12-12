@if ($errors->any())
   
    <div class="container mt-2">
        <div class="alert bg-danger text-white alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><span class="fw-semibold">{{ $error }}</span></li>
                @endforeach
            </ul>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
        </div>
    </div>

@endif