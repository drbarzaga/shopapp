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
            <td>Actions</td>
        </tr>
    @endforeach
    </tbody>
</table>