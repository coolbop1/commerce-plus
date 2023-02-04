function register() {
    let url = "/api/register";
    let params = new FormData();
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let password2 = document.getElementById('password2').value;
    let hasError = false;
    switch (true) {
        case name == '':
            alert("Please enter your name");
            hasError = true;
            break;
        case email == '':
            alert("Please enter your email");
            hasError = true;
            break;
        case password == '':
            alert("Please enter your password");
            hasError = true;
            break;
        case password2 == '':
            alert("Please enter your confirmation password");
            hasError = true;
            break;
    
        default:
        params.append("name", name);
        params.append("email", email);
        params.append("password", password);
        params.append("password_confirm", password2);
            break;
    }
    if(hasError){
        console.log("error");
        return hasError;
    }

    let http = new XMLHttpRequest();
    http.open("POST", url, true);
    //http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //http.setRequestHeader("Content-type", "image");
    //http.setRequestHeader("Content-type","multipart/form-data");
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 201) {
            console.log("this.responseText", this.responseText);
            // document.getElementById('add-area-button').innerText = "Add Area";
            // document.getElementById('add-area-button').disabled = false;
            // closeAddArea();
            // populateCountry(false);
            // localPicked(document.getElementById('local'));
            //window.location.href = "http://127.0.0.1:8000/states";
        }
    }
    http.send(params);


    
}