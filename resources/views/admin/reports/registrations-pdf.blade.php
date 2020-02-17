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
<h4>Total Registrations: {{ $users->count() }}</h4>
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th width="140">{{ _e('Registrations by Club') }}</th>
            @foreach($clubs as $club)
                <th>{{ $club->name }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            @foreach($clubs as $club)
                <td>{{ $club->users->count() }}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>

<div class="mt-4">
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th width="140">{{ _e('Registrations by Category') }}</th>
                @foreach($categories as $category)
                    <th>{{ $category->name }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                @foreach($categories as $category)
                    <td>{{ $users->where('race_category', $category->name)->count() }}</td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th width="140">{{ _e('Breakdown by Club') }}</th>
                @foreach($categories as $category)
                    <th>{{ $category->name }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($clubs as $club)
                <tr>
                    <td>{{ $club->name }}</td>
                    @foreach($categories as $category)
                        <td>{{ $club->users->where('race_category', $category->name)->count() }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>