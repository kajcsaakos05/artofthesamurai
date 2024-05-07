


function alpontok_megjelenitese()
{
    document.getElementById("alpontok").style.display = "flex";
    document.getElementById("alpontok").style.width = "100vw";
    document.getElementById("alpontok").style.height = "100vh";
    document.getElementById("alpontok").style.backgroundColor = "rgb(5, 71, 112)";
    document.getElementById("gomb").style.display = "none";
    document.getElementById("logo").style.display = "none";
    document.getElementById("alpontok").style.zIndex = 2;
    document.getElementById("alpontok").style.flexDirection = "column";
    document.getElementById("alpontok").style.justifyContent = "space-evenly";
    document.getElementById("alpontok").style.alignItems = "center";
    document.getElementById("jobb").style.display = "none";
    document.getElementById("home").style.height = "20%";
    document.getElementById("rolunk").style.height = "20%";
    document.getElementById("termekek").style.height = "20%";
    document.getElementById("event").style.height = "20%";
    document.getElementById("login").style.marginLeft = "0px";
}

function facebook()
{
    let face = "https://www.facebook.com/share/VQS6CjXJyaPqspEi/"
    window.location.href = face;
}