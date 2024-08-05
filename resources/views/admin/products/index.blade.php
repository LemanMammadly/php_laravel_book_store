@extends('admin.layouts.app')
@section('title', 'Products Page')
@section('content')
    @push('css')
        <style>
            td,
            th {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis
            }
        </style>
    @endpush
    <main>
        <div class="container-fluid px-4">
            <div class="products-create d-flex align-items-center justify-content-between">
                <h1 class="mt-4">Tables</h1>
                <a href="{{route('admin.products.createView')}}" class="btn btn-primary">Create</a>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Main Image</th>
                                <th>Title</th>
                                <th>Tax</th>
                                <th>Code</th>
                                <th>Point</th>
                                <th>Stock</th>
                                <th>In Stock</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Text</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Slug</th>
                                <th>Create date</th>
                                <th>Update date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img style="width: 100px" src="{{ $product->mainImageUrl }}" alt=""></td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->taxPercent }}</td>
                                    <td>{{ $product->productCode }}</td>
                                    <td>{{ $product->rewardsPoints }}</td>
                                    <td>{{ $product->stockCount }}</td>
                                    <td>{{ $product->inStock == 1 ? 'True' : 'False' }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discountPercent }}</td>
                                    <td>{{ Str::substr($product->text, 0, 30) }}...</td>
                                    <td>{{ Str::substr($product->description, 0, 30) }}...</td>
                                    <td>{{ $product->GetCategoryName($product->id) ?? $product->GetCategoryBySubCategoryId($product->sub_categories_id) }}</td>
                                    <td>{{ $product->getSubCategoryName($product->id) }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td><button style="border: none;background:transparent">✏️</button></td>
                                    <td><button style="border: none;background:transparent">🗑️</button></td>
                                    <td><button style="border: none;background:transparent">💬</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
