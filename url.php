<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style> 
            #btn-back-to-top 
            {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: none;
            }
        </style>
    </head>
    <body>
        <button
            type="button"
            class="btn btn-danger btn-floating btn-lg"
            id="btn-back-to-top"
            >
        <i class="fas fa-arrow-up"></i>
        </button>
        <h1> Outil de telechargement de vidéos youtube</h1>
        <form action="download.php" method="post" style="margin-top: 15px; margin-left: 15px;">
            <div id="inputFormRowOff">
                <div class="input-group mb-3">
                    <input type="text" name="title[]" class="form-control m-input" placeholder="Entrer URL" autocomplete="off" required>
                </div>
            </div>
            <button id="addRow" type="button" class="btn btn-info">Ajouter un lien</button>
            <div id="newRow"></div>
            <div>
                <input type="radio" id="mptrois" name="type" value="mptrois"
                     checked>
                <label for="mptrois">Audio</label>
                <div id="formataudio" style="margin-left: 50px;">
                    <div id="xx">
                        <legend>Format audio</legend>
                        <input type="radio" id="firstaud" name="format" value="best"
                         checked>
                        <label for="format">par défaut (le meilleur possible)</label>
                        <input type="radio" id="formataud" name="format" value="aac">
                        <label for="mptrois">aac</label>
                        <input type="radio" id="formataud" name="format" value="flac">
                        <label for="mptrois">flac</label>
                        <input type="radio" id="formataud" name="format" value="mp3">
                        <label for="mptrois">mp3</label>
                        <input type="radio" id="formataud" name="format" value="m4a">
                        <label for="mptrois">m4a</label>
                        <input type="radio" id="formataud" name="format" value="opus">
                        <label for="mptrois">opus</label>
                        <input type="radio" id="formataud" name="format" value="vorbis">
                        <label for="mptrois">vorbis</label>
                        <input type="radio" id="formataud" name="format" value="wav">
                        <label for="mptrois">wav</label>
                        <input type="radio" id="formataud" name="format" value="alac">
                        <label for="mptrois">alac</label>
                    </div>
                </div>
            </div>
            <div>
              <input type="radio" id="mpquatre" name="type" value="mpquatre">
              <label for="mpquatre">Video</label>
              <div id="formatvideo" style="visibility: hidden; display: none;">
                    <div id="xy">
                        <legend>Format video</legend>
                        <input type="radio" id="firstvid" name="format" value="best">
                        <label for="format">par défaut (le meilleur possible)</label>
                        <input type="radio" id="format" name="format" value="3gp">
                        <label for="mptrois">3gp</label>
                        <input type="radio" id="format" name="format" value="aac">
                        <label for="mptrois">aac</label>
                        <input type="radio" id="format" name="format" value="flv">
                        <label for="mptrois">flv</label>
                        <input type="radio" id="format" name="format" value="mp4">
                        <label for="mptrois">mp4</label>
                        <input type="radio" id="format" name="format" value="ogg">
                        <label for="mptrois">ogg</label>
                        <input type="radio" id="format" name="format" value="webm">
                        <label for="mptrois">webm</label>
                    </div>
                </div>
            </div>
            <h4> Renommez si vous le souhaitez le dossier et l'archive qui contiendront vos téléchargements (uniquement si plusieurs liens) </h4>
            <input type="text" name="rename" class="form-control m-input" placeholder="renommez" autocomplete="off">
            <fieldset>
                <legend>Conserver l'ordre des liens lors du téléchargement ? (uniquement si plusieurs liens)</legend>
                <div>
                    <input type="checkbox" id="ordre" name="ordre" checked>
                    <label for="ordre">Coché pour oui, décoché pour non</label>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="TELECHARGER" style="background-color: #1a53ff; color: white; border-radius: 6px; padding: 5px; padding-left: 12px; padding-right: 12px; cursor: pointer;">
        </form>
        <input type="button" name="reinit" id="reinit" value="REINITIALISER" style="margin-left: 15px; background-color: #f90d0d; color: white; border-radius: 6px; padding: 5px; padding-left: 12px; padding-right: 12px; cursor: pointer;">
        <h3 style="margin-left: 2%; margin-top: 50px;"> A noter </h3>
        <div>
            <p style="width: 80%; margin-left: 2%;"> 
                Si une erreur apparaît ou que un ou plusieurs fichiers sont manquants, cela est très probablement dû au fait que le ou les fichiers souhaités n'est ou ne sont pas disponibles dans votre pays, ou bien que le format souhaité n'est pas disponible.
            </p>
        </div>
    </body>
</html>


<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Entrer URL" autocomplete="off">';
        html += '<div class="input-group-append">';
        
        html += '<button id="removeRow" type="button" class="btn btn-danger">Supprimer</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    $("#mptrois").click(function () 
    {
        $("#formatvideo").css('visibility', 'hidden');
        $("#formatvideo").css('display', 'none');
        $("#formataudio").css('visibility', 'visible');
        $("#formataudio").css('display', 'contents');
        $("#xx").css('margin-left', '50px');
        $("#firstvid").prop('checked', false);
        $("#firstaud").prop('checked', true);   
    });
    $("#mpquatre").click(function () 
    {
        $("#formataudio").css('visibility', 'hidden');
        $("#formataudio").css('display', 'none');
        $("#formatvideo").css('visibility', 'visible');
        $("#formatvideo").css('display', 'contents');
        $("#xy").css('margin-left', '50px');
        $("#firstaud").prop('checked', false);
        $("#firstvid").prop('checked', true);
    });

    $("#reinit").click(function () {
        while($("#inputFormRow").length != 0) 
        {
            $('#inputFormRow').remove();
        }
        $('.form-control').val('');
    });


    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
    scrollFunction();
    };

    function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }
</script>