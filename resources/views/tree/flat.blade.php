@extends('layouts.app')

@section('content')
<div class="card fade-in">
    <h1 class="card-title">Flat List</h1>
    <a href="{{ route('tree.index') }}" class="btn btn-primary mb-3">← Back to Tree View</a>
    
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nodes as $node)
                <tr class="fade-in">
                    <td>{{ $node->id }}</td>
                    <td>{{ $node->name }}</td>
                    <td>{{ $node->parent?->name ?? 'Root' }}</td>
                    <td>
                        <form method="POST" action="{{ route('tree.destroy', $node) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection