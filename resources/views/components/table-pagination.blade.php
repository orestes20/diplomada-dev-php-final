@props(['total'])

@php
    $request = Request();
    $query = $request->query;
    $page = $query->get('page') ? $query->get('page') : 1;
    $rows = $query->get('rows') ? $query->get('rows') : 5;
    $totalPages = (int) ceil($total / $rows);
@endphp

<div class="row mt-3">
    <div class="col">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li
                    class="page-item {{ $query->get('page') == 1 ? 'disabled' : (!$query->get('page') ? 'disabled' : '') }}">
                    <a class="page-link" href="#"
                        onclick="setPage({{ $query->get('page') - 1 }})">{{ '<' }}</a>
                </li>
                @for ($i = 1; $i <= $totalPages; $i++)
                    <li
                        class="page-item {{ $query->get('page') == $i ? 'active' : (!$query->get('page') ? ($i == '1' ? 'active' : '') : '') }}">
                        <a class="page-link" href="#" onclick="setPage({{ $i }})">
                            {{ $i }}
                        </a>
                    </li>
                @endfor
                <li class="page-item {{ $query->get('page') == $totalPages ? 'disabled' : '' }}">
                    <a class="page-link" href="#"
                        onclick="setPage({{ $query->get('page') ? $query->get('page') + 1 : 2 }})">{{ '>' }}</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    const setPage = (page) => {
        const queryString = new URLSearchParams(window.location.search)
        queryString.set('page', page)
        window.location.search = queryString.toString()
    }
</script>
