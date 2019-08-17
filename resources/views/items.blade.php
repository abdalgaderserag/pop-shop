@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/items.css">
@endsection

@section('content')

    <div class="flex-box" style="justify-content: center">
        <div style="width: 20%;height: 20px"></div>
        <div style="width: 60%;">

            <div class="card-header">
                Items
            </div>

            <div class="item-card flex-box">
                <img src="/test/mapbox.jpg" class="item-image">

                <div class="item-body">
                    <div class="flex-box item-text">
                        <div style="width: 50%">
                            <span>Laptop </span>
                            <span>- $500.00</span>
                        </div>
                    </div>

                    <div class="item-text">
                            <span>
                                Location :
                            </span>
                        <span>8028 Rutherford Fords Suite</span>
                    </div>

                    <div class="item-text">
                            <span>
                                Category :
                            </span>
                        <span>
                                Electronic / Laptops
                            </span>
                    </div>

                    <div class="item-text">only <span>5</span> in stock</div>

                    <div class="item-text"><span>By</span> <a href="/profile/gafora" class="link-clear">Gadora</a> at 2015-6-12</div>
                </div>
            </div>

        </div>
        <div style="width: 20%;height: 20px"></div>
    </div>

    <script>
        let image = document.getElementsByClassName('item-image')[0];
        image.style.height = image.offsetWidth + 'px'
    </script>
@endsection