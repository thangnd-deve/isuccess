<form method="post" action="{{route('store')}}">
    @csrf
    <label>
        Name: <input type="text" name="name" value="{{old('name')}}">
        <br/>
        Point: <input type="text" name="point" value="{{old('point')}}">

        <br/>
        Deadline: <input type="date" name="deadline_at" value="{{old('deadline_at')}}">

        <br/>
        <input type="submit">
    </label>
</form>
