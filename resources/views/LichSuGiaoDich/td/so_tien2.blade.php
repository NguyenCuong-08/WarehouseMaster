<?php
$admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
?>
@if($item->type == 0 or $item->type == 2)

        <div >
          <span style="color: #0abb87;">+</span>
            <div style=" display: inline-block; font-size: 13px;" class="currency">
                <p>{{ $item->amount }}</p>
            </div>
        </div>


@else

        <div  >
            <span style="color:red;">-</span>
            <div style="color: red; display: inline-block; font-size: 13px;" class="currency">
                <p>{{ $item->amount }}</p>
            </div>
        </div>


@endif





