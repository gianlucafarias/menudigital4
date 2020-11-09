@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")
    <div class="container-fluid mt--6">

        <div class="border-0">
            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6 text-right">
                    <a href="{{route('store_admin.addbanner')}}"
                       class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                       data-original-title="Add Banner">
                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                        <span class="btn-inner--text">Add Banner</span>
                    </a>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row row-example">


                @foreach($banner as $ban)

                    <div class="col-sm-3">
                        <div class="card" style="border: 2px dashed #001354;">
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">

                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar avatar-xl rounded-circle">
                                                    <img alt="Image placeholder" src="{{asset($ban->photo_url)}}">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h4>
                                                    <b>{{$ban->name}}</b>
                                                </h4>
                                                <br>
                                                <a href="{{route('store_admin.banneredit',$ban->id)}}"
                                                   class="btn btn-sm btn-primary">Edit</a>
                                                <a onclick="if(confirm('Are you sure you want to delete this item?')){ event.preventDefault();document.getElementById('delete-form-{{$ban->id}}').submit(); }"
                                                   class="btn btn-sm btn-danger">Delete</a>
                                                <form method="post" action="{{route('store_admin.delete_slider')}}"
                                                      id="delete-form-{{$ban->id}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{$ban->id}}" name="id">
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-toggle">
                                                    <input type="checkbox"
                                                           disabled {{$ban->is_visible ==1?"checked":NULL}}>
                                                    <span class="custom-toggle-slider rounded-circle"
                                                          data-label-off="Off" data-label-on="On"></span>
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
