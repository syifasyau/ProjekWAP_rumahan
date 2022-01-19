@extends('base')
@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Login</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <span>{{ $message }}</span>
            </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <span>{{ $message }}</span>
            </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @method("POST")
                @csrf
                <div class="form-group">
                    <label for="example-todo-title">Email</label>
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="example-todo-desc">Password</label>
                    <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
