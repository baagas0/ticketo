@extends('user.layouts.authed')
@section('title', 'Dashboard')
@section('body')
<div id="tg-content" class="tg-content">
    <div class="tg-dashboard">
        <div class="tg-box tg-profile">
            <div class="tg-heading">
                <h3>My Profile</h3>
                {{-- <a class="tg-btnedit" href="my-profile.html">Edit Profile</a> --}}
            </div>
            <div class="tg-dashboardcontent">
                <figure>
                    <img src="{{ Gravatar::fallback(asset('images/user.png'))->get('baagas0@gmail.caom') }}" style="width: 80px" alt="image description">
                </figure>
                <div class="tg-content">
                    <ul class="tg-liststyle">
                        <li><span>Name</span></li>
                        <li><span>{{ auth()->user()->name }}</span></li>
                        <li><span>Email Address</span></li>
                        <li><span>{{ auth()->user()->email }}</span></li>
                        <li><span>Phone</span></li>
                        <li><span>{{ auth()->user()->phone }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
