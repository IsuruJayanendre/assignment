<tr>
    <th scope="row">{{ $person->id }}</th>
    <td>{{ $person->name }}</td>
    <td>{{ $person->nic }}</td>
    <td>{{ $person->dob }}</td>
    <td>
        <div class="d-flex gap-2 align-items-center">
            <a href="{{ route('person.show', $person->id) }}" class="btn btn-dark">View</a>

            @if (Auth::user()->user_type == '1')

            <a href="{{ route('person.edit', $person->id) }}" class="btn btn-success">Edit</a>
            <form action="{{ route('person.destroy', $person->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this person?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            @endif

        </div>
    </td>
</tr>
