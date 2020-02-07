<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Race marshals</title>
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
<h2>{{ $race->name }} - Marshals</h2>
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable race_users">
        <thead>
        <tr>
            <th>Present</th>
            <th>Full name</th>
            <th>Club</th>
            <th>Category</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($race->users as $key => $user)
            <tr>
                <td>
                    <input type="checkbox" class="marshal_present" value="{{$race->id}}" {{ ( \Illuminate\Support\Facades\DB::table('user_races')->where('user_id', $user->id)->where('race_id', $race->id)->first()->present == 'yes' ) ? 'checked' : '' }}>
                </td>
                <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                <td>{{ $user->club->first()->name ?? '' }}</td>
                <td>{{ $user->race_category ?? '' }}</td>
                <td>{{ $user->phone ?? '' }}</td>
                <td>{{ $user->email ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>