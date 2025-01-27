@props(['href'])

<div class="row">
    <div class="col-12 col-md-4 d-grid gap-2">
        <a href={{ $href }}
            class="btn fw-bold d-flex align-items-center justify-content-center rounded-5 btn-sm text-white"
            style="font-size: 14px; background-color: #203767">
            <span>{{ $slot }}</span>
            <i class="fa-solid fa-plus ms-2"></i>
        </a>
    </div>
</div>
