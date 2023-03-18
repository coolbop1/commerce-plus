const COMMERCE_PLUS_TOKEN = localStorage.getItem('COMMERCE_PLUS_TOKEN');
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
    if(COMMERCE_PLUS_TOKEN) {
        console.log("url "+url);
        console.log("COMMERCE_PLUS_TOKEN "+COMMERCE_PLUS_TOKEN);
        http.setRequestHeader("Authorization", "Bearer "+COMMERCE_PLUS_TOKEN);
    }
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

function logout () {
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

function switchStore  (store_id)  {
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


const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack() {
  //e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_f2f63bc5ba861e1a3e55de8ea08352ac3dfac175', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100 ,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
        showAlert('window closed', 'alert-warning', []);
    },
    callback: function(response){
      //let message = 'Payment complete! Reference: ' + response.reference;
      //alert(message);
      console.log("response ",response);
      subscribeStore(response.reference, 'paystack');
    }
  });

  handler.openIframe();
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

function addToCart (product, ele = null, type = 'pos'){
    let cart_storage = type == 'pos' ? 'COMMERCE_PLUS_CART_'+product.store_id : 'COMMERCE_PLUS_CART';
    let cart = localStorage.getItem(cart_storage) ?? '[]';
    cart = JSON.parse(cart);
    let new_add = cart.find(item => item.id == product.id)
    if(new_add) {
        let cart_quantity = ele?.value || (parseInt((new_add.quantity_added ?? '1')) + 1);
        if(cart_quantity <= product.quantity) {
            new_add.quantity_added = cart_quantity;
            let index_of_new_add = cart.findIndex(item => item.id == product.id)
            cart[index_of_new_add] = new_add
        } else {
            if(ele){
                ele.value =  product.quantity;
            }
            showAlert("Opps!! . you cant add more than the number of products in stock", 'alert-warning', []);
        }
        
    } else {
        cart.push(product);
    }

    localStorage.setItem(cart_storage, JSON.stringify(cart));
    if(type == 'pos'){
        populateCartDetails(product.store_id);
    }
}

function removeFromCartTwo (product_id, store_id, del = false, type = 'pos'){
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
    }
}

function populateCartDetails(store_id = null) {
    let cart_storage = store_id ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
    let cartItems = JSON.parse(localStorage.getItem(cart_storage));
    let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
    document.getElementById('cart-details').innerHTML = `
    <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
    `+(cartItems?.length > 0 ? '<ul id="cart-item-list" class="list-group list-group-flush"></ul>' : '<div class="text-center"><i class="las la-frown la-3x opacity-50"></i><p>No Product Added</p></div>')+`
       
        
    </div>
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
        </div>
    `;
    cartItems.forEach(item => {
        document.getElementById('cart-item-list').innerHTML += `
            <li class="list-group-item py-0 pl-2">
                <div class="row gutters-5 align-items-center">
                    <div class="col-auto w-60px">
                        <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                            <button onClick='addToCart(`+JSON.stringify(item)+`)' class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="plus" data-field="qty-0">
                                <i class="las la-plus"></i>
                            </button>
                            <input type="number" name="qty-0" id="qty-0" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="`+(item.quantity_added ?? 1) +`" min="`+item.min_quantity+`" max="`+item.quantity+`" onchange='addToCart(`+JSON.stringify(item)+`, this)'>
                            <button onClick="removeFromCartTwo(`+item.id+`, `+item.store_id+`)" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="minus" data-field="qty-0">
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
                        <button type="button" class="btn btn-circle btn-icon btn-sm btn-soft-danger ml-2 mr-0" onclick="removeFromCartTwo(`+item.id+`, `+item.store_id+`, true)">
                            <i class="las la-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </li>
        `;

    })
}

function orderConfirmationList(ele_id, store_id) {
    let cart_storage = store_id ? 'COMMERCE_PLUS_CART_'+store_id : 'COMMERCE_PLUS_CART';
    let cartItems = JSON.parse(localStorage.getItem(cart_storage));
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
                    <div class="card-body">
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

// 