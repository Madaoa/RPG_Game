<?php
@include('Vues/header.html');
?>
    <div class="container flex">
        <div class="row justify-content-center align-self-center index">
            <div class="col-lg-6">
                <h1>Choisissez votre classe</h1>

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