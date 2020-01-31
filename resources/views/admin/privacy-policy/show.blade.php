@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.privacy-policy.index') }}">Privacy policy</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('global.show') }}</li>
            </ol>
        </nav>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.privacy-policy.edit', $data->id) }}">
                    Edit
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        Show privacy policy texts
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $data->title }}</td>
                                </tr>
                                <tr>
                                    <th>Text</th>
                                    <td>{{ $data->text }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection