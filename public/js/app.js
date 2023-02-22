const COMMERCE_PLUS_TOKEN = localStorage.getItem('COMMERCE_PLUS_TOKEN');
const setAccessss = () => {
    if(COMMERCE_PLUS_TOKEN) {
        let http_f = new XMLHttpRequest();
        http_f.open("GET", 'api/user?session', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
        http_f.onreadystatechange = function() {
            if(http_f.readyState == 4) {
                if(http_f.status == 200) {
                    console.log("user fetched", this.responseText);
                }
            }
        }
        http_f.send();

    } else {
        let http_f = new XMLHttpRequest();
        http_f.open("GET", 'api/logout', true);
        http_f.onreadystatechange = function() {
            if(http_f.readyState == 4) {
                if(http_f.status == 200) {
                    console.log("user fetched", this.responseText);
                }
            }
        }
        http_f.send();
    }
}

// let http_f = new XMLHttpRequest();
// http_f.open("GET", 'api/user?session', true);
// http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
// http_f.onreadystatechange = function() {
//     if(http_f.readyState == 4) {
//         if(http_f.status == 200) {
//             console.log("this.responseText", this.responseText);
//         }
//     }
// }
// http_f.send();




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

function submitForm(formElement, url, method = 'POST', button_id = 'reg-button') {
    let clickedButton = document.getElementById(button_id);
    let buttonText = clickedButton.innerText;
    clickedButton.innerHTML = `<i class="las la-spinner la-spin la-3x opacity-70"></i>`;
    let params = new FormData(formElement);
    params.forEach((val, key, parent) => {
        let val_span = document.getElementById('validate-'+key);
        if(val_span)
        val_span.innerText = '';
    })
    let http = new XMLHttpRequest();
    http.open(method, url, true);
    if(COMMERCE_PLUS_TOKEN) {
        console.log("url "+url);
        console.log("COMMERCE_PLUS_TOKEN "+COMMERCE_PLUS_TOKEN);
        http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    }
    http.onreadystatechange = function() {
        let response = JSON.parse(this.responseText);
        if(http.readyState == 4) {
            if(http.status == 200) {
                console.log("this.responseText", this.responseText);
                clickedButton.innerText =  buttonText;
                let token = response.data.token;
                localStorage.setItem('COMMERCE_PLUS_TOKEN', token);
                let message = response.message;
                showAlert(message, 'alert-success');
                window.location.href = '/';
            } else { 
                console.log(" Error this.responseText", this.responseText);
                clickedButton.innerText =  buttonText;
                let message = response.message;
                showAlert(message, 'alert-warning', response.data ?? []);
            }
        } 
        
    }
    http.send(params);
    return false;
}

const logout = () => {
    localStorage.removeItem('COMMERCE_PLUS_TOKEN');
    let http_f = new XMLHttpRequest();
    http_f.open("GET", 'api/logout', true);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            if(http_f.status == 200) {
                window.location.href = '/';
            }
        }
    }
    http_f.send();
}

function showAlert(message, type, data = []) {
    document.getElementById('alert-modal').innerText = message;
    document.getElementById('alert-modal').classList.replace('hide', type);
    if(message = 'Validation Error.'){
        const propertyNames = Object.keys(data);
        const propertyValues = Object.values(data);
        propertyNames.forEach((element, index) => {
            let val_span = document.getElementById('validate-'+element);
            if(val_span) {
                val_span.innerText = propertyValues[index][0];
            }
            
        });
    }
    setTimeout(() => {
        document.getElementById('alert-modal').classList.replace(type, 'hide');
    },3000);

}

