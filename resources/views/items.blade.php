@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/items.css">
@endsection

@section('content')

    <div class="flex-box" style="justify-content: center">
        <div class="left-section">
            <div class="flex-box mark-title">
                <div></div>
                <div>Filters.</div>
            </div>

            <div class="filters">

                <div class="filter">
                    <div class="check" onclick="check(event)">
                        <div style="visibility: hidden" class="checked"></div>
                    </div>
                    <div class="filter-text">
                        Exchangeable
                    </div>
                </div>
                <div class="filter">
                    <div class="check" onclick="check(event)">
                        <div style="visibility: hidden" class="checked"></div>
                    </div>
                    <div class="filter-text">
                        Used
                    </div>
                </div>
                <div class="filter">
                    <div class="check" onclick="check(event)">
                        <div style="visibility: hidden" class="checked"></div>
                    </div>
                    <div class="filter-text">
                        Unlimited
                    </div>
                </div>

                <div class="filter">
                    <input type="text" placeholder="Location" class="input-text">
                </div>

                <div class="filter">
                    <div>Cost :</div>
                    <input type="text" placeholder="min" style="width: 28.25%;float: left" class="input-text">
                    <span style="margin: 0 0 0 3px">to</span>
                    <input type="text" placeholder="max" style="width: 28.25%" class="input-text">
                </div>

                <div class="filter">
                    <input type="text" placeholder="In Stock" class="input-text">
                </div>

                <div class="filter">
                    <input type="submit" value="Reset" class="input-text input-button">
                </div>
            </div>
        </div>

        <div class="main-section">

            <!-- header of the list -->
            <div class="card-header">
                Items
            </div>

            <!-- Single item card -->
            <div class="item-card flex-box">
                <!-- card Image -->
                <img src="/test/mapbox.jpg" class="item-image">

                <!-- card Body -->
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

                    <div class="item-text"><span>By</span> <a href="/profile/gafora" class="link-clear">Gadora</a> at
                        2015-6-12
                    </div>
                </div>
            </div>

        </div>

        <div style="width: 20%;"></div>
    </div>

    <script>
        let image = document.getElementsByClassName('item-image')[0];
        image.style.height = image.offsetWidth + 'px';

        function check(e) {
            let check = e.target.children[0];
            check.style.visibility = check.style.visibility === 'visible' ? 'hidden' : 'visible';
        }
    </script>
@endsection