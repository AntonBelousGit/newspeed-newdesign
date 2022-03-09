@extends('layouts.admin')

@section('content')
<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Card Layout</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">UI</li>
                    <li class="breadcrumb-item active">Card Layout</li>
                </ul>
                <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
        <!--- Mainslider Themplate -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/mainslider_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Mainslider Themplate</h5>
                        <form id="block-mainslider-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="gallery" id="gallery_model" >
                            <input type="hidden" name="themplate" value="mainslider" id="mainslider_themplate" >
                            <button type="submit" form="block-mainslider-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        <!---End ./ Mainslider Themplate -->
        <!--- Sliders Themplate -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/sliders_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sliders Themplate</h5>
                        <form id="block-sliders-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="gallery" id="gallery_model" >
                            <input type="hidden" name="themplate" value="sliders" id="sliders_themplate" >
                            <button type="submit" form="block-sliders-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        <!---End ./ Sliders Themplate -->
            <div class="col-lg-3 col-md-6"><!--- Popular Categories Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/popcat_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Popular Categories Themplate</h5>
                        <form id="block-popcat-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="gallery" id="gallery_model" >
                            <input type="hidden" name="themplate" value="popcat" id="popcat_themplate" >
                            <button type="submit" form="block-popcat-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Popular Categories Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Promotions Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/promotions_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Promotions Themplate</h5>
                        <form id="block-promotions-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="title_input" >Title</span>
                            </div>
                            <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="slug_input" >Slug</span>
                            </div>
                            <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_input">Status</label>
                            </div>
                            <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                <option value="0"  >Inactive</option>
                                <option value="1" selected="selected" >Active</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            <input type="hidden" name="model" value="promotions" id="promotions_model" >
                            <input type="hidden" name="themplate" value="promotions" id="promotions_themplate" >
                        <button type="submit" form="block-promotions-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Promotions Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Services Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/services_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Services Themplate</h5>
                        <form id="block-services-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="services" id="services_themplate" >
                            <button type="submit" form="block-services-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Services Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Banner & Product Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/banner_product_themplate.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Banner & Product Themplate</h5>
                        <form id="block-banner_product-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="banner_products" id="banner_products_themplate" >
                            <button type="submit" form="block-banner_product-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Banner & Product Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Featured Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/featured_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Featured Themplate</h5>
                        <form id="block-featured-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="featured" id="featured_model" >
                            <input type="hidden" name="themplate" value="featured" id="featured_themplate" >
                            <button type="submit" form="block-featured-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Featured Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Two Banners Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/two_banners_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Two Banners Themplate</h5>
                        <form id="block-two_banners-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="two_banners" id="two_banners_themplate" >
                            <button type="submit" form="block-two_banners-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Two Banners Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Promotion Banner Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/promotion_banner_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Promotion Banner Themplate</h5>
                        <form id="block-promotion_banner-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="promotion_banner" id="promotion_banner_themplate" >
                            <button type="submit" form="block-promotion_banner-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Promotion Banner Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Gallery Tabs Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/gallery_tabs_themplate.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gallery Tabs Themplate</h5>
                        <form id="block-gallery_tabs-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="gallery_tabs" id="gallery_tabs_themplate" >
                            <button type="submit" form="block-gallery_tabs-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Gallery Tabs Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Subscribe Mail Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/subscribe_mail_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Subscribe to the mailing list Themplate</h5>
                        <form id="block-subscribe_mail-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="subscribe_mail" id="subscribe_mail_themplate" >
                            <button type="submit" form="block-subscribe_mail-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Subscribe Mail Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Product Gallery Tabs Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/product_gallery_tabs_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Product Gallery Tabs Themplate</h5>
                        <form id="block-product_gallery_tabs-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="product_gallery_tabs" id="product_gallery_tabs_themplate" >
                            <button type="submit" form="block-product_gallery_tabs-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Product Gallery Tabs Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Product Tabs Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/product_tabs_themplate.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Product Tabs Themplate</h5>
                        <form id="block-product_tabs-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="product_tabs" id="product_tabs_themplate" >
                            <button type="submit" form="block-product_tabs-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Product Tabs Themplate -->

            <div class="col-lg-3 col-md-6"><!--- Blog Themplate -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('adminka/img/blog_themplate.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Blog Themplate</h5>
                        <form id="block-blog-themplate-form" method="POST" action="{{route('admin.blocks.store')}}" >
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_input" >Title</span>
                                </div>
                                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="slug_input" >Slug</span>
                                </div>
                                <input type="text" id="slug" name="slug" class="form-control" aria-label="Slug" aria-describedby="slug_input" required="true" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_input">Status</label>
                                </div>
                                <select class="custom-select" id="status_input" name="status" aria-label="Status">
                                    <option value="0"  >Inactive</option>
                                    <option value="1" selected="selected" >Active</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="model" value="value" id="value_model" >
                            <input type="hidden" name="themplate" value="blog" id="blog_themplate" >
                            <button type="submit" form="block-blog-themplate-form" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div><!---End ./ Blog Themplate -->

            <!--- Next Themplate -->
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card">--}}
{{--                    <img class="card-img-top" src="{{ asset('adminka/assets/images/image-gallery/4.jpg') }}" alt="Card image cap">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Card title</h5>--}}
{{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                        <a href="javascript:void(0);" class="btn btn-primary">Go somewhere</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!---End ./ Next Themplate -->

        </div>
    </div>
</div>
@endsection
