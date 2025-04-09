@php use App\Models\TreeNode; @endphp
@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-4">Tree Structure</h1>
    
    <ul class="space-y-2">
        @foreach($nodes as $node)
            @include('tree.partials.node', ['node' => $node, 'level' => 0])
        @endforeach
    </ul>
    
    <form method="POST" action="{{ route('tree.store') }}" class="mt-6">
        @csrf
        <div class="flex gap-2">
            <input type="text" name="name" placeholder="Node name" 
                   class="px-4 py-2 border rounded" required>
            <select name="parent_id" class="px-4 py-2 border rounded">
                <option value="">-- No Parent --</option>
                @foreach(TreeNode::all() as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                Add Node
            </button>
        </div>
    </form>
    
    <a href="{{ route('tree.flat') }}" class="inline-block mt-4 text-blue-500">
        View Flat List
    </a>
</div>
@endsection