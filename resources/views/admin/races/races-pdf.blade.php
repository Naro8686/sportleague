<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ _e('Registration details') }}</title>
    <style>
        .table.table-bordered {
            border-top: 1px solid #e8ebf1;
        }
        .table-responsive>.table-bordered {
            border: 0;
        }
        .table {
            margin-bottom: 0;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #e8ebf1;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        table {
            border-collapse: collapse;
        }
        table {
            display: table;
            border-collapse: separate;
            border-spacing: 2px;
            border-color: grey;
        }
        .table thead th {
            border-top: 0;
            border-bottom-width: 1px;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            color: #686868;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #e8ebf1;
        }
        .table td, .table th {
            vertical-align: middle;
            line-height: 1;
            white-space: nowrap;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #e8ebf1;
        }
        .table td, .table th {
            padding: .875rem .9375rem;
            vertical-align: top;
            border-top: 1px solid #e8ebf1;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #eee;
        }
        .table td {
            font-size: .875rem;
        }
    </style>
</head>
<body>
<h4>Races list</h4>
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>{{ _e('Date') }}</th>
            <th>{{ _e('Name') }}</th>
            <th>{{ _e('Club') }}</th>
            <th>{{ _e('Phone') }}</th>
            <th>{{ _e('Location') }}</th>
            <th>{{ _e('Time') }}</th>
            <th>{{ _e('Min marshals') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item)
            <tr>
                <td>{{ date('d.m.Y', $item->date) ?? '' }}</td>
                <td>{{ $item->name ?? '' }}</td>
                <td>{{ $item->club->name ?? '' }}</td>
                <td>{{ $item->club->phone ?? '' }}</td>
                <td><a href="{{ $item->location_link ?? '' }}" target="_blank">{{ $item->location ?? '' }}</a></td>
                <td>{{ $item->start_time ?? '' }}</td>
                <td>{{ $item->min_marshals ?? '' }} ( {{ $item->users->count() }} Registered)</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>