@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (Auth::check())
                        You are signed in! Yay!
                    @else
                        You're not signed in. Please <a href="/login">login</a>.
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
