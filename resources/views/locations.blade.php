@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Locations</div>
                    <div class="col-md-12 center">
                        {{ $location->loc }}
                    </div>
                    <div class="panel-body">
                        @if (Auth::check())
                        <span class="currentTime col-md-12 center">Current time: {{ Carbon::now()->format('H:i') }}</span>
                        <div class="col-md-12 times">
                            <div class="col-md-6 center">
                                <span>Compare prediction made at:</span>
                                <select class="predictionFirst">
                                    <option selected disabled></option>
                                    @foreach ($times as $time)
                                    <option value="{{ Carbon::parse($time)->format('H:i') }}">{{ Carbon::parse($time)->format('H:i') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 center compareTo">
                                <span>Compare to prediction at:</span>
                                <select class="predictionSecond">
                                    <option selected disabled></option>
                                        <!-- Dynamically filled up -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 center possibleTimes">
                            <hr />
                            <span>For the following time:</span>
                            <div class="timeRow clearfix">
                                <!-- Dynamically filled up -->
                            </div>
                            <hr />
                        </div>
                        <div class="col-md-12 comparisons">
                            <div class="col-md-6 compareFrom">
                                <h2>Early rainfall prediction at <strong>18:00</strong></h2>
                                <div class="rainFrom">
                                    <h3>63%</h3>
                                    <div class="rainValue">(161/255)</div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left compareTo">
                                <h2>Late rainfall prediction at <strong>18:15</strong></h2>

                                <div class="rainTo">
                                    <h3>67%</h3>
                                    <div class="rainValue">(171/255)</div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 center result">
                            <span>This is <strong>~6% higher</strong> than expected.</span>
                        </div>
                        @else
                        You're not signed in. Please <a href="/login">login</a>.
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection