document.addEventListener("DOMContentLoaded", function () {
    const slike = document.querySelectorAll("main img");

    let aktivniZvuk = null;

    slike.forEach(img => {
        img.addEventListener("mouseenter", () => {
            if (aktivniZvuk) {
                aktivniZvuk.pause();
                aktivniZvuk.currentTime = 0;
            }
            aktivniZvuk = new Audio(img.dataset.zvuk);
            aktivniZvuk.play();
        });

        img.addEventListener("click", () => {
            const opis = img.dataset.opis;
            window.open(opis, "_blank", "width=300,height=200,top=200,left=200");
        });
    });
});