<!-- resources/views/contacts/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
</head>
<body>

<h2>Contact List</h2>

<ul>
    @foreach($contacts as $contact)
        <li>{{ $contact->name }} - {{ $contact->contact }} - {{ $contact->email }}</li>
    @endforeach
</ul>

</body>
</html>
