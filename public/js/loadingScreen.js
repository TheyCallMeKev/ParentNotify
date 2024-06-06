document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("load", function() {
        let texto = document.getElementById("final-text")

        this.setTimeout(function() {
            texto.innerHTML = "Carga completada."
            this.setTimeout(function() {
                document.getElementById("loading_screen").style.opacity = "0";
                this.setTimeout(function() {
                    document.getElementById("loading_screen").style.display = "none";
                }, 500)
            }, 1000);
        }, 1500);

    })
})