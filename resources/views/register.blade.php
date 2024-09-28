<form action="{{ url('/register') }}"  method="POST">

    @csrf

    <input type="text" name="name" id="name" placeholder="username">
    <input type="text" name="email" id="email" placeholder="email">
    <input type="password" name="password" id="password" placeholder="password">

    <input type="submit" value="registrarse">
</form>