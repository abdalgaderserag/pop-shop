@auth
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/footer.css">
@else
    <link rel="stylesheet" href="/css/style/parts/footer.css">
@endauth
<div class="footer" style="">
    <div style="width: 74%;margin-left: 13%;height: 120px">

    </div>
</div>