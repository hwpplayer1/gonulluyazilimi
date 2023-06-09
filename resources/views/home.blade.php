@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('forwarding-success'))
                <div class="alert alert-success d-flex" role="alert">
                    <svg style="height: 20px;width: 20px;" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>{{ session('forwarding-success') }}</div>
                </div>
            @else
                @if($email_redirect_is_exist==null)
                    <a href="{{secure_url('/email-redirects')}}" role="alert">
                        <div class="alert alert-info d-flex">
                            <svg style="height: 20px;width: 20px;" class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                            <div>{{ trans("panel.email_redirects_info") }}</div>
                        </div>
                    </a>
                    <br/>
                @endif
            @endif

            <div class="card">
                <div class="card-header">{{ trans("panel.available_announcements_title") }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success d-flex" role="alert">
                            <svg style="height: 20px;width: 20px;" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>{{ session('status') }}</div>
                        </div>
                    @endif

                    @foreach ($announcements as $announcement)
                        <button style="width: 100%;text-align: left;" class="btn btn-lg btn-success rounded-0" type="button" data-bs-toggle="collapse" href="#announcementCollapse{{$announcement->id}}" role="button" aria-expanded="false" aria-controls="announcementCollapse{{$announcement->id}}">
                            {{$announcement->subject}}
                        </button>
                        <div class="collapse" id="announcementCollapse{{$announcement->id}}">
                            <div class="card card-body text-dark bg-light rounded-0">
                                <div>{!! $announcement->detail !!}</div>
                            </div>
                        </div>
                        <small>&nbsp;</small>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
