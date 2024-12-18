<div class="m-0">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                {{ $title ?? 'Dashboard' }}
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $breadcrumb ?? 'Dashboard' }}</li>
            </ol>
        </div>
    </div>
</div>
