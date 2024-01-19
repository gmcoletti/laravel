<!-- resources/views/contacts/index.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Projects</title>
</head>
<body>
<div class="container">

<h2>Contact List</h2>
    <div class="row">
        <div clas="col-md-12">
            <ul class="nav">
                @if(!$view)
                <li class="nav-item">
                    <a class="nav-link" href="#0" onClick="handleNew(1,0)">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#0" onClick="handleNew(2,0)">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
<div class="row">
    <div clas="col-md-12">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            @if($view)
            <th>Alter</th>
            <th>Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>

            @if($view)
                <td><a href="#0" onClick="handleNew(2,{{$contact->id}})"><i class="fas fa-pencil-alt"></i></a></td>
                <td>
                <form onsubmit="return handleConfirm();" action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <button style=border:0px;' type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
                 </td>
            @endif
        </tr>
    @endforeach
        </tbody>
    </table>
        {{ $contacts->links() }}
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
            </div>
        </div>
    </div>
</div>
<script>
    function handleConfirm(){
        if(confirm("To remove")){
            return true;
        }else{
            return false;
        }
    }
function handleNew(sts,id){
    var path = "login";
    if(sts == 1){
        $("#exampleModalLabel").html("Login");
    }
    if(sts == 2){
        $("#exampleModalLabel").html("Register");
        path = "contacts/create";
        if(id > 0){
            path = "contacts/"+id+"/edit";
        }
    }
    $("#exampleModal").modal("show");

    $.get( path, function( data ) {
        $( "#ibody" ).html( data );
    });
}
</script>
</body>
<style>
    .hidden{
        display: none;
    }

</style>
</html>
