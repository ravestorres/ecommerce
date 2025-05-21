@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || Register Page')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Register</h2>
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('register.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name<span>*</span></label>
                                    <input type="text" name="name" required="required" value="{{old('name')}}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="text" name="email" required="required" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password<span>*</span></label>
                                    <input type="password" name="password" required="required">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Confirm Password<span>*</span></label>
                                    <input type="password" name="password_confirmation" required="required">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                         <div class="col-12 text-center">
    <button class="btn btn-red" type="submit">Register</button>
</div>

<div class="col-12 text-center mt-3">
    <a href="{{route('login.form')}}" class="btn btn-dark">Back to Login</a>
</div>

                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Login -->
@endsection

@push('styles')
<style>
    .btn-red {
        background-color: #ec2a32;
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 4px;
        transition: background 0.3s ease;
    }

    .btn-red:hover {
        background-color: #c9242b;
    }

    .btn-dark {
        background-color: #000;
        color: #fff;
        padding: 10px 25px;
        border-radius: 4px;
        transition: background 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #333;
    }
</style>
@endpush


