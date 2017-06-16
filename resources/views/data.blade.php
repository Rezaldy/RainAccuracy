@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Tests</div>

                <div class="panel-body">
                    @if (Auth::check())
                        <pre>{{ print_r($data) }}</pre>
                    @else
                        You're not signed in. Please <a href="/login">login</a>.
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>
@endsection