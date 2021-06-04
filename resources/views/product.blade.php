@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- general form elements disabled -->
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Product <i style="font-size:12px"> items marked red <span style="color:red"> *</span> are important</i></h3>
            </div>
            <!-- /.box-header -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <strong></strong> {{ session('success') }}</div>
                @endif
                @if(session('error_message'))
                <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <strong>Error!</strong> {{ session('error_message') }}</div>
                @endif
                
                @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Error!</strong> 
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                @endif
            <div class="box-body">
              <form action="{{ route('saveProduct') }}" method="post" enctype="multipart/form-data">
              @csrf
                <!-- text input -->
                <div class="row">
                    <div class="form-group col-md-6">
                    <label>Product Name:<span style="color:red"> *</span> </label>
                    <input type="text" class="form-control" name="productName" value="{{ old('productName') }}" placeholder="Enter Product Name" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label>Category: <span style="color:red"> *</span></label>
                    <select class="form-control" name="category" required>
                        <option value="">Select</option>
                        @foreach($category as $item)
                        <option value="{{ $item->id }}">{{$item->category}}</option>
                       @endforeach                        
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                    <label>Description: <span style="color:red"> *</span> </label>
                    <input type="text" class="form-control" placeholder="Enter Description" name="description" value="{{ old('description') }}">
                    </div>

                    <div class="form-group col-md-6">
                    <label>Qty: <span style="color:red"> *</span></label>
                    <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" value="{{ old('quantity') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label>Price: <span style="color:red"> *</span> </label>
                    <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ old('price') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label>Discount Price: <span style="color:red"> </span> </label>
                    <input type="text" class="form-control" placeholder="Enter Discount Price" name="discount" value="{{ old('discount') }}">
                    </div>

                    <div class="form-group col-md-6">
                    <label>Special Offer?: <span style="color:red"> *</span></label>
                    <select class="form-control" name="specialOffer" required>
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                    <label>Active?: <span style="color:red"> *</span></label>
                    <select class="form-control" name="status" required>
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                  <label for="exampleInputFile">Upload Picture: <span style="color:red"> *</span></label>
                  <input type="file" id="exampleInputFile" name="image" required>
                </div>
                </div>
                <center><button class="btn btn-info">Submit</button></center>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
@endsection
