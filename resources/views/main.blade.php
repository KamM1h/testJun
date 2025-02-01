<form action="/users" method="post">
    @csrf
    <input type="text" name="search" required>
    <button type="submit">Search</button>
</form>

@if(isset($users))
    <ul>
        @foreach($users as $user)
        <form action="/add" method="post">
            @csrf
            <li>{{$user['name']}}</li>
            <input type="hidden" name="name" value="{{$user['name']}}">          
            <button type="submit">Add</button>
        </form>
        @endforeach
    </ul>
@endif