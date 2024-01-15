<!-- resources/views/contacts/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Form</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="post" action="{{ route('contacts.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" required>
    @error('name')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" required>
    @error('contact')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" required>
    @error('email')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
