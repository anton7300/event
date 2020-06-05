<a href="{{ route('event.show', ['event' => $item->id]) }}">{{ $item->name }}</a>
<a href="{{ route('event.edit', ['event' => $item->id]) }}">Edit</a>
<form method="post" action="{{ route('event.destroy', ['event' => $item->id]) }}">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
<br>