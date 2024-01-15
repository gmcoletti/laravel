<!-- resources/views/contacts/index.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Projects</title>
</head>
<body>
<div class="container">

<h2>Contact List</h2>
    <div class="row">
        <div clas="col-md-12">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts/create">Cadastro</a>
                </li>
            </ul>
        </div>
    </div>
<div class="row">
    <div clas="col-md-12">

    <table class="table table-dark table-hover">
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>

            @if($view)
                <td><a href="{{ route('contacts.edit', $contact) }}">Alter</a></td>
                <td>
                <form action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit">Excluir</button>
                </form>
                 </td>
            @endif
        </tr>
    @endforeach
</table>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Open</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="ibody"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
function handleNew(){
    $("#exampleModal").modal("show");

    $.get( "/contacts/create", function( data ) {
        $( "#ibody" ).html( data );
    });
}
</script>
</body>
</html>
