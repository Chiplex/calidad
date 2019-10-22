@extends('layouts.base')
@section('body')
<div class="wrapper">
    @include('layouts.header.main')
    <div class="page-wrap">
        @include('layouts.sidebar.left')
        <div class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('layouts.sidebar.right')
        @include('layouts.chat')
        @include('layouts.footer')
    </div>
</div>
@endsection