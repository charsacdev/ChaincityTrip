<!DOCTYPE html>
<html>
<head>
    <title>Location Search</title>
</head>
<body>
    <form method="POST" action="{{ route('location.search') }}">
        @csrf
        <input type="text" name="query">
        <button type="submit">search</button>
    </form>
</body>
</html>
