@extends('layouts.admin')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('/assets/images/icon-light.svg')}}" width="48" height="48" alt="HexaBit"></div>
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
                    <h2>Invoices</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Invoices</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Single Invoice</h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Print Invoices</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li><a href="javascript:void(0);">Export to XLS</a></li>
                                        <li><a href="javascript:void(0);">Export to CSV</a></li>
                                        <li><a href="javascript:void(0);">Export to XML</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <h3>Invoice Details : <strong class="text-primary">#{{ $order->id }}</strong></h3>
                            <ul class="nav nav-tabs-new2">
                                <li class="nav-item inlineblock"><a class="nav-link active" data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                                <li class="nav-item inlineblock"><a class="nav-link" data-toggle="tab" href="#history" aria-expanded="false">History</a></li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div role="tabpanel" class="tab-pane in active" id="details" aria-expanded="true">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-6">
                                            <address>
                                                <strong>HexaBit Inc.</strong><br>
                                                795 Folsom Ave, Suite 546<br>
                                                San Francisco, CA 54656<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-34636
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <p class="m-b-0"><strong>Order Date: </strong> {{ $order->created_at }}</p>
                                            <p><strong>Order ID: </strong> #{{ $order->id }}</p>
                                            <p class="m-b-0"><strong>Order Status: </strong><span class="badge badge-success m-b-0">Done</span></p>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th class="hidden-sm-down">Description</th>
                                                        <th>Quantity</th>
                                                        <th class="hidden-sm-down">Unit Cost</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>iPhone 7</td>
                                                        <td class="hidden-sm-down">Lorem ipsum dolor sit amet.</td>
                                                        <td>1</td>
                                                        <td class="hidden-sm-down">$380</td>
                                                        <td>$380</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Nokia 6</td>
                                                        <td class="hidden-sm-down">There are many variations of passages of Lorem Ipsum</td>
                                                        <td>5</td>
                                                        <td class="hidden-sm-down">$50</td>
                                                        <td>$250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>MI5</td>
                                                        <td class="hidden-sm-down">Lorem ipsum dolor sit amet.</td>
                                                        <td>2</td>
                                                        <td class="hidden-sm-down">$500</td>
                                                        <td>$1000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>VIVO V9</td>
                                                        <td class="hidden-sm-down">Contrary to popular belief, not simply random text</td>
                                                        <td>3</td>
                                                        <td class="hidden-sm-down">$300</td>
                                                        <td>$900</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <h5>Note</h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p class="m-b-0"><b>Sub-total:</b> 2930.00</p>
                                            <p class="m-b-0">Discout: 12.9%</p>
                                            <p class="m-b-0">VAT: 12.9%</p>
                                            <h3 class="m-b-0 m-t-10">USD 2930.00</h3>
                                        </div>
                                        <div class="hidden-print col-md-12 text-right">
                                            <hr>
                                            <button class="btn btn-outline-secondary"><i class="icon-printer"></i></button>
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="history" aria-expanded="false">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-6">
                                            <address>
                                                <strong>HexaBit Inc.</strong><br>
                                                795 Folsom Ave, Suite 546<br>
                                                San Francisco, CA 54656<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-34636
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <p class="m-b-0"><strong>Order Date: </strong> AUG 15, 2018</p>
                                            <p><strong>Order ID: </strong> #123456</p>
                                            <p class="m-b-0"><strong>Order Status: </strong><span class="badge badge-success m-b-0">Done</span></p>
                                        </div>
                                    </div>
                                    <div class="mt-40"></div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Invoice Created</td>
                                                        <td>18 Jun, 2018</td>
                                                        <td><span class="badge badge-default">Panding</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Invoice Sent</td>
                                                        <td>19 Jun, 2018</td>
                                                        <td><span class="badge badge-default">Panding</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Invoice Paid</td>
                                                        <td>20 Jun, 2018</td>
                                                        <td><span class="badge badge-success">Success</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

