@extends('layouts.admin')
{{--@extends('layouts.app')--}}
@section('meta')
@endsection
@section('style')
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/nouislider/nouislider.min.css')}}" />

    <!-- Demo CSS not Include in project -->
    <style>
        .demo-card label{ display: block; position: relative;}
        .demo-card .col-lg-4{ margin-bottom: 30px;}
    </style>
@endsection
@section('script')
    <!-- Javascript -->
    <script src="{{ asset('adminka/assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/bundles/vendorscripts.bundle.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script><!-- Bootstrap Colorpicker Js -->

    <script src="{{ asset('adminka/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script><!-- Input Mask Plugin Js -->

    <script src="{{ asset('adminka/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->

    <script src="{{ asset('adminka/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script><!-- Bootstrap Tags Input Plugin Js -->

    <script src="{{ asset('adminka/assets/vendor/nouislider/nouislider.js')}}"></script><!-- noUISlider Plugin Js -->

    <script src="{{ asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/js/pages/forms/advanced-form-elements.js')}}"></script>
@endsection
@section('content')
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('adminka/assets/images/icon-light.svg')}}" width="48" height="48" alt="HexaBit"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Advanced Form Elements</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Advanced</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <!-- Masked Input -->
            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Masked Input with icons <small>Taken from <a href="https://github.com/RobinHerbots/jquery.inputmask" target="_blank">github.com/RobinHerbots/jquery.inputmask</a></small></h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <form id="basic-form" method="post" action="{{route('admin.contacts.update', 'contacts')}}" >
                                    @method("PUT")
                                    @csrf
                                    <input type="hidden" name="name" value="contacts" >
                                    <input type="hidden" name="slug" value="contacts" >
{{--                                    @dd($contact)--}}
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-6">
                                            <b>Email Address</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                                </div>
                                                <input type="email" name="value[email]" value="{{ $contact['email'] ?? old('email') ?? '' }}" class="form-control email" placeholder="Ex: example@example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Phone Number</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="tel" name="value[phone]" value="{{ $contact['phone'] ?? old('phone') ?? '' }}" class="form-control phone-number" placeholder="Ex: +00 (000) 000-00-00">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Mobile Phone Number</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                                                </div>
                                                <input type="tel" name="value[mobile]" value="{{ $contact['mobile'] ?? old('mobile') ?? '' }}" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Viber</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="tel" name="value[viber]" value="{{ $contact['viber'] ?? old('viber') ?? '' }}" class="form-control phone-number" placeholder="Ex: +00 (000) 000-00-00">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Facebook</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" name="value[facebook]" value="{{ $contact['facebook'] ?? old('facebook') ?? '' }}" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Youtube</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" name="value[youtube]" value="{{ $contact['youtube'] ?? old('youtube') ?? '' }}" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Instagram</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" name="value[instagram]" value="{{ $contact['instagram'] ?? old('instagram') ?? '' }}" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <b>Telegram</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-telegram" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" name="value[telegram]" value="{{ $contact['telegram'] ?? old('telegram') ?? '' }}" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary   m-t-20">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


