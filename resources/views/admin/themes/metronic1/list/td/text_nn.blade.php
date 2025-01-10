{{--{!! @$item->{$field['name']} !!}--}}
@if($field['name'] == 'stk') STK: {!! @$item->{$field['name']} !!} </br> @endif
@if($field['name'] == 'ngan_hang') Ngân hàng: {!! @$item->{$field['name']} !!} </br> @endif
@if($field['name'] == 'chu_tk') Chủ tk: {!! @$item->{$field['name']} !!} </br> @endif