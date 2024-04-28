@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Resep</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Resep</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recipes as $recipe)
                                <tr>
                                    <td>{{ $recipe->id }}</td>
                                    <td>{{ $recipe->name }}</td>
                                    <td>
                                        <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}" class="btn btn-primary">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $recipes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection