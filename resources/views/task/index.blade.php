<div>
    <a href="{{route('create')}}">Create</a>
</div>
<form method="GET">
    <label>
        ASC: <input type="radio" name="sort" value="asc">
        DESC: <input type="radio" name="sort" value="desc">
    </label>
    <input type="submit" value="Sort">
</form>
<table>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Deadline</th>
        <th>Finished</th>
        <th></th>
    </tr>
    @foreach($listTask as $taskInfo)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$taskInfo->name}}</td>
        <td>{{$taskInfo->deadline_at}}</td>
        <td>{{$taskInfo->finished_at}}</td>
        <td>{{$taskInfo->isDeplay() ? 'Tre' : 'Hoan Thanh'}}</td>
        <td>
            <a href="{{ route('edit', $taskInfo->id) }}">Edit</a>
            <a href="{{ route('delete', $taskInfo->id) }}">Delete</a>
            <a href="{{ route('complete', $taskInfo->id) }}">Complete</a>
        </td>
        </tr>
    @endforeach
    <tr>
</table>
