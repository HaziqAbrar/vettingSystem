<?php 
use App\Models\notification;
$notification = notification::first();
$message = $notification->notice;?>
@component('mail::message')
# {{$noti->sender}}


{{$noti->notice}}



Thanks,<br>

@endcomponent
