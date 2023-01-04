<form action="/login" method="POST">
    @csrf
    <label for="email">Email</label>
    <input id="email" type="email" name="email">
    <br>
    <label for="password">Password</label>
    <input id="password" type="password" name="password">
    <button type="submit">Log in</button>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
