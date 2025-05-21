@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="bread-inner">
                        <ul class="bread-list d-inline-block">
                            <li><a href="{{route('home')}}">Home <i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Login</a></li>
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
            <div class="row justify-content-center"> 
                <div class="col-lg-5 col-md-7 col-12">
                    <div class="login-form text-center">
                        <h2>Login</h2>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="form-group text-left">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group text-left">
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                           <div class="form-group text-center">
    <button class="btn btn-red" type="submit">Login</button>
</div>

<div class="form-group text-center mt-3">
    <a href="{{route('register.form')}}" class="btn btn-black">Register</a>
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
    .login-form {
        max-width: 100%;
    }

    .login-form h2 {
        margin-bottom: 25px;
        font-weight: 700;
    }

    .form-group label {
        font-weight: 600;
    }

    .btn-red {
        background-color: #ec2a32;
        color: white;
        padding: 10px 40px;
        font-size: 18px;
        border: none;
        border-radius: 4px;
        transition: background 0.3s ease;
    }

    .btn-red:hover {
        background-color: #c9242b;
    }

    .btn-black {
        background-color: #000;
        color: #fff;
        padding: 8px 30px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        transition: background 0.3s ease;
    }

    .btn-black:hover {
        background-color: #333;
    }

    .bread-list li {
        display: inline;
        font-weight: 600;
        color: #333;
        margin-right: 6px;
    }

    .bread-list li a {
        color: #333;
        text-decoration: none;
    }

    .bread-list li.active a {
        color: #39579A;
        pointer-events: none;
    }
</style>
@endpush
