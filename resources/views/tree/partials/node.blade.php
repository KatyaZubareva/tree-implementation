<li class="pl-{{ $level * 4 }}">
    <div class="flex items-center gap-2 p-2 hover:bg-gray-50 rounded">
        <span>{{ str_repeat('— ', $level) }} {{ $node->name }}</span>
        <form method="POST" action="{{ route('tree.destroy', $node) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700">
                ×
            </button>
        </form>
    </div>
    
    @if($node->children->isNotEmpty())
        <ul class="ml-4">
            @foreach($node->children as $child)
                @include('tree.partials.node', ['node' => $child, 'level' => $level + 1])
            @endforeach
        </ul>
    @endif
</li>