@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")


    <div class="container-fluid mt--6">

        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Products
                            <span
                                class="badge badge-md badge-circle badge-floating badge-info border-white">{{$products_count}}</span>
                        </h3>
                    </div>
                    <div class="col-6 text-right">
                        <a  href="{{route('store_admin.addproducts')}}"
                            class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip"
                            data-original-title="Add Products">
                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            <span class="btn-inner--text">Add Products</span>
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
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Is Enabled</th>
                        <th>Is Recommended</th>
                        <th>Is Veg</th>
                        <th>Price</th>


                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($products as $pro)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td><img src="{{asset($pro->image_url)}}" class="avatar rounded-circle mr-3"></td>
                            <td>{{ $pro->name }}</td>


                            <td>
                                <span class="badge badge-{{$pro->is_active == 1 ? "success":"danger"}}">{{$pro->is_active == 1 ? "Yes":"No"}}</span>
                            </td>

                            <td>
                                <span class="badge badge-{{$pro->is_recommended == 1 ? "success":"danger"}}">{{$pro->is_recommended == 1 ? "Yes":"No"}}</span>
                            </td>
                            <td>
                                <span class="badge badge-{{$pro->is_veg == 1 ? "success":"danger"}}">{{$pro->is_veg == 1 ? "Yes":"No"}}</span>
                            </td>
                            <td>{{ $pro->price }}</td>

                            <td style="text-align: center">

                                    <a href="{{route('store_admin.update_products',$pro->id)}}"  title="edit" class="btn btn-sm btn-primary">
                                       Edit
                                    </a>




                                <a onclick="if(confirm('Are you sure you want to delete this item?')){ event.preventDefault();document.getElementById('delete-form-{{$pro->id}}').submit(); }"
                                   class="btn btn-sm btn-danger">Delete</a>
                                <form method="post" action="{{route('store_admin.delete_product')}}"
                                      id="delete-form-{{$pro->id}}" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$pro->id}}" name="id">
                                </form>




                            </td>




                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>


@endsection
