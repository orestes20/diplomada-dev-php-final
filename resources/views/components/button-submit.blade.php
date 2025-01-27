<div class="row mt-4">
    <div class="col-12 col-md-4 offset-md-4 d-grid gap-2">
        <button id="submitButton" type="submit" class="btn btn-sm rounded-pill fw-bold text-white"
            style="background-color: #203767">
            <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status"></div>
            {{ $slot }}
        </button>
    </div>
</div>
