<!-- resources/views/contacts/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Form</h2>

<form method="post" action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}">
    @csrf
    @if(isset($contact))
        @method('put')
    @endif

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', isset($contact) ? $contact->name : '') }}" required>
    @error('name')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="{{ old('contact', isset($contact) ? $contact->contact : '') }}" required>
    @error('contact')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email', isset($contact) ? $contact->email : '') }}" required>
    @error('email')<span style="color: red;">{{ $message }}</span>@enderror

    <br>

    <button type="submit">{{ isset($contact) ? 'Update' : 'Create' }}</button>
</form>

</body>
</html>
