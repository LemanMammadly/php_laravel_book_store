@include('admin.layouts.includes.head')
@section('title', 'Admin Product Create')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Product</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="title" name="title" type="text"
                                                    placeholder="Title" value="{{ old('title') }}" required />
                                                <label for="title">Title</label>
                                            </div>
                                            @if ($errors->has('title'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('title') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="productCode" name="productCode" type="number"
                                            placeholder="Product Code" value="{{ old('productCode') }}" required />
                                        <label for="productCode">Product Code</label>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->get('productCode') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="stockCount" name="stockCount"
                                                    type="text" placeholder="Stock Count" required />
                                                <label for="stockCount">Stock Count</label>
                                            </div>
                                            @if ($errors->has('stockCount'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('stockCount') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="price" name="price" type="number"
                                                    placeholder="Price" required />
                                                <label for="price">Price</label>
                                            </div>
                                            @if ($errors->has('price'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('price') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="discountPercent" name="discountPercent	"
                                                    type="number" placeholder="Discount Percent" required />
                                                <label for="discountPercent">Discount Percent</label>
                                            </div>
                                            @if ($errors->has('discountPercent'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('discountPercent') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <textarea class="form-control" id="text" name="text" type="text" placeholder="Text" name=""
                                                    id="" cols="30" rows="10"></textarea>
                                                <label for="text">Text</label>
                                            </div>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('text') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <textarea class="form-control" id="description" name="description" type="text" placeholder="Description"
                                                    name="" id="" cols="30" rows="10"></textarea>
                                                <label for="description">Description</label>
                                            </div>
                                            @if ($errors->has('description'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('description') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="file" class="form-control" id="image" name="image">
                                                <label for="image">Image</label>
                                            </div>
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('image') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0 d-flex align-items-center">
                                                <span style="margin-right: 10px">Category</span>
                                                <select name="" id="cat">
                                                    @foreach ($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category_id'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('category_id') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0 d-flex align-items-center">
                                                <span style="margin-right: 10px">Sub Category</span>
                                                <select name="" id="subcat">
                                                    @foreach ($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('sub_category_id'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('sub_category_id') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-primary btn-block"
                                                type="submit">Create Account</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('admin.layouts.includes.foot')
