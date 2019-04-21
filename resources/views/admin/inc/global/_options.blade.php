
<a href="{{ route('admin.get.'.$routeName.'.edit',$row_id) }}" class="btn btn-info btn-sm" title="@lang('site.edit')">
        <i class="fa fa-edit"></i>
</a>

<a href="{{ route('admin.get.'.$routeName.'.delete',$row_id) }}" class="conform-delete btn btn-danger btn-sm" title="@lang('site.delete')">
        <i class="fa fa-close"></i>
</a>


@if($row_status)
    @if($row_status == 'yes')
    <a href="{{ route('admin.get.'.$routeName.'.visibility',$row_id) }}" class="btn btn-warning btn-sm" title="@lang('site.de-active')">
        <i class="fa fa-star-o text-red" ></i>
    </a>


    @endif

    @if($row_status == 'no')
    <a href="{{ route('admin.get.'.$routeName.'.visibility',$row_id) }}" class="btn btn-success btn-sm" title="@lang('site.active')">
        <i class="fa fa-star text-blue"></i>
    </a>
    @endif
@endif
