<?php 
use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$email = (Auth::user()->getAttribute('email'));
$noti = notification::where('receivers',$email)->first();?>

@component('mail::message')
# Oi apply meeting skang {{$noti->receivers}}


ye skanggg



Thanks,<br>
{{ config('app.name') }}
@endcomponent
