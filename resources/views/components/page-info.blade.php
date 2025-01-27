@props(['title', 'breadCrumb', 'icon'])

<div class="row mb-4">
    <div class="col d-flex align-items-center">
        <div style="width: 50px; height: 50px; background-color: #203767"
            class="text-white rounded-3 d-flex align-items-center justify-content-center me-3">
            <i class="{{ $icon }}" style="font-size: 20px"></i>
        </div>
        <div class="d-flex flex-column mt-auto">
            <h3 class="mb-0">{{ $title }}</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    @foreach ($breadCrumb as $item)
                        <li class="breadcrumb-item text-muted">{{ $item }}</li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
