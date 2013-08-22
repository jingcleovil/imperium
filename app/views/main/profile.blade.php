@if (Auth::check())
<div class="profile">
  <div class="thumb"><img src="" /></div>
  <div>Greetings, <a href="#"><strong>{{ Auth::user()->userid }}</strong></a></div>
  <div><i>{{ AccountLevel::getGroupName(Auth::user()->group_id) }}</i></div>
</div>
<!--profile -->
@endunless