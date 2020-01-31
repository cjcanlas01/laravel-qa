@inject('str', 'Illuminate\Support\Str')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Add Questions</h2>
                        <div class="ml-auto"></div>
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @include ('layouts._form', ['buttonText' => "Ask Question"])
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
