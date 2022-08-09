<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src={{ asset('js/js.js') }}></script>
    <title>Document</title>
</head>

<body>
    <h2>Modal Login Form</h2>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Admin</button>
    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Utilisateur</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="{{ route('logAdmin') }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="imgcontainer">
                <h1>Admin@</h1>

                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="images/image-facteur2.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="mdp" required>

                <button type="submit" class="loginAdmin">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>



    <div id="id02" class="modal">

        <form class="modal-content animate" action="{{ route('logChauffeur') }}" method="post">
            @csrf
            <div class="imgcontainer">
                <h1>Utilisateur@</h1>

                <span onclick="document.getElementById('id02').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                {{-- <img src="images/image-facteur2.jpg" alt="Avatar" class="avatar"> --}}
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="mdp" required>

                <button type="submit" class="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Nouveau
                    compte?</button>
                <button type="button" onclick="document.getElementById('id02').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>


    <div id="id03" class="modal">

        <form class="modal-content animate" action="{{ route('insertChauffeur') }}" method="post">
            @csrf
            <div class="imgcontainer">
                <h1>Registre@</h1>

                <span onclick="document.getElementById('id03').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                {{-- <img src="images/image-facteur2.jpg" alt="Avatar" class="avatar"> --}}
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="mdp" required>


                <label for="uname"><b>Votre nom </b></label>
                <input type="text" placeholder="nom" name="nom" required>


                <label for="uname"><b>Numero carte d'identite</b></label>
                <input type="text" placeholder="cin" name="cin" required><br>


                <label for="uname"><b>Date de naissance</b></label>
                <input type="date" name="date" required><hr>


                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="regitre">Enregistrer</button>

            <div class="container" style="background-color:#f1f1f1">
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
    </script>
</body>

</html>
