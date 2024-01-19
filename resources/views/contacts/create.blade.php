<!-- resources/views/contacts/create.blade.php -->

<!DOCTYPE html>
<html>

<body>
<form name="registerForm" id="registerForm" method="post"
      action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}">
    @csrf
    @if(isset($contact))
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-3"><label for="name">Name:</label></div>
        <div class="col-md-7"><input type="text" name="name"
                                     value="{{ old('name', isset($contact) ? $contact->name : '') }}" required>
            @error('name')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>

    <div class="row">
        <div class="col-md-3"><label for="contact">Contact:</label></div>
        <div class="col-md-7"> <input type="text" name="contact"
                                      value="{{ old('contact', isset($contact) ? $contact->contact : '') }}" required>
            @error('contact')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>

    <div class="row">
        <div class="col-md-3"><label for="email">Email:</label></div>
        <div class="col-md-7"><input type="email" name="email"
                                     value="{{ old('email', isset($contact) ? $contact->email : '') }}" required>
            @error('email')<span style="color: red;">{{ $message }}</span>@enderror</div>
    </div>

    <!-- Movendo o botão para dentro do formulário -->
    <button class='btn btn-danger' type="submit">{{ isset($contact) ? 'Update' : 'Create' }}</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert('Process carried out successfully')
                        window.location.href = "/contacts";
                    } else {
                        alert(response.error);
                    }
                },
                error: function (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errorMessages = '';
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            errorMessages += key + ': ' + value[0] + '\n';
                        });
                        if (xhr.responseJSON.message) {
                            errorMessages += xhr.responseJSON.message+'\n';
                        }
                        alert('Validation Errors:\n' + errorMessages);
                    }
                }
            });
        });
    });
</script>
</body>

</html>
