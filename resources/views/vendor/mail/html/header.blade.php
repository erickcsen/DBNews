@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
    <div style="width:100%;background-color:#4a25a9;padding:10px;border-radius:10px;">
        <img src="{{asset('/images/logo_dbnews.png')}}" class="logo" alt="{{$slot}} Logo">
    </div>
@endif
</a>
</td>
</tr>
