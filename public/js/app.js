const COMMERCE_PLUS_TOKEN = localStorage.getItem('COMMERCE_PLUS_TOKEN');
const PAYSTACK_PUBLIC_KEY = 'pk_test_f2f63bc5ba861e1a3e55de8ea08352ac3dfac175';
function setAccessss () {
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

function trackOrder() {
    let ele = document.getElementById('track-code');
    let http = new XMLHttpRequest();
    http.open("GET", '/api/track-order/'+ele.value, true);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                document.getElementById('track-container').innerHTML = response.data.view;
            } else {
                console.log('failed to populate');
                let message = response.message;
                showAlert(message, 'alert-warning', response.data ?? []);
            }
        }
    }
    http.send();
}
function getLocalGovt(ele, child, is_hub = false) {
    let http = new XMLHttpRequest();
    if(is_hub){
        http.open("GET", '/api/get-state-lga/'+ele.value+'?is_hub=1', true);
    } else {
        http.open("GET", '/api/get-state-lga/'+ele.value, true);
    }

    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                if(child == 'town_list') {
                    document.getElementById('town_list').innerHTML = response.data.town_list;
                    $(".confirm-deletes").click(function (e) {
                        e.preventDefault();
                        var url = $(this).data("onclick");
                        console.log("url ",url);
                        $("#delete-modal").modal("show");
                        $("#delete-link").attr("onclick", url);
                    });
                } else {
                    document.getElementById(child).innerHTML = response.data.options;
                }
                
            } else {
                console.log('failed to populate');
            }
            //console.log("this.responseText", this.responseText);
        }
    }
    http.send();
}

function getStations(ele, child) {
    let http = new XMLHttpRequest();
    
    http.open("GET", '/api/get-stations/'+ele.value, true);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                if(child == 'town_list') {
                    document.getElementById('town_list').innerHTML = response.data.town_list;
                    $(".confirm-deletes").click(function (e) {
                        e.preventDefault();
                        var url = $(this).data("onclick");
                        console.log("url ",url);
                        $("#delete-modal").modal("show");
                        $("#delete-link").attr("onclick", url);
                    });
                } else {
                    document.getElementById(child).innerHTML = response.data.options;
                }
                
            } else {
                console.log('failed to populate');
            }
            //console.log("this.responseText", this.responseText);
        }
    }
    http.send();
}

function addLocalGovtToHub(ele, hub_id) {
    // let beforeRequest = document.getElementById('attached_lga_card').innerHTML;
    // document.getElementById('attached_lga_card').innerHTML =  `<div style="text-align:center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>`;
    let http = new XMLHttpRequest();
    http.open("GET", '/api/attach-lga-to-hub/'+hub_id+'/'+ele.value, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                document.getElementById('attached_lga_card').innerHTML = response.data.view;
                document.getElementById('lga_view_selector').innerHTML = response.data.options;
            } else {
                console.log('failed to populate');
            }
        }
    }
    http.send();
}

function detachLgaFromStation(local_govt_id, ele, hub_id){
    // let beforeRequest = document.getElementById('attached_lga_card').innerHTML;
    // document.getElementById('attached_lga_card').innerHTML =  `<div style="text-align:center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>`;
    let http = new XMLHttpRequest();
    http.open("GET", '/api/detach-lga-from-hub/'+hub_id+'/'+local_govt_id, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                document.getElementById('attached_lga_card').innerHTML = response.data.view;
                document.getElementById('lga_view_selector').innerHTML = response.data.options;
            } else {
                console.log('failed to populate');
            }
        }
    }
    http.send();
}

function saveOnForwardingRate(local_govt_id, ele) {
    let params = new FormData();
    let http = new XMLHttpRequest();
    let rate = document.getElementById('onforwarding_'+local_govt_id).value;
    params.append('rate', rate);
    http.open("POST", '/api/set-local-govt-on-forwarding/'+local_govt_id, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                let message = response.message;
                showAlert(message, 'alert-success');
            } else {
                let message = response.message;
                showAlert(message, 'alert-warning', response_.data ?? []);
            }
        }
    }
    http.send(params);
}

function addNewTown(town_id = null) {
    let params = new FormData();
    let town_name = null;
    if (town_id) {
        town_name = document.getElementById('town_name_input_'+town_id).value
    } else {
        town_name = document.getElementById('new_town').value
    }
    let state_select = document.getElementById('town_list_state');
    let state_id = state_select.value;
    
    params.append('name', town_name);
    params.append('state_id', state_id);
    
    let http = new XMLHttpRequest();
    if (town_id) {
        http.open("POST", '/api/add-town-name/'+town_id, true);
    } else {
        http.open("POST", '/api/add-town-name', true);
    }
    
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                let message = response.message;
                showAlert(message, 'alert-success');
                getLocalGovt(state_select, 'town_list');
                document.getElementById('new_town').value = null;
            } else {
                let message = response.message;
                showAlert(message, 'alert-warning', response_.data ?? []);
            }
        }
    }
    http.send(params);
}

function deleteTown(town_id) {
    let state_select = document.getElementById('town_list_state');
    let state_id = state_select.value;
    let http = new XMLHttpRequest();
    http.open("POST", '/api/delete-town/'+town_id, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this.responseText);
            if(http.status == 200) { 
                let message = response.message;
                showAlert(message, 'alert-success');
                getLocalGovt(state_select, 'town_list');
                $("#delete-modal").modal("hide");
            } else {
                let message = response.message;
                showAlert(message, 'alert-warning', response_.data ?? []);
                $("#delete-modal").modal("hide");
            }
        }
    }
    http.send();
    
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

function upload  (element, input_id) {
    console.log('got to this place');
    if(input_id == 'uploading_loader_page' || input_id == 'all_uploded_file') {
        document.getElementById('uploading_loader_page').innerHTML = `<i class="las la-spinner la-spin la-3x opacity-70"></i>`;
    }
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
                document.getElementById('uploading_loader_page').innerHTML = '';
                console.log("this.responseText", this.responseText);
                let value = document.getElementById(input_id)?.value ?? '';
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
                    case 'uploading_loader_page' :
                        window.location.href = '/seller/uploads';
                        break;
                    case 'all_uploded_file' :
                        let name_array = response?.data?.file_path.replace('uploads/', '');
                        name_array = name_array.split('.');

                        let previous_html = document.getElementById('all_uploded_file').innerHTML;
                        document.getElementById('all_uploded_file').innerHTML = `
                            <div class="aiz-file-box-wrap" data-value="`+response?.data?.id+`" data-preview="`+response?.data?.file_path+`" onclick="imagePicked(this)" aria-hidden="false" data-selected="false">
                                <div class="aiz-file-box">
                                    <div class="card card-file aiz-uploader-select" title="`+name_array[0]+`" data-value-last="`+response?.data?.id+`">
                                        <div class="card-file-thumb">
                                            <img src="/`+response?.data?.file_path+`" class="img-fit">
                                        </div>
                                        <div class="card-body">
                                            <h6 class="d-flex">
                                                <span class="text-truncate title">`+name_array[0]+`</span>
                                                <span class="ext flex-shrink-0">.`+name_array[1]+`</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.getElementById('all_uploded_file').innerHTML += previous_html;
                        document.querySelector("[href='#aiz-upload-new']").classList.remove('active');
                        document.getElementById('aiz-upload-new').classList.remove('active');
                        document.querySelector("[href='#aiz-select-file']").classList.add('active');
                        document.getElementById('aiz-select-file').classList.add('active');

                        break;
                
                    default:
                        break;
                }
                
            }
        }
    }
    http.send(params);

}

function importData (element, button_id) {
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

function toggleProductColumn (element, column)  {
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

function getCurrentLocation () {
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
    console.log("url "+url);
    if(COMMERCE_PLUS_TOKEN) {
        console.log("url "+url);
        console.log("COMMERCE_PLUS_TOKEN "+COMMERCE_PLUS_TOKEN);
        http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    }
    let cfr = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //http.setRequestHeader("X-CSRF-TOKEN", cfr);
    http.setRequestHeader("Content-type", "application/json;");
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
                    case 'reg-button':
                        window.location.href = '/login';
                        break;
                    case 'edit-shop-details-button':
                    case 'edit-shop-location-button':
                    case 'edit-shop-banner-button':
                    case 'edit-shop-socials-button':
                        window.location.href = '/seller/shop';
                        break;
                    case 'create-product-button':
                        window.location.href = '/seller/products';
                        break;
                    case 'withdrawal-request-button':
                        window.location.href = '/seller/money-withdraw-requests';
                        break;
                    case 'create-delivery-boy-button': 
                    case 'update-delivery-boy-button':
                        window.location.href = '/admin/delivery-boys';
                        break;
                    case 'update-delivery-boy-button-d':
                        window.location.href = '/delivery/dashboard';
                        break;
                    case 'add-user-customer':
                        window.location.href = '/checkout';
                        break;
                    case 'add-category':
                        window.location.href = '/admin/categories';
                        break;
                    case 'add-brand':
                        window.location.href = '/admin/brands';
                        break;
                    case 'add-hub':
                        window.location.href = '/admin/hub';
                        break;
                    case 'edit-customer-address' :
                    case 'add-user-customer' :
                        window.location.href = '/checkout'
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

function sortOrders(element) {
    let params = new FormData(element);

    var object = {};
    params.forEach((val, key, parent) => {
        object[key] = val;
    })
    $.post({
        url: '/api/list-all-orders',
        headers: {
            'Authorization': "Bearer "+COMMERCE_PLUS_TOKEN
        }
    }, object, function(data){
        if(data == '0'){
            console.log("nothing here");
        }
        else{
            console.log('got to this place');
            document.getElementById('order-list').innerHTML = data;
            //$('#order-list').html(data);
        }
    });
    // let http_f = new XMLHttpRequest();
    
    // http_f.open("POST", '/api/list-all-orders', true);
    // http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    // http_f.onreadystatechange = function() {
    //     if(http_f.readyState == 4) {
    //         if(http_f.status == 200) {
    //             console.log('http_f',http_f);
    //             document.getElementById('order-list').innerHTML(this.responseText);
    //         }
    //     }
    // }
    // http_f.send(params);
    
    return false;
}

function logout () {
    localStorage.removeItem('COMMERCE_PLUS_TOKEN');
    let http_f = new XMLHttpRequest();
    http_f.open("GET", '/api/logout', true);
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

// function showAlert(message, type, data = []) {
//     let modal_type = type.replace('alert_', '');
//     // document.getElementById('alert-modal').innerText = message;
//     // document.getElementById('alert-modal').classList.replace('hide', type);
//     if(message = 'Validation Error.'){
//         const propertyNames = Object.keys(data);
//         const propertyValues = Object.values(data);
//         propertyNames.forEach((element, index) => {
//             let val_span = document.getElementById('validate-'+element);
//             if(val_span) {
//                 val_span.innerText = propertyValues[index][0];
//             } else {
//                 //document.getElementById('alert-modal').innerText += propertyValues[index][0];
//                 AIZ.plugins.notify(modal_type, propertyValues[index][0]);
//             }
            
//         });
//     } else {
//         AIZ.plugins.notify(modal_type, message);
//     }
//     // setTimeout(() => {
//     //     document.getElementById('alert-modal').classList.replace(type, 'hide');
//     // },3000);

// }


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

function switchStore  (store_id, url = null)  {
    if(url == null)
    expandStoreList();
    let http_f = new XMLHttpRequest();
    http_f.open("GET", '/api/switch-store?id='+store_id, true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            if(http_f.status == 200) {
                sessionStorage.removeItem('COMMERCE_PLUS_SESSION');
                window.location.href = url ?? '/seller/dashboard';
            }
        }
    }
    http_f.send();

}


function payWithPaystack(order_amount = null, cart = null) {
  //e.preventDefault();

  let handler = PaystackPop.setup({
    key: PAYSTACK_PUBLIC_KEY, // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: (order_amount ?? document.getElementById("amount").value) * 100 ,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
        showAlert('window closed', 'alert-warning', []);
    },
    callback: function(response){
      //let message = 'Payment complete! Reference: ' + response.reference;
      //alert(message);
      console.log("response ",response);
      if(order_amount) {
        submitOrder('card' ,cart, response.reference);
      } else {
        subscribeStore(response.reference, 'paystack');
      }
    }
  });

  handler.openIframe();
}

function rechargeWallet(recharge_amount, email_address) {
    let handler = PaystackPop.setup({
        key: PAYSTACK_PUBLIC_KEY, // Replace with your public key
        email: email_address,
        amount: recharge_amount * 100 ,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        onClose: function(){
            showAlert('window closed', 'alert-warning', []);
        },
        callback: function(response){
            let params = new FormData();
            params.append('amount', recharge_amount);
            params.append('payment_reference', response.reference);

            let http_f = new XMLHttpRequest();
            http_f.open("POST", '/api/recharge-wallet', true);
            http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
            http_f.onreadystatechange = function() {
                if(http_f.readyState == 4) {
                    let response = JSON.parse(this?.responseText);
                    if(http_f.status == 200) {
                        showAlert(response.message, 'alert-success');
                        window.location.href = '/dashboard';
                    } else {
                        showAlert(response.message, 'alert-warning', []);
                    }
                }
            }
            http_f.send(params);
        }
      });
    
      handler.openIframe();

      return false;
}

function updateProfile(element) {
    let params = new FormData(element);
    let http_f = new XMLHttpRequest();
    // params.forEach((val, key) => {
    //     console.log("form ",key, val);
    // });
    http_f.open("POST", '/api/update_user', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                showAlert(response.message, 'alert-success');
                window.location.href = '/profile';
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}

function submitOrder(paymentType, cart, paymentReference = null) {
    console.log('payment_type ', paymentType);
    // console.log('paymentReference ', paymentReference);
    // let payload = sessionStorage.getItem('COMMERCE_PLUS_ORDER_PAYLOAD');
    // console.log('payload payload payload ',payload);
    // let data = payload.split(';;;');
    // let customer = null;
    // let delivery_type = null;
    // console.log('cart-- ',cart)
    // if(!(cart[0].is_digital)) {
    //     customer = JSON.parse(data[1]);
    //     delivery_type = JSON.parse(data[2]);
    //     console.log('delivery_type ',delivery_type);
    // }
    // console.log('out side here delivery_type ',delivery_type);
    
    let params = new FormData();
    params.append('order_type', paymentType);
    if(paymentReference) {
        params.append('payment_refrence', paymentReference);
    }
    //params.append('all_cart_items', JSON.stringify(cart));
    // if(customer?.id){
    //     params.append('customer_id', customer.id);
    // }
    // if(delivery_type?.shipping_type) {
    //     params.append('delivery_type', delivery_type.shipping_type);
    // }
    // params.append('cart_type', cart[0].is_digital ? 'digital' : 'physical');
    // if(delivery_type && delivery_type?.shipping_type != 'home_delivery') {
    //     params.append('pick_point_id', delivery_type.address);
    // }
   
    let http_f = new XMLHttpRequest();
    http_f.open("POST", '/api/submit-order', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    //http_f.setRequestHeader("Content-type", "application/json;");
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                showAlert(response.message, 'alert-success');
                sessionStorage.removeItem('COMMERCE_PLUS_SESSION');
                sessionStorage.removeItem('COMMERCE_PLUS_ORDER_PAYLOAD');
                localStorage.removeItem('COMMERCE_PLUS_CART');
                window.location.href = '/checkout/order-confirmed';
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
   http_f.send(params);


    return false;
}

function pickPaymentType(formElement) {
    let http_f = new XMLHttpRequest();
    http_f.open("POST", '/api/validate-cart', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.setRequestHeader("Content-type", "application/json;");
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                let params = new FormData(formElement);
                var object = {};
                params.forEach((val, key) => {
                    console.log("form ",key, val);
                    object[key] = val;
                });
                let cart_sub_total = response.data.subtotal;
                let cart = response.data.cart;
                switch (object.payment_option) {
                    case "paystack":
                        payWithPaystack(cart_sub_total, cart);
                        break;
                    case "cod":
                        submitOrder('cod' ,cart);
                        break;
                    case "wallet":
                    submitOrder('wallet' ,cart);
                        break;
                
                    default:
                        break;
                }
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    let param = new FormData(formElement);
    let payload_ = {};
    payload_['payment_type'] = param.get('payment_option');

    http_f.send(JSON.stringify(payload_));






    // let params = new FormData(formElement);
    // var object = {};
    // params.forEach((val, key) => {
    //     console.log("form ",key, val);
    //     object[key] = val;
    // });
    // switch (object.payment_option) {
    //     case "paystack":
    //         payWithPaystack(cart_sub_total, cart);
    //         break;
    //     case "cod":
    //         submitOrder('cod' ,cart);
    //         break;
    //     case "wallet":
    //     submitOrder('wallet' ,cart);
    //         break;
    
    //     default:
    //         break;
    // }






//     let payload = sessionStorage.getItem('COMMERCE_PLUS_ORDER_PAYLOAD');
//     if(payload == null) {
//         //
//         showAlert("No order in progress please try again", 'alert-warning', []);
//        return false
//     }
//     let data = payload.split(';;;');
//     let products = JSON.parse(data[0]);
//     let customer = null;
//     let delivery_type = null;
//     if (!(products[0].is_digital)) {
//         customer = JSON.parse(data[1]);
//         delivery_type = JSON.parse(data[2]);
//     }
//  //    const cart = product => element => product == 'quantity_added' && element[product] == undefined ? 1 : element[product];
//     let payload_ = {};
//     const carts = () => element => {
//      let object= {}; 
//      object['product_id'] = element['id'];
//      object['price'] = element['new_price'] ?? element['price'];
//      object['quantity_added'] = element['quantity_added'] == undefined ? 1 : element['quantity_added'];
//      object['is_digital'] = element['is_digital'];
//      return object;
//     }
//     //product == 'quantity_added' && element[product] == undefined ? 1 : element[product];
//  //    let cart_items = products.map(cart('id'));
//  //    let cart_items_quantity = products.map(cart('quantity_added'));
//     let all_cart_items = products.map(carts());
//     let param = new FormData(formElement);

//     payload_['customer_id'] = customer?.id;
//     payload_['all_cart_items'] = all_cart_items;
//     payload_['payment_type'] = param.get('payment_option');
//     payload_['cart_type'] = products[0].is_digital ? 'digital' : 'physical';

//     let http_f = new XMLHttpRequest();
//     http_f.open("POST", '/api/validate-cart', true);
//     http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
//     http_f.setRequestHeader("Content-type", "application/json;");
//     http_f.onreadystatechange = function() {
//         if(http_f.readyState == 4) {
//             let response = JSON.parse(this?.responseText);
//             if(http_f.status == 200) {
//                 let params = new FormData(formElement);
//                 var object = {};
//                 params.forEach((val, key) => {
//                     console.log("form ",key, val);
//                     object[key] = val;
//                 });
//                 let cart_sub_total = response.data.subtotal;
//                 let cart = response.data.cart;
//                 switch (object.payment_option) {
//                     case "paystack":
//                         payWithPaystack(cart_sub_total, cart);
//                         break;
//                     case "cod":
//                         submitOrder('cod' ,cart);
//                         break;
//                     case "wallet":
//                     submitOrder('wallet' ,cart);
//                         break;
                
//                     default:
//                         break;
//                 }
//             } else {
//                 showAlert(response.message, 'alert-warning', []);
//             }
//         }
//     }
//     http_f.send(JSON.stringify(payload_));


    return false;
}

function subscribeStore (paymentReference, paymentType) {
    console.log('got here 0 ',paymentReference);
    let package_id = document.getElementById('package_id').value;
    let store_id = document.getElementById('store_id').value;
    let params = new FormData();
    params.append('package_id', package_id);
    params.append('store_id', store_id);
    params.append('payment_type', paymentType);
    params.append('reference', paymentReference);
    let http_f = new XMLHttpRequest();
    http_f.open("POST", '/api/subscribe', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    console.log('got here too ',COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                showAlert(response.message, 'alert-success');
                window.location.href = '/seller/dashboard';
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}
























//  file selector js


function openFileModal  (element, inputFieldId)  {
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

function clearSelected () {
    document.querySelectorAll("[data-selected=true]").forEach(ele => {
        ele.setAttribute('data-selected', 'false');
    })
    document.getElementById('file-select-counter').innerText =  document.querySelectorAll("[data-selected=true]").length;
}

function selectAlreadyPicked (input_field_id) {
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

function closeFileselctor () {
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

function imagePicked (element) {
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

function addSelectedFiles () {
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

function selectAllFile (element) {
    let checked = element.checked;
    if (checked) {
        document.querySelectorAll("[type='checkbox']").forEach(e => {
            e.setAttribute('checked', '');
            e.setAttribute('data-checked', 'true');
        })
    } else {
        document.querySelectorAll("[type='checkbox']").forEach(e => {
            e.removeAttribute('checked');
            e.removeAttribute('data-checked');
        })
    }
    checkOne();
}

function checkOne (element = null) {
    let ids_array = [];
    if(element) {
        if(element.getAttribute('data-checked') == 'true') {
            element.removeAttribute('data-checked');
        } else {
            element.setAttribute('data-checked', 'true');
        }
    }

    document.querySelectorAll("[data-checked='true']").forEach(ele => {
        if(ele.getAttribute('class') == 'check-one') {
            ids_array.push(ele.value); 
        }
    });
    console.log('ids_array',ids_array);
    let id_string = ids_array.join(',');
    document.getElementById('bulk-delete-button').setAttribute('data-href', "/seller/uploads/delete-multiple?ids="+id_string );
}

function copyUrl (element) {
    navigator.clipboard.writeText(element.getAttribute('data-url'));
}
function addToWishListV2 (product_id, ele = null) {
    if(COMMERCE_PLUS_TOKEN) {
        let params = new FormData()
        params.append('product_id', product_id);
        let http_f = new XMLHttpRequest();
        http_f.open("POST", '/api/save-item', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
        http_f.onreadystatechange = function() {
            if(http_f.readyState == 4) {
                let response = JSON.parse(this?.responseText);
                if(http_f.status == 200) {
                    if(ele) {
                        ele.remove();
                    } else {
                        showAlert(response.message, 'alert-success');
                    }
                    
                    document.getElementById('wishlist-count-top').innerText = response.data.length
                } else {
                    showAlert(response.message, 'alert-warning', []);
                }
            }
        }
        http_f.send(params);
    } else {
        showAlert("You have be logged in add product to wish list", 'alert-warning', []);
    }
}

function viewMyCart(page = window.location.pathname == '/cart') {
    console.log("got to viewMyCart");
    let session_string = sessionStorage.getItem('COMMERCE_PLUS_SESSION');
   
    let params = new FormData()
    let http_f = new XMLHttpRequest();
    if(COMMERCE_PLUS_TOKEN && window.location.pathname != '/seller/pos') {
        http_f.open("POST", '/api/view-cart', true);
        params.append('is_web', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    } else if(session_string) {
        http_f.open("POST", '/api/view-cart-items/'+session_string, true);
        params.append('is_web', session_string);
    }
    if(page){
        document.getElementById('cart-list-on-page').innerHTML =  `<div style="text-align:center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>`;
    }
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                if(page){
                    document.getElementById('cart-list-on-page').innerHTML = response.data.items.length > 0 ? response.data.page : `<i class="las la-frown la-3x opacity-60 mb-3"></i>
                    <h3 class="h6 fw-700">Your Cart is empty</h3>`;
                    document.getElementById('cart-list-page-subtotal').innerText = response.data.total_price
                }
                if(window.location.pathname == '/seller/pos') {
                    document.getElementById('cart-details').innerHTML = response.data.pos_cart;
                    document.getElementById('order-confirmation').innerHTML = response.data.pos_order_cart;
                }
                if(window.location.pathname == '/checkout/delivery_info'){
                    let http_f = new XMLHttpRequest();
                    http_f.open("GET", '/api/set-pick-up-station-id', true);
                    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
                    http_f.onreadystatechange = function() {
                        if(http_f.readyState == 4) {
                            if(http_f.status == 200) {
                                console.log("user fetched", this.responseText);
                            }
                        }
                    }
                    http_f.send();
                    document.getElementById('checkout-point-product-list').innerHTML = response.data.product_list;
                }
                if(window.location.pathname == '/checkout/payment_select')
                {
                    document.getElementById('payment-cart-list-card').innerHTML = response.data.payment_cart_list;

                    document.getElementById('payment-cart-card-count').innerText = response.data.items.length;
                    document.getElementById('sub_total').value = response.data.total_price;
                    document.getElementById('cart-subtotal-card').innerText = '₦'+response.data.total_price;
                    document.getElementById('cart-tax-card').innerText = '₦'+(0.00);
                    document.getElementById('cart-total-shipping-card').innerText = '₦'+(response.data.shipping ?? 0.00);
                    document.getElementById('cart-total-card').innerText = '₦'+((response.data.total_amount) ?? 0.00);
                }
                if(response.data.items.length == 0 && (window.location.pathname == '/checkout' || window.location.pathname == '/checkout/delivery_info' || window.location.pathname == '/checkout/payment_select'))
                {
                    window.location.href = '/';
                }
                document.getElementById('cart-list-top').innerHTML = response.data.items.length > 0 ? response.data.view : `<i class="las la-frown la-3x opacity-60 mb-3"></i>
                <h3 class="h6 fw-700">Your Cart is empty</h3>`;
                document.getElementById('cart-count-top').innerText = response.data.items.length
                document.getElementById('cart-count-bottom').innerText = response.data.items.length
            } else {
                //showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}

function addToCartV2 (product_id, type = 'online', quantity = null) {
    let session_string = sessionStorage.getItem('COMMERCE_PLUS_SESSION');
    let params = new FormData()
    if(quantity){
        if(isNaN(quantity))
        {
            return showAlert("Quantity have to be a number", 'alert-warning', []);
        }

        params.append('quantity', quantity);
    }
    params.append('product_id', product_id);
    let http_f = new XMLHttpRequest();
    params.append('cart_type', type);
    if(COMMERCE_PLUS_TOKEN && type == 'online') {
        http_f.open("POST", '/api/add-to-cart', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    } else {
        http_f.open("POST", '/api/add-item-to-cart', true);
        if(session_string) {
            params.append('session', session_string);
        } else {
            let time_ = Date.now();
            session_string = Math.random().toString(36).slice(2)+""+time_;
            sessionStorage.setItem('COMMERCE_PLUS_SESSION', session_string);
            params.append('session', session_string);
        }
    }
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                    showAlert(response.message, 'alert-success');
                    viewMyCart();
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}

function removeFromCartV2 (product_id, type = 'online', entire = false){
    let session_string = sessionStorage.getItem('COMMERCE_PLUS_SESSION');
    let params = new FormData()
    params.append('product_id', product_id);
    if(entire){
        params.append('remove', true); 
    }
    let http_f = new XMLHttpRequest();
    if(COMMERCE_PLUS_TOKEN && type == 'online') {
        http_f.open("POST", '/api/remove-from-cart', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    } else {
        http_f.open("POST", '/api/remove-item-from-cart/'+session_string, true);
    }
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                    showAlert(response.message, 'alert-success');
                    viewMyCart();
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}

function saveConnectRate(id, ele, double = false) {
    let params = new FormData();
    ele.innerHTML =  `<div style="text-align:center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>`;
    let value = document.getElementById('connect_rate_'+id).value;
    let from_id = ele.getAttribute('from-id')
    params.append('rate', value);
    params.append('from', from_id);
    params.append('to', id);
    if(double) {
        params.append('double', double);
    }
    let http_f = new XMLHttpRequest();
    http_f.open("POST", '/api/save-connect-rate', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                    showAlert(response.message, 'alert-success');
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
            ele.innerHTML = double ?`Save Both` : `Save`;
        }
    }
    http_f.send(params);
}

function addToCart(product_, ele = null, type = 'pos', buynow = false){
    let new_add = null;
    let cart_storage = null;
    let cart = null;
    
    if (isNaN(product_)) {
        cart_storage = type == 'pos' ? 'COMMERCE_PLUS_CART_'+product_.store_id : 'COMMERCE_PLUS_CART';
        cart = localStorage.getItem(cart_storage) ?? '[]';
        cart = JSON.parse(cart);
        new_add = cart.find(item => item.id == product_.id)
    } else {
        let store_id = document.getElementById('pos-cart-store-id')?.value;
        cart_storage = type == 'pos' ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
        cart = localStorage.getItem(cart_storage) ?? '[]';
        cart = JSON.parse(cart);
        new_add = cart.find(item => item.id == product_);
    }
    if(new_add) {
        let cart_quantity = ele?.value || (parseInt((new_add.quantity_added ?? '1')) + 1);
        if(cart_quantity <= new_add.quantity) {
            new_add.quantity_added = cart_quantity;
            let index_of_new_add = cart.findIndex(item => item.id == new_add.id)
            cart[index_of_new_add] = new_add
            showAlert("Item quantity Increased sucessfully", 'alert-success', []);
        } else {
            if(ele){
                ele.value =  new_add.quantity;
            }
            showAlert("Opps!! . you cant add more than the number of products in stock", 'alert-warning', []);
        }
        
    } else {
        let product = PRODUCT || PRODUCTS[PRODUCTS.findIndex(item => item.id == product_)];//JSON.parse(((((((ele.getAttribute('data-value').replaceAll(`{'`, `{"`)).replaceAll(`}'`, `}"`)).replaceAll(`,'`, `,"`)).replaceAll(`',`, `",`)).replaceAll(`:'`, `:"`)).replaceAll(`':`, `":`)).replaceAll(`'}`, `"}`));
        if(cart.length == 0 || (cart.length > 0 && cart[0].is_digital == product.is_digital)) {
            cart.push(product);
            showAlert("Product added to cart sucessfully", 'alert-success', []);
        } else {
            showAlert("Opps!! . you cant add "+(product.is_digital ? 'digital items to physical item carts' : 'physical items to digital item carts')+" item ", 'alert-warning', []);
            return false;
        }
        
    }

    localStorage.setItem(cart_storage, JSON.stringify(cart));
    if(type == 'pos'){
        let store_id = document.getElementById('pos-cart-store-id')?.value;
        populateCartDetails(store_id ?? new_add?.store_id);
    } else if(type == 'cart') {
        populateCartPage();
    } else {
        populateCartCount();
    }
    sessionStorage.removeItem('COMMERCE_PLUS_ORDER_PAYLOAD');
    if(buynow) {
        window.location.href = '/checkout';
    }
}

function populateCartCount() 
{
    let cart_storage = 'COMMERCE_PLUS_CART';
    let cart = localStorage.getItem(cart_storage) ?? '[]';
    let cartItems = JSON.parse(cart);
    document.getElementById('cart-count-top').innerText = cartItems.length;
    document.getElementById('cart-count-bottom').innerText = cartItems.length;
    // document.getElementsByClassName('cart-count').forEach(item => {
    //     item.innerText = cartItems.length;
    // })

    
    let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
    document.getElementById('cart-list-top').innerHTML = `
    <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
    `+(cartItems?.length > 0 ? '<ul id="cart-item-list-top" class="list-group list-group-flush"></ul>' : '<div class="text-center"><i class="las la-frown la-3x opacity-50"></i><p>No Product Added</p></div>')+`
    </div>
    `+(cartItems?.length > 0 ? `
    <div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Sub Total</span>
                <span>₦`+cart_total+`</span>
            </div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Tax</span>
                <span>₦0.000</span>
            </div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Shipping</span>
                <span>₦0.000</span>
            </div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Discount</span>
                <span>₦0.000</span>
            </div>
            <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
                <span>Total</span>
                <span>₦`+cart_total+`</span>
            </div>
            <div class="py-3 text-center border-top mx-4" style="border-color: #e5e5e5 !important;">
                <div class="row gutters-10 justify-content-center">
                    <div class="col-sm-6 mb-2">
                        <a href="/cart" class="btn btn-warning btn-sm btn-block rounded-4 text-white">
                            View cart
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/checkout" class="btn btn-primary btn-sm btn-block rounded-4">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>` : ``);
    cartItems.forEach(item => {
        document.getElementById('cart-item-list-top').innerHTML += `
            <li class="list-group-item py-0 pl-2">
                <div class="row gutters-5 align-items-center">
                    <div class="col-auto w-60px">
                        <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                            <button onClick="addToCart(`+item.id+`, this, 'online')" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="plus" data-field="qty-0">
                                <i class="las la-plus"></i>
                            </button>
                            <input type="number" name="qty-0" id="qty-0" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="`+(item.quantity_added ?? 1) +`" min="`+item.min_quantity+`" max="`+item.quantity+`" onchange="addToCart(`+item.id+`, this, 'online')">
                            <button onClick="removeFromCartTwo(`+item.id+`, null, false, 'online')" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="minus" data-field="qty-0">
                                <i class="las la-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-truncate-2">`+item.name+`</div>
                        <span class="span badge badge-inline fs-12 badge-soft-secondary"></span>
                    </div>
                    <div class="col-auto">
                        <div class="fs-12 opacity-60">₦`+(item.new_price || item.price)+` x `+(item.quantity_added ?? 1)+`</div>
                        <div class="fs-15 fw-600">₦`+((item.new_price || item.price) * (item.quantity_added ?? 1))+`</div>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-circle btn-icon btn-sm btn-soft-danger ml-2 mr-0" onclick="removeFromCartTwo(`+item.id+`, `+item.store_id+`, true, 'online')">
                            <i class="las la-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </li>
        `;

    });
    console.log('ending called populateCartCount');
}
function populateCartPage() {
    console.log('called populateCartPage');
if(window.location.pathname == '/cart')
{
    let cart_storage = 'COMMERCE_PLUS_CART';
    let cart = localStorage.getItem(cart_storage) ?? '[]';
    let cartItems = JSON.parse(cart);
    let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;


    document.getElementById('cart-count-top').innerText = cartItems.length;
    document.getElementById('cart-list-page-subtotal').innerText = '₦'+cart_total;
    document.getElementById('cart-list-on-page').innerHTML = '';
    cartItems.forEach(item => {
        document.getElementById('cart-list-on-page').innerHTML += `
        <li class="list-group-item px-0">
            <div class="row gutters-5 align-items-center">
                <!-- Quantity -->
                <div class="col-md-1 col order-1 order-md-0">
                        <div class="d-flex flex-column align-items-start aiz-plus-minus mr-2 ml-0">
                            <button
                                onClick="addToCart(`+item.id+`, this, 'cart')"
                                class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                type="button" data-type="plus"
                                data-field="quantity[`+item.qty+`]">
                                <i class="las la-plus"></i>
                            </button>
                            <input type="number"
                                class="col border-0 text-left px-0 flex-grow-1 fs-14 input-number"
                                placeholder="1" value="`+item.quantity_added+`"
                                min="1"
                                onchange="addToCart(`+item.id+`, this, 'cart')" style="padding-left:0.75rem !important;">
                            <button
                                onClick="removeFromCartTwo(`+item.id+`, null, false, 'cart')"
                                class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                type="button" data-type="minus"
                                data-field="quantity[`+item.qty+`]">
                                <i class="las la-minus"></i>
                            </button>
                        </div>
                                                            </div>
                <!-- Product Image & name -->
                <div class="col-md-5 d-flex align-items-center mb-2 mb-md-0">
                    <span class="mr-2 ml-0">
                        <img src="`+item.thumbnail_img+`"
                            class="img-fit size-70px"
                            alt="Adobe Premiere Elements 2022 | PC/Mac Disc"
                            onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                    </span>
                    <span class="fs-14">Adobe Premiere Elements 2022 | PC/Mac Disc</span>
                </div>
                <!-- Price -->
                <div class="col-md col-4 order-2 order-md-0 my-3 my-md-0">
                    <span class="opacity-60 fs-12 d-block d-md-none">Price</span>
                    <span class="fw-700 fs-14">₦`+item.price+`</span>
                </div>
                <!-- Tax -->
                <div class="col-md col-4 order-3 order-md-0 my-3 my-md-0">
                    <span class="opacity-60 fs-12 d-block d-md-none">Tax</span>
                    <span class="fw-700 fs-14">₦`+item.tax+`</span>
                </div>
                <!-- Total -->
                <div class="col-md col-5 order-4 order-md-0 my-3 my-md-0">
                    <span class="opacity-60 fs-12 d-block d-md-none">Total</span>
                    <span class="fw-700 fs-16 text-primary">₦`+(item.tax + item.price)+`</span>
                </div>
                <!-- Remove From Cart -->
                <div class="col-md-auto col-6 order-5 order-md-0 text-right">
                    <a href="javascript:void(0)" onClick="removeFromCartTwo(`+item.id+`, null, true, 'cart')" class="btn btn-icon btn-sm btn-soft-primary bg-soft-warning hov-bg-primary btn-circle">
                        <i class="las la-trash fs-16"></i>
                    </a>
                </div>
            </div>
        </li>
        `;
    });
}
    populateCartCount();
    document.getElementById('cart-count-bottom').innerText = cartItems.length;
}

function removeFromCartTwo (product_id, store_id = null, del = false, type = 'pos'){
    console.log("got here");
    let cart_storage = type == 'pos' ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
    let cart = localStorage.getItem(cart_storage) ?? '[]';
    cart = JSON.parse(cart);
    let new_add = cart.find(item => item.id == product_id)
    if(!del && new_add?.quantity_added && new_add?.quantity_added > 1) {
        new_add.quantity_added = parseInt(new_add.quantity_added) - 1;
        let index_of_new_add = cart.findIndex(item => item.id == product_id)
        cart[index_of_new_add] = new_add
    } else if(new_add) {
        let index_of_new_add = cart.findIndex(item => item.id == product_id)
        cart.splice(index_of_new_add, 1);
    }
    localStorage.setItem(cart_storage, JSON.stringify(cart));
    if(type == 'pos'){
        populateCartDetails(store_id);
    } else if(type == 'cart') {
        populateCartPage();
    } else {
        populateCartCount();
    }
    sessionStorage.removeItem('COMMERCE_PLUS_ORDER_PAYLOAD');
}

// function populateCartDetails(store_id = null) {
//     let cart_storage = store_id ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
//     let cartItems = JSON.parse(localStorage.getItem(cart_storage));
//     let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
//     document.getElementById('cart-details').innerHTML = `
//     <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
//     `+(cartItems?.length > 0 ? '<ul id="cart-item-list" class="list-group list-group-flush"></ul>' : '<div class="text-center"><i class="las la-frown la-3x opacity-50"></i><p>No Product Added</p></div>')+`
       
        
//     </div>
//     <div>
//             <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
//                 <span>Sub Total</span>
//                 <span>₦`+cart_total+`</span>
//             </div>
//             <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
//                 <span>Tax</span>
//                 <span>₦0.000</span>
//             </div>
//             <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
//                 <span>Shipping</span>
//                 <span>₦0.000</span>
//             </div>
//             <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
//                 <span>Discount</span>
//                 <span>₦0.000</span>
//             </div>
//             <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
//                 <span>Total</span>
//                 <span>₦`+cart_total+`</span>
//             </div>
//         </div>
//     `;
//     cartItems.forEach(item => {
//         document.getElementById('cart-item-list').innerHTML += `
//             <li class="list-group-item py-0 pl-2">
//                 <div class="row gutters-5 align-items-center">
//                     <div class="col-auto w-60px">
//                         <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
//                             <button onClick='addToCart(`+JSON.stringify(item)+`)' class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="plus" data-field="qty-0">
//                                 <i class="las la-plus"></i>
//                             </button>
//                             <input type="number" name="qty-0" id="qty-0" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="`+(item.quantity_added ?? 1) +`" min="`+item.min_quantity+`" max="`+item.quantity+`" onchange='addToCart(`+JSON.stringify(item)+`, this)'>
//                             <button onClick="removeFromCartTwo(`+item.id+`, `+item.store_id+`)" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="minus" data-field="qty-0">
//                                 <i class="las la-minus"></i>
//                             </button>
//                         </div>
//                     </div>
//                     <div class="col">
//                         <div class="text-truncate-2">`+item.name+`</div>
//                         <span class="span badge badge-inline fs-12 badge-soft-secondary"></span>
//                     </div>
//                     <div class="col-auto">
//                         <div class="fs-12 opacity-60">₦`+(item.new_price || item.price)+` x `+(item.quantity_added ?? 1)+`</div>
//                         <div class="fs-15 fw-600">₦`+((item.new_price || item.price) * (item.quantity_added ?? 1))+`</div>
//                     </div>
//                     <div class="col-auto">
//                         <button type="button" class="btn btn-circle btn-icon btn-sm btn-soft-danger ml-2 mr-0" onclick="removeFromCartTwo(`+item.id+`, `+item.store_id+`, true)">
//                             <i class="las la-trash-alt"></i>
//                         </button>
//                     </div>
//                 </div>
//             </li>
//         `;

//     })
// }

function orderConfirmationList(ele_id, store_id) {
    let cart_storage = store_id ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
    cart_storage = localStorage.getItem(cart_storage);
    let cartItems = JSON.parse(cart_storage);
    let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
    document.getElementById(ele_id).innerHTML = `
    <div class="row">
        <div class="col-xl-6">
            <ul id="o_confirmation_list" class="list-group list-group-flush">
                
            </ul>
        </div>
        <div class="col-xl-6">
            <div class="pl-xl-4">
                <div class="card mb-4">
                    <div class="card-header"><span class="fs-16">Customer Info</span></div>
                    <div id="customer-info-card" class="card-body">
                        <div class="text-center p-4">
                            No customer information selected.
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                    <span>Total</span>
                    <span>₦`+cart_total+`</span>
                </div>
                <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                    <span>Tax</span>
                    <span>₦0.000</span>
                </div>
                <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                    <span>Shipping</span>
                    <span>₦0.000</span>
                </div>
                <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                    <span>Discount</span>
                    <span>₦0.000</span>
                </div>
                <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
                    <span>Total</span>
                    <span>₦`+cart_total+`</span>
                </div>
            </div>
        </div>
    </div>
    `;
    let customer_address_string = document.getElementById('add_new_address_button').getAttribute('data-customer');
    if (customer_address_string !== '' && cart_storage !== '') {
        let customer = JSON.parse(customer_address_string);
        document.getElementById('customer-info-card').innerHTML = ``;
        document.getElementById('customer-info-card').innerHTML += `
            <div class="d-flex justify-content-between  mb-2">
                <span class="">Name:</span>
                <span class="fw-600">`+customer.customer_name+`</span>
            </div>
        `;
        document.getElementById('customer-info-card').innerHTML += `
            <div class="d-flex justify-content-between  mb-2">
                <span class="">Phone:</span>
                <span class="fw-600">`+customer.phone+`</span>
            </div>
        `;
        document.getElementById('customer-info-card').innerHTML += `
            <div class="d-flex justify-content-between  mb-2">
                <span class="">Address:</span>
                <span class="fw-600">`+customer.address+`</span>
            </div>
        `;
        document.getElementById('customer-info-card').innerHTML += `
            <div class="d-flex justify-content-between  mb-2">
                <span class="">State:</span>
                <span class="fw-600">`+customer.state.name+`</span>
            </div>
        `;
        sessionStorage.setItem('COMMERCE_PLUS_POS_ORDER_PAYLOAD', cart_storage+';;;'+customer_address_string);
    } else {
        sessionStorage.removeItem('COMMERCE_PLUS_POS_ORDER_PAYLOAD');
    }
    //setAttribute('data-customer', element.value);

    cartItems.forEach(item => {
        document.getElementById('o_confirmation_list').innerHTML += `
        <li class="list-group-item px-0">
                <div class="row gutters-10 align-items-center">
                    <div class="col">
                        <div class="d-flex">
                            <img src="/`+item.thumbnail_img+`" class="img-fit size-60px">
                            <span class="flex-grow-1 ml-3 mr-0">
                                <div class="text-truncate-2">`+item.name+`</div>
                                <span class="span badge badge-inline fs-12 badge-soft-secondary"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="fs-14 fw-600 text-right">₦`+(item.new_price || item.price)+`</div>
                        <div class="fs-14 text-right">Qty: `+(item.quantity_added ?? 1)+`</div>
                    </div>
                </div>
            </li>
        `;
    });
    
}

function addCustomer() {
    let params = new FormData();
    let state_local_govt  = document.getElementById('customer_state_id').value;
    if(state_local_govt == null){
        showAlert("Town field is required", 'alert-warning', []);
    }
    let state_id = null;
    let lga_id = null;
    if(isNaN(state_local_govt)) {
        state_id = state_local_govt.split('_')[0];
        lga_id = state_local_govt.split('_')[1]
    }
    let customer_id = document.getElementById('customer_id').value;
    let customer_name = document.getElementById('customer_name').value;
    let customer_address = document.getElementById('customer_address').value;
    let customer_state_id = state_id ?? document.getElementById('customer_state_id').value;
    let customer_lga_id = lga_id;
    let customer_phone = document.getElementById('customer_phone').value;
    let store_id = document.getElementById('customer_store_id').value;
 

    params.append('customer_id',  customer_id);
    params.append('customer_name',  customer_name);
    params.append('address',  customer_address);
    params.append('store_id', store_id);
    params.append('state_id', customer_state_id);
    params.append('local_govt_id', customer_lga_id);
    params.append('phone', customer_phone);

    let http_f = new XMLHttpRequest();
    http_f.open("POST", '/api/create-customer', true);
    http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                showAlert(response.message, 'alert-success');
                window.location.href = '/seller/pos';
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http_f.send(params);
}

function submitPosOrder(payment_type) {
    // if(payload == null) {
    //     showAlert('Please pick a customer address before submiting the order', 'alert-warning', []);
    // } else {
    //    let data = payload.split(';;;');
    //    let products = JSON.parse(data[0]);
    //    let customer = JSON.parse(data[1]);
    // //    const cart = product => element => product == 'quantity_added' && element[product] == undefined ? 1 : element[product];
    // let payload_ = {};
    //    const carts = () => element => {
    //     let object= {}; 
    //     object['product_id'] = element['id'];
    //     object['price'] = element['new_price'] ?? element['price'];
    //     object['quantity_added'] = element['quantity_added'] == undefined ? 1 : element['quantity_added'];
    //     return object;
    //    }
    //    //product == 'quantity_added' && element[product] == undefined ? 1 : element[product];
    // //    let cart_items = products.map(cart('id'));
    // //    let cart_items_quantity = products.map(cart('quantity_added'));
    //    let all_cart_items = products.map(carts());
    //    let params = new FormData();
    //    payload_['customer_id'] = customer.id;
    //    payload_['all_cart_items'] = all_cart_items;
    //    payload_['order_type'] = payment_type;
    //    payload_['store_id'] = store_id;}

        let session_string = sessionStorage.getItem('COMMERCE_PLUS_SESSION');
        let params = new FormData();
        params.append("session", session_string);
        params.append("order_type", payment_type);
        let http_f = new XMLHttpRequest();
        http_f.open("POST", '/api/pos-order', true);
        http_f.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
        //http_f.setRequestHeader("Content-type", "application/json;");
        http_f.onreadystatechange = function() {
            if(http_f.readyState == 4) {
                let response = JSON.parse(this?.responseText);
                if(http_f.status == 200) {
                    showAlert(response.message, 'alert-success');
                    sessionStorage.removeItem('COMMERCE_PLUS_SESSION')
                    // sessionStorage.removeItem('COMMERCE_PLUS_POS_ORDER_PAYLOAD');
                    // localStorage.removeItem('COMMERCE_PLUS_CART_'+store_id);
                    window.location.href = '/seller/pos';
                } else {
                    showAlert(response.message, 'alert-warning', []);
                }
            }
        }
        http_f.send(params);

}

function update_refund_approval(ele, id) {
    let status = 'pending'
    switch (ele.checked == true) {
        case true:
            status = 'accepted'
            break;
    
        default:
            break;
    }
    let payload_ = {};
    payload_['refund_request_id'] = id;
    payload_['status'] = status;

    let http = new XMLHttpRequest();
    http.open("POST", '/api/toggle-refund-request-approval', true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.setRequestHeader("Content-type", "application/json;");
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http.status == 200) {
                showAlert(response.message, 'alert-success');
            } else {
                if(status = 'pending') {
                    ele.setAttribute('checked');
                } else {
                    ele.removeAttribute('checked');
                }
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http.send(JSON.stringify(payload_));

}

function update_order_status(ele, order_id, url = null) {
    let status = ele.value;
    let payload_ = {};
    if(status == 'accepted-dropoff'){
        payload_['status'] = 'accepted';
        payload_['accept_type'] = 'dropoff';
    } else {
        payload_['status'] = status;
    }

    let http = new XMLHttpRequest();
    http.open("PUT", '/api/update-order-status/'+order_id, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.setRequestHeader("Content-type", "application/json;");
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http.status == 200) {
                showAlert(response.message, 'alert-success');
                window.location.href = url ?? '/seller/orders/'+ele.getAttribute('data-code');
            } else {
                showAlert(response.message, 'alert-warning', []);
            }
        }
    }
    http.send(JSON.stringify(payload_));
}

function update_delivery_status(ele, id, url = null, delivery_status = null) {
    let status = ele.value;
    let payload_ = {};
    if (isNaN(status)) {
        payload_['status'] = status;
    } else {
        payload_['delivery_boy_id'] = status;
        payload_['status'] = delivery_status || 'assigned';
    }
    if(status == 'delivered') {
        payload_['pod'] = document.getElementById('pod_input')?.value || null; 
    }

    let http = new XMLHttpRequest();
    http.open("PUT", '/api/update-delivery-status/'+id, true);
    http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    http.setRequestHeader("Content-type", "application/json;");
    http.onreadystatechange = function() {
        if(http.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http.status == 200) {
                showAlert(response.message, 'alert-success');
                window.location.href = url;
            } else {
                showAlert(response.message, 'alert-warning', []);
                ele.checked = false;
            }
        }
    }
    http.send(JSON.stringify(payload_));
}


function rangefilter(arg){
    $('input[name=min_price]').val(arg[0]);
    $('input[name=max_price]').val(arg[1]);
    
    filter(document.getElementById('brand_id').value !== null);
}
function filter(brand = false, keyword = null){
    let params = new FormData();
    let url = null;
    if(brand) {
        let id = document.getElementById('brand_id').value;
        let min_price = document.getElementById('min_price').value;
        let max_price = document.getElementById('max_price').value;
        let sort = document.getElementById('sort_by').value;
        
        params.append('min_price', min_price);
        params.append('max_price', max_price);
        params.append('sort_by', sort);
        params.append('id', id);
        url = '/api/list_brand_products';
    } else {
        let id = !keyword ? document.getElementById('category_id').value : null;
        let category_type = !keyword ? document.getElementById('cat_type').value : null;
        let min_price = document.getElementById('min_price').value;
        let max_price = document.getElementById('max_price').value;
        let sort = document.getElementById('sort_by').value;
        let brand = document.getElementById('brand').value;

        params.append('id', id);
        params.append('category_type', category_type);
        params.append('min_price', min_price);
        params.append('max_price', max_price);
        params.append('sort_by', sort);
        params.append('brand', brand);
        if (keyword) {
            params.append('keyword', keyword);
        }
        url = '/api/list_category_products';
    }
    
    let http_f = new XMLHttpRequest();
    http_f.open("POST", url, true);
    http_f.onreadystatechange = function() {
        if(http_f.readyState == 4) {
            let response = JSON.parse(this?.responseText);
            if(http_f.status == 200) {
                document.getElementById('all-products').innerHTML = '';
                response.data.forEach(product => {
                    document.getElementById('all-products').innerHTML += `
                            <div class="col border-right border-bottom has-transition hov-shadow-out z-1">
                                <div class="aiz-card-box h-auto bg-white py-3 hov-scale-img">
                                    <div class="position-relative h-140px h-md-200px img-fit overflow-hidden">
                                                <!-- Image -->
                                        <a href="/product/`+ product.slug +`" class="d-block h-100">
                                            <img class="mx-auto img-fit has-transition lazyloaded" src="/`+ product.thumbnail_img +`" data-src="/`+ product.thumbnail_img +`" alt="`+ product.name +`" title="`+ product.name +`" onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                        </a>
                                        `+(product.new_price !=  product.price ? 
                                            `<span class="absolute-top-left bg-primary ml-1 mt-1 fs-11 fw-700 text-white w-35px text-center" style="padding-top:2px;padding-bottom:2px;">-`+product.perc+`%</span>` : 
                                            ``)+`
                                        
                                                <!-- Wholesale tag -->
                                                            <!-- wishlisht & compare icons -->
                                            <div class="absolute-top-right aiz-p-hov-icon">
                                                <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishListV2(`+product.id+`)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                    <i class="la la-heart-o"></i>
                                                </a>
                                                <a data-value="`+JSON.stringify(product).replaceAll('"', "'")+`" href="javascript:void(0)" onclick="addToCart (`+product.id+`, this, type = 'online')" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                    <i class="las la-shopping-cart"></i>
                                                </a>
                                            </div>
                                    </div>

                                    <div class="p-2 p-md-3 text-left">
                                        <!-- Product name -->
                                        <h3 class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-center">
                                            <a href="/product/`+product.slug+`" class="d-block text-reset hov-text-primary" title="`+product.name+`">`+product.name+`</a>
                                        </h3>
                                        <div class="fs-14 d-flex justify-content-center mt-3">
                                                    <!-- Previous price -->
                                                    `+(product.new_price !=  product.price ?
                                                        `<div class="disc-amount has-transition">
                                                            <del class="fw-400 text-secondary mr-1">₦`+product.price+`</del>
                                                        </div` : ``)+`
                                                    
                                                <!-- price -->
                                                <div class="">
                                                    <span class="fw-700 text-primary">₦`+product.new_price+`</span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                });
                

            } else {

            }
        }
    }
    http_f.send(params);
}


// 