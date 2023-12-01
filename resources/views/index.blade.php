<!-- resources/views/users/index.blade.php -->

@foreach ($users as $user)
    <div>{{ $user->name }}</div>
@endforeach
