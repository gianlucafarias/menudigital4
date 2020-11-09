@extends("restaurants.layouts.statusscreen")

@section("restaurantcontant")



    <div class="container-fluid mt--6">



        <div class="row">
            <div class="col-xl-4" >
                <!-- Members list group card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header bg-gradient-pink">
                        <!-- Title -->
                        <h5 class="h3 mb-0">NEW ORDERS</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body bg-gradient-pink">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3" >
                            @foreach($neworder as $new)
                            <li class="list-group-item px-0 bg-gradient-pink">
                                <div class="row align-items-center">

                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            Order No: <b>{{ $new->order_unique_id }}</b>
                                        </h4>

                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0">
                                           Table No:  <b>{{ $new->table_no }}</b>
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4" >
                <!-- Members list group card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header bg-gradient-info">
                        <!-- Title -->
                        <h5 class="h3 mb-0">PROCESSING</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body bg-gradient-info">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3" >
                            @foreach($orders as $data)
                            <li class="list-group-item px-0 bg-gradient-info">
                                <div class="row align-items-center">

                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            Order No: <b>{{ $data->order_unique_id }}</b>
                                        </h4>

                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0">
                                            Table No:  <b>{{ $data->table_no }}</b>
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4" >
                <!-- Members list group card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header bg-gradient-success">
                        <!-- Title -->
                        <h5 class="h3 mb-0">READY</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body bg-gradient-success">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3" >
                            @foreach($ready as $read)
                            <li class="list-group-item px-0 bg-gradient-success">
                                <div class="row align-items-center">

                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            Order No: <b>{{ $read->order_unique_id }}</b>
                                        </h4>

                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0">
                                            Table No:  <b>{{ $read->table_no }}</b>
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script language="javascript">
        setTimeout(function(){
            window.location.reload(1);
        }, 10000);
    </script>



@endsection
