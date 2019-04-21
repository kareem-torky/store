@if($errors->any())
    <div class="alert alert-danger" style="padding: 3px;">
        <ul style="    margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li class="text-center">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('status') !== null)
<div class="alert alert-success text-center" style="padding: 3px;">
    <ul style="    margin-bottom: 0;">
        <li class="text-center">{{ session('status') }}</li>
    </ul>
</div>
@endif