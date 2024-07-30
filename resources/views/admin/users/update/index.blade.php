@include('admin.layouts.includes.head')
@section('title', 'Admin Login')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Update Admin</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('update',['slug' => $user->slug])}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" name="name"
                                                    type="text" placeholder="Enter your name"
                                                    value="{{ $user->name }}" required />
                                                <label for="inputFirstName">Name</label>
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('name') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="email" type="email"
                                            placeholder="name@example.com" value="{{ $user->email }}" required />
                                        <label for="inputEmail">Email address</label>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->get('email') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="isAdmin" name="isAdmin" type="checkbox"
                                            value="1" {{ $user->isAdmin == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isAdmin">Admin</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="isActive" name="isActive" type="checkbox"
                                            value="1" {{ $user->isActive == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isActive">Active</label>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-primary btn-block"
                                                type="submit">Update Profile</button></div>
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
@dd($errors)
