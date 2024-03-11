@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="api/question">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tagged</label>
                        <input type="text" class="form-control" name="Tagged" id="exampleFormControlInput1" placeholder="example...">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Todate</label>
                        <input type="date" class="form-control" name="Todate" id="exampleFormControlInput2">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Fromdate</label>
                        <input type="date" class="form-control" name="Fromdate" id="exampleFormControlInput3">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
