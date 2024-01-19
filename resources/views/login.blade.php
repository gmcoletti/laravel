<!-- resources/views/login.blade.php -->

<form method="post" action="{{ route('authenticate') }}" id="loginForm">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="username">Username:</label>
        </div>
        <div class="col-md-7">
            <input type="text" name="username" placeholder="adm" required>
        </div>
        <div class="col-md-3">
            <label for="password">Password:</label>
        </div>
        <div class="col-md-7">
            <input type="password" name="password" placeholder="123" required>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-danger">Login</button>
</form>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        alert(response.error);
                    }
                },
                error: function (error) {
                    console.error('Erro na requisição AJAX:', error);
                }
            });
        });
    });
</script>
