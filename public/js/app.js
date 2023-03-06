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

const upload = (element, input_id) => {
    console.log('got to this place');
    let url = '/api/file-upload';
    let photo = element.files[0];
    let params = new FormData();
    params.append("file", photo);
    let http = new XMLHttpRequest();
    http.open('POST', url, true);
    if(COMMERCE_PLUS_TOKEN) {
        http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    }
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) {
                console.log("this.responseText", this.responseText);
                let value = document.getElementById(input_id).value;
                let value_array = value == '' ? [] : value.split(',')
                value_array.push(response?.data?.id);
                let new_value = value_array.join(',');
                document.getElementById(input_id).value = new_value ?? response.file_path;
                switch (input_id) {
                    case 'shop_logo_input':
                        document.getElementById('preview_'+input_id).innerHTML = `<img src="/`+response.file_path+`" class="img-fit">`;    
                        break;
                    case 'store_banner_input':
                        document.getElementById('preview_'+input_id).innerHTML += `
                        <div id="preview_store_banner_input" class="file-preview box sm">
                            <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                    <img src="/`+response.file_path+`" class="img-fit">
                                </div>
                                <div class="remove">
                                    <button class="btn btn-sm btn-link remove-attachment" type="button">
                                        <i class="la la-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        `;
                        break;
                    case 'product_image_input':
                        document.getElementById('preview_'+input_id).innerHTML += `
                        <div class="file-preview box sm">
                            <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                    <img src="/`+response.file_path+`" class="img-fit">
                                </div>
                                <div class="col body"><h6 class="d-flex"><span class="text-truncate title"></span><span class="ext flex-shrink-0"></span></h6><p></p></div>
                                <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                            </div>
                        </div>
                        `;
                        break;
                    case 'product_thumbnail_input':
                        document.getElementById('preview_'+input_id).innerHTML = `
                        <div class="file-preview box sm">
                            <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                    <img src="/`+response.file_path+`" class="img-fit">
                                </div>
                                <div class="col body"><h6 class="d-flex"><span class="text-truncate title"></span><span class="ext flex-shrink-0"></span></h6><p></p></div>
                                <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                            </div>
                        </div>
                        `;
                        break;
                
                    default:
                        break;
                }
                
            }
        }
    }
    http.send(params);

}

const importData = (element, button_id) => {
    let clickedButton = document.getElementById(button_id);
    let buttonText = clickedButton.innerText;
    clickedButton.innerHTML = `<i class="las la-spinner la-spin la-3x opacity-70"></i>`;
    let params_ = new FormData();
    let file = element.files[0];
    params_.append("file", file);
    let http_ = new XMLHttpRequest();
    http_.open('POST', '/api/import-products', true);
    http_.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_.onreadystatechange = function() {
        if(http_.readyState == 4) {
            let response_ = JSON.parse(this.responseText);
            if(http_.status == 200) {
                clickedButton.innerText =  buttonText;
                let message = response_.message;
                showAlert(message, 'alert-success');
                switch (button_id) {
                    case 'import-products':
                        window.location.href = '/seller/products';
                        break;
                
                    default:
                        //window.location.href = '/';
                        break;
                }
            } else {
                clickedButton.innerText =  buttonText;
                let message = response_.message;
                showAlert(message, 'alert-warning', response_.data ?? []);
            }
        }
    }
    http_.send(params_);
   
    return false;
}

const toggleProductColumn = (element, column) => {
    let product_id = element.value;
    let params = new FormData();
    params.append('product_id', product_id);
    params.append('column', column);
    let http = new XMLHttpRequest();
    http.open('POST','/api/toggle-product-column' , true);
    if(COMMERCE_PLUS_TOKEN) {
        console.log("COMMERCE_PLUS_TOKEN "+COMMERCE_PLUS_TOKEN);
        http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
        //http.setRequestHeader("Content-type", "application/json;");
    }

    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http.status == 200) {
                let message = response.message;
                showAlert(message, 'alert-success');
            } else {
                let message = response.message;
                showAlert(message, 'alert-warning', response.data ?? []);
            }
        }
    }

    http.send(params);
    return false;
}

const getCurrentLocation = () => {
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            document.getElementById('lat').value = lat;
            document.getElementById('long').value = lon;
            document.getElementById('lat_').value = lat;
            document.getElementById('long_').value = lon;
            document.getElementById('lat_').setAttribute('disabled', 'true');
            document.getElementById('long_').setAttribute('disabled', 'true');
        })
    } else {
        showAlert('Please enable location on your browser and try again!', 'alert-warning', []);
    }
}

function submitForm(formElement, url, method = 'POST', button_id = 'reg-button') {
    let clickedButton = document.getElementById(button_id);
    let buttonText = clickedButton.innerText;
    clickedButton.innerHTML = `<i class="las la-spinner la-spin la-3x opacity-70"></i>`;
    let params = new FormData(formElement);
    console.log("button_id ",button_id);
    var object = {};
    params.forEach((val, key, parent) => {
        console.log(key,val);
        object[key] = val;
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
        http.setRequestHeader("Content-type", "application/json;");
    }
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http.status == 200) {
                console.log("this.responseText", this.responseText);
                clickedButton.innerText =  buttonText;
                let token = response?.data?.token ?? null;
                if(token)
                localStorage.setItem('COMMERCE_PLUS_TOKEN', token);
                let message = response.message;
                showAlert(message, 'alert-success');
                switch (button_id) {
                    case 'edit-shop-details-button':
                    case 'edit-shop-location-button':
                    case 'edit-shop-banner-button':
                    case 'edit-shop-socials-button':
                        window.location.href = '/seller/shop';
                        break;
                    case 'create-product-button':
                        window.location.href = '/seller/products';
                        break;
                
                    default:
                        window.location.href = '/';
                        break;
                }
            } else { 
                console.log(" Error this.responseText", this.responseText);
                clickedButton.innerText =  buttonText;
                let message = response.message;
                showAlert(message, 'alert-warning', response.data ?? []);
            }
        } 
        
    }
    var json = JSON.stringify(object);
    console.log('json', json);
    http.send(json);
    
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
            } else {
                document.getElementById('alert-modal').innerText += propertyValues[index][0];
            }
            
        });
    }
    setTimeout(() => {
        document.getElementById('alert-modal').classList.replace(type, 'hide');
    },3000);

}


function expandStoreList() {
    let expanded = document.getElementById('other-store-list').classList.contains('expand');
    if(expanded) {
        document.getElementById('other-store-list').classList.replace('expand', 'minimize');
        document.getElementById('expand-icon').classList.remove('rotate');
    } else {
        document.getElementById('other-store-list').classList.replace('minimize', 'expand');
        document.getElementById('expand-icon').classList.add('rotate');
    }
}

const switchStore = (store_id) => {
    expandStoreList();
    let http_f = new XMLHttpRequest();
    http_f.open("GET", '/api/switch-store?id='+store_id, true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            if(http_f.status == 200) {
                window.location.href = '/seller/dashboard';
            }
        }
    }
    http_f.send();

}





















//  file selector js


const openFileModal = (element, inputFieldId) => {
    clearSelected();
    selectAlreadyPicked(inputFieldId);
    let select_type = element.getAttribute("data-multiple") ?? 'false';
    document.getElementById('modal-backdrop').style="z-index: 1039;";
    document.getElementById('modal-backdrop').className = "modal-backdrop fade show modal-stack";
    document.getElementById('aizUploaderModal').classList.add('show');
    document.getElementById('aizUploaderModal').setAttribute('aria-modal', 'true');
    document.getElementById('aizUploaderModal').removeAttribute('aria-hidden');
    document.getElementById('aizUploaderModal').setAttribute('input-field', inputFieldId);
    document.getElementById('aizUploaderModal').style="z-index: 1040; display: block;";
    document.getElementById('aizUploaderModal').setAttribute('data-multiple', select_type);
    document.getElementsByTagName('body')[0].classList.add('modal-open');
}

const clearSelected = () => {
    document.querySelectorAll("[data-selected=true]").forEach(ele => {
        ele.setAttribute('data-selected', 'false');
    })
    document.getElementById('file-select-counter').innerText =  document.querySelectorAll("[data-selected=true]").length;
}

const selectAlreadyPicked = input_field_id => {
    let value = document.getElementById(input_field_id).value;
    let value_array = value == '' ? [] : value.split(',');
    value_array.forEach(val => {
        document.querySelectorAll("[data-value='"+val+"']").forEach(ele => {
            ele.setAttribute('data-selected', 'true');
        });
        document.querySelectorAll("[data-preview='"+val+"']").forEach(ele => {
            ele.setAttribute('data-selected', 'true');
        })
    })
    document.getElementById('file-select-counter').innerText =  document.querySelectorAll("[data-selected=true]").length;

}

const closeFileselctor = () => {
    clearSelected();
    document.getElementById('modal-backdrop').style="";
    document.getElementById('modal-backdrop').className = "";
    document.getElementById('aizUploaderModal').classList.remove('show');
    document.getElementById('aizUploaderModal').removeAttribute('aria-modal', 'true');
    document.getElementById('aizUploaderModal').setAttribute('aria-hidden', 'true');
    document.getElementById('aizUploaderModal').removeAttribute('input-field');
    document.getElementById('aizUploaderModal').style="";
    document.getElementById('aizUploaderModal').removeAttribute('data-multiple');
    document.getElementsByTagName('body')[0].classList.remove('modal-open');
}

const imagePicked = element => {
    let select_type = document.getElementById('aizUploaderModal').getAttribute("data-multiple") ?? 'false';
    if (select_type == 'false') {
        document.querySelectorAll("[data-selected=true]").forEach(ele => {
            ele.setAttribute('data-selected', 'false');
        })
    }
    //file-select-counter
    element.setAttribute('data-selected', element.getAttribute('data-selected') == 'false' ? 'true' : 'false');

    document.getElementById('file-select-counter').innerText =  document.querySelectorAll("[data-selected=true]").length;
    //let elementId = document.getElementById('aizUploaderModal').getAttribute('input-field');
    //console.log("elementId ",elementId);
}

const addSelectedFiles = () => {
    let select_type = document.getElementById('aizUploaderModal').getAttribute("data-multiple") ?? 'false';
    let input_field_id = document.getElementById('aizUploaderModal').getAttribute("input-field");
    if (select_type == 'false') {
        document.querySelectorAll("[data-selected=true]").forEach(ele => {
           document.getElementById(input_field_id).value = ele.getAttribute('data-value');
           document.getElementById('preview_'+input_field_id).innerHTML = `
                            <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                    <img src="/`+ele.getAttribute('data-preview')+`" class="img-fit">
                                </div>
                                <div class="col body"><h6 class="d-flex"><span class="text-truncate title"></span><span class="ext flex-shrink-0"></span></h6><p></p></div>
                                <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                            </div>
                        `;
        });
    } else {
        document.querySelectorAll("[data-selected=true]").forEach(ele => {
            let value = document.getElementById(input_field_id).value;
            let value_array = value == '' ? [] : value.split(',')
            value_array.push(ele.getAttribute('data-value'));
            let new_value = value_array.join(',');
            document.getElementById(input_field_id).value = new_value;
            document.getElementById('preview_'+input_field_id).innerHTML += `
                             <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                 <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                     <img src="/`+ele.getAttribute('data-preview')+`" class="img-fit">
                                 </div>
                                 <div class="col body"><h6 class="d-flex"><span class="text-truncate title"></span><span class="ext flex-shrink-0"></span></h6><p></p></div>
                                 <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                             </div>
                         `;
         });
    }
    closeFileselctor();
}



// 