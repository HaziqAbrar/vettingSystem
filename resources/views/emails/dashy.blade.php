<?php 
use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$email = (Auth::user()->getAttribute('email'));
$noti = notification::where('receivers',$email)->first();?>

@component('mail::message')
#  {{$noti->sender}}


{{$noti->notice}}



Thanks,<br>

@endcomponent
