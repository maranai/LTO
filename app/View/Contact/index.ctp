<?php
$this->start('mainPage'); ?>




<div class="mainForm">
    <h1>
        Nos interesa su opini&oacute;n
    </h1>

    <h3>
        Por favor, d&eacute;jenos sus preguntas, comentarios o sugerencias y le responderemos lo m&aacute;s pronto
        posible.
    </h3>

    <div class="box">
        <div class="box-shadow"></div>
        <div class="box-gradient">
            <table>
                <tr>
                    <td>
                        Nombre
                    </td>
                </tr>
                <tr>
                    <td>
                        <input size="60" type="text" name="ctNombre" id="ctNombre" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Correo electr&oacute;nico
                    </td>
                </tr>
                <tr>
                    <td>
                        <input size="60" type="text" name="ctEmail" id="ctEmail" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Tel&eacute;fono
                    </td>
                </tr>
                <tr>
                    <td>
                        <input size="60" type="text" name="ctTelefono" id="ctTelefono" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Su comentario
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea cols="85" rows="5"  name="ctComentario" id="ctComentario"></textarea>
                    </td>
                </tr>
                <tr class="paddingTop5">
                    <td><input name="btnSubmit" type="submit" id="btnSubmit" value="Enviar" class="orangeButton"></td>
                </tr>
            </table>
        </div>
    </div>
    <br />

    <h2>
        Log&iacute;stica de transporte Online
    </h2>
    <h4>
        info@fletescr.com
    </h4>



</div>
<?php
$this->end();
?>

