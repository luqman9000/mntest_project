<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Congrats you are logged in.</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>
    @else
        <div style="border: 3px solid black;">
            <h1>
                Register duluan
            </h1>
            <form action="/register" method="POST">
                @csrf
                <input name="email" type="text" placeholder="email">
                <input name="name" type="text" placeholder="name">
                <input name="password" type="password" placeholder="password">
                <button>Register jo lah</button>
            </form>
        </div>
        <div style="border: 3px solid black;">
            <h1>
                Login duluan
            </h1>
            <form action="/login" method="POST">
                @csrf
                <input name="loginemail" type="text" placeholder="email">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Login jo lah</button>
            </form>
        </div>
    @endauth
    
</body>
</html>