<?php
$admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
?>
@foreach($item->sodu as $data)
    @if($data->user_id == $admin->id)
        @if($data->type == 0 or $data->type ==2)
            <span>+</span>
            <div style="color: #0abb87; display: inline-block; font-size: 13px;" class="currency">
                <p>{{ $item->amount }}</p>
            </div>
        @else
            <span>-</span>
            <div style="color: red; display: inline-block; font-size: 13px;" class="currency">
                <p> {{ $item->amount }}</p>
            </div>
        @endif

    @endif
{{--    {{ $data->user_id }}--}}
@endforeach
 






