@props(['tableFilters'])

@php
    $rowsOptions = [5, 10, 25, 50, 100];
    $orderOptions = ['ASC', 'DESC'];

    $request = Request();
    $query = $request->query;
    $hasQuery = (bool) count($query);
@endphp

<div class="row mt-1">
    <div class="col-2 d-grid gap-2">
        <button class="btn rounded-pill btn-sm fw-bold text-black text-uppercase" type="button" data-bs-toggle="collapse"
            style="background-color: #E1C564" data-bs-target="#collapseExample" aria-expanded="false"
            aria-controls="collapseExample">
            Filtros
        </button>
    </div>
</div>

<div class="collapse mt-3 {{ $hasQuery ? 'show' : '' }}" id="collapseExample">
    <form action="" method="GET" id="filterForm">
        <div class="row">
            @foreach ($tableFilters as $filter)
                <div class="col-12 col-md-3 mb-1">
                    <input type="text" class="form-control form-control-sm" placeholder={{ $filter['label'] }}
                        value="{{ $query->get($filter['name']) }}" name={{ $filter['name'] }} />
                </div>
            @endforeach
        </div>
        <div class="row mt-1">
            <div class="col-12 col-md-3">
                <label for="rows" style="font-size: 13px">Cantidad de Registros:</label>
                <select name="rows" id="rows" class="form-select form-select-sm">
                    @foreach ($rowsOptions as $item)
                        <option value={{ $item }}
                            {{ $query->get('rows') == $item
                                ? 'selected'
                                : (!$query->get('rows')
                                    ? ($item == 'DESC'
                                        ? 'selected'
                                        : '')
                                    : '') }}>
                            {{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label for="order" style="font-size: 13px">Orden:</label>
                <select name="order" id="order" class="form-select form-select-sm">
                    @foreach ($orderOptions as $item)
                        <option value={{ $item }}
                            {{ $query->get('order') == $item
                                ? 'selected'
                                : (!$query->get('order')
                                    ? ($item == 'DESC'
                                        ? 'selected'
                                        : '')
                                    : '') }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-3 d-grid gap-2">
                <button type="submit" class="btn btn-sm rounded-pill text-dark fw-bold"
                    style="background-color: #E1C564">Buscar</button>
            </div>
            <div class="col-12 col-md-3 d-grid gap-2">
                <button type="button" id="buttonClear" class="btn btn-sm rounded-pill text-white btn-danger">Limpiar
                    Filtros</button>
            </div>
        </div>
    </form>
</div>

<script>
    const filterForm = document.getElementById('filterForm');
    const buttonClear = document.getElementById('buttonClear');

    filterForm.addEventListener("submit", (e) => {
        e.preventDefault()
        const queryString = new URLSearchParams(new FormData(e.target)).toString()
        window.location.search = queryString;
    });
    buttonClear.addEventListener("click", (e) => window.location = window.location.pathname);
</script>
