@extends('layouts.app')
@section('content')
    <h1>Create a transaction</h1>
    <form action="{{ route('transactions.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="statement">Import Bank Statement</label>
            <input type="file" name="statement" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection