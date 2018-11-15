@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-3">
                <p>sa</p>
            @if ( Auth::guest() AND !app('request')->input('page') )
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="questions">
                                    <legend class="text-left">Answer Nepal Together we will find the Answer</legend>
                                </div>
                                <p>
                                    This the  online forum for Questios ans answer .
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if (!empty($top))
                                <legend class="text-left">
                                    <h1>Top Questions</h1>
                                </legend>
                                @foreach( $top as $question )
                                    @include('containers.question_novote')
                                    @if($top->last() != $question)
                                        <hr>
                                    @endif
                                @endforeach
                                <br>
                            @endif

                            <legend class="text-left">
                                <h1>Recent Questions</h1>
                            </legend>
                            @foreach( $questions as $question )
                                @include('containers.question')
                                @if($questions->last() != $question)
                                    <hr>
                                @endif
                            @endforeach
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-pull-9">
            @include('layouts.sidebar_auth')
            @include('containers.tags')
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection