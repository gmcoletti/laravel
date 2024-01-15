<!-- resources/views/login.blade.php -->

<form method="post" action="{{ route('authenticate') }}">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="username">Username: Adm</label>
        </div>
        <div class="col-md-7">
            <input type="text" name="username" required>
        </div>
        <div class="col-md-3">
            <label for="password">Password: 123</label>
        </div>
        <div class="col-md-7">
            <input type="password" name="password" required>
        </div>
    </div>
    <br>
    <button type="submit">Login</button>
</form>
