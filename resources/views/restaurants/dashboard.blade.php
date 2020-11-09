@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")
    @include('restaurants.layouts.notification')
    <div class="container-fluid">


        <div class="alert alert-default alert-dismissible fade show" style="margin-bottom: 15px; margin-top: -35px;" role="alert">
            <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
            <span class="alert-text"><strong><a  class="btn btn-primary btn-sm" href="http://wa.me/+14155238886?text=join%20tongue-getting" target="_blank">Click Here</a></strong> to enable whatsapp order notification.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Orders</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$order_count}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Item Sold</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$item_sold}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-tag"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Earnings</h5>
                                    <span
                                        class="h2 font-weight-bold mb-0">{{$account_info!=NULL?$account_info->currency_symbol:"₹"}} {{$earnings}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Subscription end date</h5>
                                    <span class="h2 font-weight-bold mb-0">{{date('d-m-Y',strtotime(auth()->user()->subscription_end_date))}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-calendar-grid-58"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">PENDING ORDERS</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Table No</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="list">

                        @php $i=1 @endphp
                        @foreach($orders as $pending)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $pending->order_unique_id }}</td>
                                <td>{{ $pending->table_no }}</td>
                                <td>{{ $pending->customer_name }}</td>
                                <td>{{ $pending->total }}</td>

                                <td>
                                    @if($pending->status == 1)
                                        <a class="btn btn-primary btn-sm text-white"
                                           onclick="document.getElementById('accept_order{{$pending->id}}').submit();">Accept
                                            Order</a>
                                        <a class="btn btn-danger btn-sm text-white"
                                           onclick="document.getElementById('reject_order{{$pending->id}}').submit();">Reject
                                            Order</a>
                                    @endif

                                    @if($pending->status == 2)
                                        <a class="btn btn-outline-success btn-sm"
                                           onclick="document.getElementById('complete_order{{$pending->id}}').submit();">Complete
                                            Order</a>
                                    @endif

                                    @if($pending->status == 3)
                                        <a class="btn btn-danger btn-sm text-white">Rejected</a>
                                    @endif

                                    @if($pending->status == 4)
                                        <a class="btn btn-success btn-sm text-white">Completed</a>
                                    @endif


                                    <form style="visibility: hidden" method="post"
                                          action="{{route('store_admin.update_order_status',['id'=>$pending->id])}}"
                                          id="accept_order{{$pending->id}}">
                                        @csrf
                                        @method('patch')
                                        <input style="visibility:hidden" name="status" type="hidden" value="2">
                                    </form>
                                    <form style="visibility: hidden" method="post"
                                          action="{{route('store_admin.update_order_status',['id'=>$pending->id])}}"
                                          id="reject_order{{$pending->id}}">
                                        @csrf
                                        @method('patch')
                                        <input style="visibility:hidden" name="status" type="hidden" value="3">
                                    </form>
                                    <form style="visibility: hidden" method="post"
                                          action="{{route('store_admin.update_order_status',['id'=>$pending->id])}}"
                                          id="complete_order{{$pending->id}}">
                                        @csrf
                                        @method('patch')
                                        <input style="visibility:hidden" name="status" type="hidden" value="4">
                                    </form>

                                </td>





                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>



    </div>


    <script language="javascript">
        setTimeout(function(){
            window.location.reload(1);
        }, 10000);
    </script>


@endsection
