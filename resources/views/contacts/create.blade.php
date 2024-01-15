<!-- resources/views/contacts/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Form</h2>

<form name="form-send" method="post" action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}">
    @csrf
    @if(isset($contact))
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-3"><label for="name">Name:</label></div>
        <div class="col-md-7"><input type="text" name="name" value="{{ old('name', isset($contact) ? $contact->name : '') }}" required>
            @error('name')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>

    <div class="row">
        <div class="col-md-3"><label for="contact">Contact:</label></div>
        <div class="col-md-7"> <input type="text" name="contact" value="{{ old('contact', isset($contact) ? $contact->contact : '') }}" required>
            @error('contact')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>

    <div class="row">
        <div class="col-md-3"><label for="email">Email:</label></div>
        <div class="col-md-7"><input type="email" name="email" value="{{ old('email', isset($contact) ? $contact->email : '') }}" required>
            @error('email')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>
</form>

    <button type="submit">{{ isset($contact) ? 'Update' : 'Create' }}</button>
</form>

</body>
</html>
