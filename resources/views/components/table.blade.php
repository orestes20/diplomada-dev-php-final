@props(['tableHead', 'tableFilters', 'total'])

<x-table-filters :tableFilters="$tableFilters" />

<div class="row mt-4">
    <div class="col table-responsive">
        <table class="table table-hover">
            <x-table-head :tableHead="$tableHead" />
            <tbody>
                {{ $slot }}
            </tbody>

        </table>
        <span style="font-size: 14px">{{ $total }} Registros encontrados</span>
    </div>
</div>

<x-table-pagination :total="$total" />
