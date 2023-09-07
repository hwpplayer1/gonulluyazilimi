@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">{{ trans("panel.announcements_title") }}</div>
                <div class="card-header text-white bg-secondary">{{ trans("panel.announcements_create") }}</div>

                <div class="card-body">
                    @if (session('success-status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success-status') }}
                        </div>
                    @endif

                    @if (session('danger-status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger-status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ trans("panel.subject") }}</th>
                                <th>{{ trans("panel.created_by") }}</th>
                                <th>{{ trans("panel.created_at") }}</th>
                                <th>{{ trans("panel.updated_by") }}</th>
                                <th>{{ trans("panel.updated_at") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                            <tr>
                                <td>{{$announcement->id}}</td>
                                <td>{{$announcement->subject}}</td>
                                <td>{{$announcement->getCreatedBy()->name}} {{$announcement->getCreatedBy()->surname}}</td>
                                <td>{{date("d-m-Y H:i:s", strtotime($announcement->created_at))}}</td>
                                <td>{{$announcement->getUpdatedBy()->name}} {{$announcement->getUpdatedBy()->surname}}</td>
                                <td>{{date("d-m-Y H:i:s", strtotime($announcement->updated_at))}}</td>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
