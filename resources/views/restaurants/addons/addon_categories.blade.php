@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")


    <div class="container-fluid mt--6">

        <div class="card">
            <!-- Card header -->



                @if(session()->has("MSG"))
                <div class="card-header border-0">
                    <div class="alert alert-{{session()->get("TYPE")}}">
                        <strong> <a>{{session()->get("MSG")}}</a></strong>
                    </div>  </div>
                @endif
                @if($errors->any()) @include('admin.admin_layout.form_error') @endif




            <div class="card-header border-0">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Addon Categories
                            <span
                                class="badge badge-md badge-circle badge-floating badge-info border-white">{{$addons_count}}</span>
                        </h3>


                    </div>
                    <div class="col-6 text-right">





                        <a  href="#"
                            class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="modal"
                            data-target="#modal-form">
                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            <span class="btn-inner--text">Add Addon Category</span>
                        </a>

                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Category ID</th>
                        <th>Name</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($addons as $addon)
                        <tr>
                            <td>{{ $i++}}</td>

                            <td>{{ $addon->id }}</td>
                            <td>{{ $addon->name }}</td>








                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Addon Category</small>
                            </div>
                            <form method="post" action="{{route('store_admin.addaddoncategories')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">

                                        <input class="form-control" placeholder="Name" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="exampleFormControlSelect1">Select Category Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="SNG">Checkbox</option>
                                        <option value="EXT">Extra</option>
{{--                                        <option value="MULT">Single Select</option>--}}
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4" >ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
