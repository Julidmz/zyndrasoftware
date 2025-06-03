<?php
// Manejo básico del formulario
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensajeUsuario = htmlspecialchars($_POST["mensaje"]);

    $mensaje = "¡Gracias por contactarte, $nombre! Te responderemos pronto.";
}
?>

<div id="contacto">
    <h2>Contacto</h2>
    <?php if ($mensaje): ?>
        <div class="mensaje-confirmacion"><?= $mensaje ?></div>
    <?php endif; ?>
    <form method="post" onsubmit="return validarFormulario();">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Tu nombre">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Tu email">
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" rows="5" placeholder="Escribí tu mensaje..."></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>

<script>
    function validarFormulario() {
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const mensaje = document.getElementById("mensaje").value.trim();

        if (!nombre || !email || !mensaje) {
            alert("Todos los campos son obligatorios.");
            return false;
        }

        if (!email.includes("@")) {
            alert("El correo electrónico no es válido.");
            return false;
        }

        return true;
    }
</script>