<?php 
use App\Models\notification;
$notification = notification::first();
$message = $notification->notice;?>
@component('mail::message')
# Oi apply meeting skang {{$noti->receivers}}


ye skanggg



Thanks,<br>
{{ config('app.name') }}
@endcomponent
