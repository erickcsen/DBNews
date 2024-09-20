@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://news.dbklik.co.id/images/logo_dbnews.png" class="logo" alt="Laravel Logo">
@else
    <img src="{{asset('/images/logo_dbnews.png')}}" class="logo" alt="{{$slot}} Logo">
@endif
</a>
</td>
</tr>
