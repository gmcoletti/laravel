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
        <li>
            {{ $contact->name }} - {{ $contact->contact }} - {{ $contact->email }}
            <a href="{{ route('contacts.edit', $contact) }}">Alterar</a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>

</body>
</html>
