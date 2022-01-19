@extends('base')
@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Register</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST">
                @method("POST")
                @csrf
                <div class="form-group">
                    <label for="example-todo-title">Name</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter name" required>
                </div>

                <div class="form-group">
                    <label for="example-todo-title">Email</label>
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="example-todo-desc">Password</label>
                    <input name="password" type="password" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                    <label for="example-todo-desc">Confirmation Password</label>
                    <input name="confirmation_password" type="password" class="form-control" id="example-todo-title" aria-describedby="emailHelp" placeholder="Enter confirmation password" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
