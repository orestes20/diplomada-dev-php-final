@props(['tableHead'])

<thead>
    <tr>
        @foreach ($tableHead as $th)
            <th scope="col">{{ $th }}</th>
        @endforeach
    </tr>
</thead>
