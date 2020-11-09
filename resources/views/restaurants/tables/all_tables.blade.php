@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")
    <div class="container-fluid mt--6">

        <div class="border-0">
            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6 text-right">
                    <button onclick="event.preventDefault(); document.getElementById('add_new').submit();"
                            class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                            data-original-title="Add Tables">
                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                        <span class="btn-inner--text">Add Tables</span>
                    </button>
                    <form action="{{route('store_admin.add_tables')}}" method="get" id="add_new"></form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row row-example">
            @foreach($tables as $data)
                <div class="col-sm-3">
                    <div class="card" style="border: 2px dashed #001354;">
                        <div class="card-body">
                            <!-- List group -->
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">

                                        <div class="col">
                                            <h4 >
                                                <b>Table No : {{$data->table_name}}</b>
                                            </h4>
                                            <br>
                                            <a href="{{route('store_admin.edit_table',$data->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{route('download_tblqr',[Auth::user()->view_id,$data->table_name])}}" class="btn btn-sm btn-primary">QR Code</a>

                                        </div>
                                        <div class="col-auto">
                                            <label class="custom-toggle">
                                                <input type="checkbox" disabled {{$data->is_active ==1?"checked":NULL}}>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>





















    </div>




@endsection
