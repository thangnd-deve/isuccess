<form method="post" action="{{route('update', $taskInfo->id)}}">
    @csrf
    <label>
        Name: <input type="text" name="name" value="{{old('name', $taskInfo->name)}}">
        <br/>
        Point: <input type="text" name="point" value="{{old('point', $taskInfo->point)}}">

        <br/>
        Deadline: <input type="date" name="deadline_at" value="{{old('deadline_at', Carbon\Carbon::parse($taskInfo->deadline_at)->format('Y-m-d'))}}">

        <br/>
        <input type="submit">
    </label>
</form>
