@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Description</td>
        <td>Photo</td>
        <td>Urlmap</td>
        <td>Active</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($locals as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>Photo</td>
            <td>{{ $value->urlmap }}</td>
            <td>{{ $value->active }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/local/' . $value->id . 'edit') }}">edit</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/local/' . $value->id . '/destroy') }}">delete</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>