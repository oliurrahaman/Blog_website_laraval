@extends('admin.master')
@section('body')

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Blog Module</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Blog</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Add Blog </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header bg-success">
                                    <h5 class="text-center">Add Blog Form</h5>

                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title bg-primary">{{session('message')}}</h4>
                                    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category_id">
                                                    <option value=""> -- Select Blog Category -- </option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Blog Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" placeholder="Blog Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="description" class="summernote" placeholder="Category Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Blog Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image" class="form-control-file" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Publication Status</label>
                                            <div class="col-sm-10">
                                                <label><input type="radio" checked name="status" value="1">Published</label>
                                                <label><input type="radio" name="status" value="0">Unpublished</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="submit"  class="btn btn-outline-success" value="Create Add Blog" >
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="styleSelector">
        </div>
    </div>

@endsection
