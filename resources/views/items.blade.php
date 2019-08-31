@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/items.css">
@endsection

@section('content')

    <app></app>

    {{--<script>--}}
        {{--let image = document.getElementsByClassName('item-image')[0];--}}
        {{--image.style.height = image.offsetWidth + 'px';--}}
        {{--let checks = [false, false, false];--}}

        {{--document.onscroll = function (e) {--}}
            {{--let right = document.getElementsByClassName('right-section')[0];--}}
            {{--let left = document.getElementsByClassName('left-section')[0];--}}
            {{--right.style.paddingTop = window.scrollY + 'px';--}}
            {{--left.style.paddingTop = window.scrollY + 'px';--}}
        {{--};--}}

        {{--getItems();--}}

        {{--function getItems() {--}}
            {{--axios.get('/api/item').then(function (response) {--}}

                {{--let items = response.data.items;--}}
                {{--let item;--}}
                {{--let ele = '<div class="card-header">Items</div>';--}}
                {{--for (let i = 0; i < items.length; i++) {--}}
                    {{--item = items[i];--}}
                    {{--ele = ele + '<div class="item-card flex-box">' +--}}
                        {{--'<img src="/test/mapbox.jpg" class="item-image"><div class="item-body">' +--}}
                        {{--'<div class="flex-box item-text"><div style="width: 50%">' +--}}
                        {{--'<span>' + item.title + '</span><span>- $' + item.budget + '</span></div></div>' +--}}
                        {{--'<div class="item-text"><span>Location :</span>' +--}}
                        {{--'<span>' + item.category.location + '</span></div>' +--}}
                        {{--'<div class="item-text"><span>Category :</span>' +--}}
                        {{--'<span>' + item.category.base_type + ' / ' + item.category.seconder_type + '</span></div>' +--}}
                        {{--'<div class="item-text">only <span>' + item.stock + '</span> in stock</div>' +--}}
                        {{--'<div class="item-text"><span>By</span> <a href="/profile/' + item.user.id + '" class="link-clear">' + item.user.name + '</a> at ' + item.created_at + '</div></div></div>';--}}
                {{--}--}}
                {{--ele = ele + '<div class="card-footer"></div>';--}}
                {{--document.getElementsByClassName('main-section')[0].innerHTML = ele;--}}
            {{--});--}}
        {{--}--}}

        {{--function check(e, num) {--}}
            {{--let check = e.target.children[0];--}}

            {{--if (checks[num] === true)--}}
                {{--checks[num] = false;--}}
            {{--else--}}
                {{--checks[num] = true;--}}

            {{--if (num == 2) {--}}
                {{--if (checks[2])--}}
                    {{--document.getElementsByClassName('input-text')[3].style.display = 'none';--}}
                {{--else--}}
                    {{--document.getElementsByClassName('input-text')[3].style.display = 'block';--}}
            {{--}--}}

            {{--check.style.visibility = checks[num] ? 'visible' : 'hidden';--}}
        {{--}--}}

        {{--function resetInput() {--}}

            {{--for (let i = 0; i < 3; i++)--}}
                {{--checks[i] = false;--}}

            {{--let inputs = document.getElementsByClassName('input-text');--}}
            {{--for (let i = 0; i < inputs.length; i++) {--}}
                {{--if (i !== inputs.length - 1)--}}
                    {{--inputs[i].value = '';--}}
            {{--}--}}

            {{--let checkIn = document.getElementsByClassName('check');--}}
            {{--for (let i = 0; i < checkIn.length; i++) {--}}
                {{--checkIn[i].children[0].style.visibility = 'hidden';--}}
            {{--}--}}
            {{--document.getElementsByClassName('input-text')[3].style.display = 'block';--}}
        {{--}--}}

        {{--function getSearchRequest() {--}}
            {{--let url = '?';--}}
            {{--if (document.getElementById('location').value !== '')--}}
                {{--url = url + 'location=' + document.getElementById('location').value;--}}
            {{--if (document.getElementById('min').value !== '')--}}
                {{--url = url + '&min=' + document.getElementById('min').value;--}}
            {{--if (document.getElementById('max').value !== '')--}}
                {{--url = url + '&max=' + document.getElementById('max').value;--}}
            {{--if (document.getElementById('amount').value !== '')--}}
                {{--url = url + '&amount=' + document.getElementById('amount').value;--}}
            {{--if (checks[0] === true)--}}
                {{--url = url + '&exchangeable=true';--}}
            {{--if (checks[1] === true)--}}
                {{--url = url + '&used=true';--}}
            {{--if (checks[2] === true)--}}
                {{--url = url + '&unlimited=true';--}}
            {{--return url === '?' ? '' : url;--}}
        {{--}--}}
    {{--</script>--}}
@endsection