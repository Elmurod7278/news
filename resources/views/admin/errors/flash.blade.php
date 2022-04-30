@if (session('message'))

    <div class="alert" style="background-color: #279c01; color: white;">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Ёпмоқ</span></button>
        {{ session('message') }}
    </div>

@endif

@if (session('error'))

    <div class="alert red" style="background-color: #ff4d4d; color: white;">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Ёпмоқ</span></button>
        {{ session('error') }}
    </div>

@endif
