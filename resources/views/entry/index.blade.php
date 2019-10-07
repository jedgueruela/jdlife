@extends('master')

@section('content')
    @if ($entries->isEmpty())
        <p>No entries found</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Drawings or Paye?</th>
                    <th>Years in Business</th>
                    <th>Work Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>
                        <p>{{ $entry->drawings_or_paye }}</p>                        
                        <a href="{{ route('entries.show', [$entry->id]) }}">View</a> | <a href="{{ route('entries.edit', [$entry->id]) }}">Edit</a>
                    </td>
                    <td>{{ $entry->years_in_business }}</td>
                    <td>{{ $entry->work_type }}</td>
                    <td>
                        <form action="{{ route('entries.destroy', [$entry->id]) }}" onclick="return confirm('Are you sure you want to delete this entry?')" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $entries->links() }}
    @endif
@endsection
