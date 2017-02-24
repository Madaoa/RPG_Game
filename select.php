<?php

session_start();
session_destroy();
@include('Vues/header_bg.html');
?>

    <div class=" ">
        <div class="">
            <div class="col-lg-6">
                <h1 class="white_text">Choisissez votre classe</h1>


                <form method="post" action="game.php">
                    <select name="classe">
                        <option value="Guerrier">Guerrier</option>
                        <option value="Magicien">Magicien</option>
                        <option value="Paladin">Paladin</option>
                    </select>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
<?php
    @include('Vues/footer.html');
?>