function promeni(brojac)
{
    if(brojac=="1")
    {
        document.getElementsByName("eng")[0].disabled = false;
        document.getElementsByName("srp")[0].disabled = true;
    }
    else if(brojac=="2")
    {
        document.getElementsByName("eng")[0].disabled = true;
        document.getElementsByName("srp")[0].disabled = false;
    }
}