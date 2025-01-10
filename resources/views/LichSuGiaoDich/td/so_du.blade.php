<?php
$admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
?>
{{--{{ $admin->id }}--}}
@foreach($item->sodu as $data)

    @if($data->user_id == $admin->id)
      <div class="currency">
          {{ $data->surplus }}
      </div>
    @endif
@endforeach
{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', (event) => {--}}
{{--        const currencyElements = document.querySelectorAll('.currency');--}}

{{--        currencyElements.forEach(element => {--}}
{{--            const text = element.textContent.trim();--}}
{{--            const number = text.replace(/[^\d.-]/g, ''); // Loại bỏ các ký tự không phải số--}}
{{--            const value = parseFloat(number);--}}

{{--            if (!isNaN(value)) {--}}
{{--                element.textContent = value.toLocaleString('vi-VN', {--}}
{{--                    style: 'currency',--}}
{{--                    currency: 'VND'--}}
{{--                }).replace('₫', '');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}