@extends('layouts.base')
@section('body')
<div class="wrapper">
    @include('layouts.header.main')
    <div class="page-wrap">
        @include('layouts.sidebar.left')
        <div class="main-content">
            <div class="container-fluid">
                @section('page-header')
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="ik ik-edit bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Group Add-Ons</h5>
                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../index.html"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Group Add-Ons</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                @show
                   
                @yield('content')
            </div>
        </div>
        @include('layouts.sidebar.right')
        @include('layouts.chat')
        @include('layouts.footer')
    </div>
</div>
@endsection