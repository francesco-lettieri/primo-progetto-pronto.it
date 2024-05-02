   // Funzione per far scomparire il flash dopo un certo periodo di tempo
    function nascondiFlash() {
        // Seleziona l'elemento flash
        var flash = document.getElementById("flashMessage");

        // Nascondi l'elemento flash dopo 5 secondi
        setTimeout(function() {
            flash.style.display = "none";
        }, 4000); // 5000 millisecondi = 5 secondi
    }

    // Chiama la funzione per far scomparire il flash dopo il caricamento della pagina
    window.onload = nascondiFlash;

