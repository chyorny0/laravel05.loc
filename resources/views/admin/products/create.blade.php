@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        @include('partials.header', ['name'=>'Products'])
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            @dump($errors->all())
                            <form class="form-horizontal form-material mx-2" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input name="name" type="text"
                                               class="form-control form-control-line {{$errors->has('name') ? 'is-invalid':''}}" value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <input name="description" type="text"
                                               class="form-control form-control-line {{$errors->has('description') ? 'is-invalid':''}}" value="{{old('description')}}">
                                    </div>
                                    @error('description')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-12">Category</label>
                                        <select name="category_id" class="form-control">
                                            <option disabled>Веберите категорию</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input name="price" type="text"
                                               class="form-control form-control-line {{$errors->has('price') ? 'is-invalid':''}}" value="{{old('price')}}">
                                    </div>
                                    @error('price')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Image</label>
                                    <div class="col-md-12">
                                        <input name="image" type="file"
                                               class="form-control form-control-line {{$errors->has('image') ? 'is-invalid':''}}" value="">
                                    </div>
                                    @error('image')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Active</label>
                                    <div class="col-md-12">
                                        <input name="active" type="checkbox"
                                               class="{{$errors->has('active') ? 'is-invalid':''}}" value="1">
                                    </div>
                                    @error('active')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success text-white">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
