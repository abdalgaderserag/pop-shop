@extends('layouts.app')

@section('title',\Illuminate\Support\Facades\Auth::user()->name . ' | Dashboard')

@section('styles')
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
@endsection

@section('content')
    <div class="flex-box">
        <div class="main-section" style="width: 100%">
            <div>
                <button class="input-button" style="width: 146px">+ Item</button>
                {{--<div>New Sold Items:</div>--}}
                {{--<div>--}}
                    {{--<table></table>--}}
                {{--</div>--}}
                <div>Out Of stock:</div>
                <div>
                    <table style="background-color: white;width: 100%;">
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                    </table>
                </div>
                <div>Items:</div>
                <div>
                    <table style="background-color: white;width: 100%;">
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 24px">1</td>
                            <td>chair</td>
                            <td>$200</td>
                            <td style="width: 24px">2</td>
                            <td style="width: 24px">
                                ^<br>
                                2<br>
                                ^
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection