let popup = null;

function myFunction(){
    const gradovi = {
        kv: "kraljevo",
        ca: "cacak",
        bg: "beograd",
        zr: "zrenjanin",
        va: "valjevo",
        vr: "vranje",
        sb: "subotica",
        bo: "bor",
        ni: "nis",
        ns: "novi-sad"
    };

    const selekt = document.getElementById("select").value;
    const iframe1 = document.getElementById("frame1");

    if(gradovi[selekt])
    {
        iframe1.src = `https://naslovi.net/vremenska-prognoza/${gradovi[selekt]}`;

        if(popup && !popup.closed)
        {
            popup.close();
        }

        popup = window.open(`./html/${selekt}.html`, "znamenitosti", "width=300,height=200,top=300,left=1250");
    }
    else
    {
        iframe1.src = "";
    }
}