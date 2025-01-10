<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible">
<meta content="" name="robots">
@if(isset($page_title))
<title>{{ trans(@$page_title) }}</title>
@endif
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{ CommonHelper::getUrlImageThumb(@$settings['favicon'], 64, 64) }}"
      type="image/x-icon">