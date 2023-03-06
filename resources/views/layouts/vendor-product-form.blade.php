@section('product-form')
@if ($product)
<form class="" onsubmit="return submitForm(this, url = '/api/products/{{ $product->id }}', 'PUT', 'create-product-button')">
@else
<form class="" onsubmit="return submitForm(this, url = '/api/products', 'POST', 'create-product-button')">
@endif

    <div class="row gutters-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Information</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Product Name</label>
                        <div class="col-md-8">
                            <input value="{{ $product ? $product->name : '' }}" type="text" class="form-control" name="name"
                                placeholder="Product Name" onchange="update_sku()" required>
                                <input type="hidden" name="store_id" value="{{ $store->id }}"> 
                        </div>
                    </div>
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Category</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                data-live-search="true" required>
                                @foreach ($categories as $category)
                                    <option 
                                    {{ $product ? ($product->category_id == $category->id ? 'selected' : '' ) : '' }} 
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->subCategories as $subCategory)
                                        <option 
                                        {{ $product ? ($product->sub_category_id == $subCategory->id ? 'selected' : '' ) : '' }} 
                                        value="{{ $category->id }}_{{ $subCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $subCategory->name }}</option>
                                        @foreach ($subCategory->sections as $section)
                                            <option 
                                            {{ $product ? ($product->section_id == $section->id ? 'selected' : '' ) : '' }}
                                            value="{{ $category->id }}_{{ $subCategory->id }}_{{ $section->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ "_ ".$section->name }}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach                       
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="brand">
                        <label class="col-md-3 col-from-label">Brand</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                data-live-search="true">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option {{ $product && $product->brand_id == $brand->id ? 'selected' : ''  }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                                                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Unit</label>
                        <div class="col-md-8">
                            <input value="{{ $product ? $product->unit : '' }}" type="text" class="form-control" name="unit"
                                placeholder="Unit (e.g. KG, Pc etc)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Weight <small>(In Kg)</small></label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="weight" step="0.01" value="{{ $product ? $product->weight : '0.00' }}" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Minimum Purchase Qty</label>
                        <div class="col-md-8">
                            <input type="number" lang="en" class="form-control" name="min_qty" value="{{ $product ? $product->min_qty : '1' }}" min="1"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Tags</label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $product ? $product->tags : '' }}" class="form-control aiz-tag-input" name="tags"
                                placeholder="Type and hit enter to add a tag">
                        </div>
                    </div>
                                        <div class="form-group row">
                        <label class="col-md-3 col-from-label">Barcode</label>
                        <div class="col-md-8">
                            <input value="{{ $product ? $product->barcode : '' }}" type="text" class="form-control" name="barcode"
                                placeholder="Barcode">
                        </div>
                    </div>
                                                            <div class="form-group row">
                        <label class="col-md-3 col-from-label">Refundable</label>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="refundable" checked value="{{ $product ? $product->refundable : '1' }}">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Images</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"
                            for="signinSrEmail">Gallery Images</label>
                        <div class="col-md-8">
                            <div class="input-group masked" style="position: relative">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input id='product_image' type="file" onchange="return upload(this, 'product_image_input')" accept="image/*">
                            </div>
                            <input value="{{ $product ? $product->photos : '' }}" id="product_image_input" type="hidden" name="photos">
                            @php
                                if($product) {
                                    $product_photos_string = $product->photos;
                                    $product_photos = $product_photos_string ? explode(',', $product_photos_string) : [];
                                } else {
                                    $product_photos = [];
                                }    
                            @endphp
                            <div id="preview_product_image_input">
                            @foreach ($product_photos as $photo)
                                <div class="file-preview box sm">
                                    <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                        <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                            <img src="/{{ $photo }}" class="img-fit">
                                        </div>
                                        <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div>
                                        <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Thumbnail Image
                            <small>(290x300)</small></label>
                        <div class="col-md-8">
                            <div class="input-group masked" style="position: relative">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input id='product_image' type="file" onchange="return upload(this, 'product_thumbnail_input')" accept="image/*">
                            </div>
                            <input value="{{ $product ? $product->thumbnail_img : '' }}" id="product_thumbnail_input" type="hidden" name="thumbnail_img" class="selected-files">
                            <div id="preview_product_thumbnail_input" class="file-preview box sm">
                                @if ($product && $product->thumbnail_img)
                                <div class="file-preview box sm">
                                    <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                        <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                            <img src="/{{ $product->thumbnail_img }}" class="img-fit">
                                        </div>
                                        <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div>
                                        <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                    </div>
                                </div>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Videos</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Video Provider</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
                                <option {{ $product && $product->video_provider == 'youtube' ? 'selected' : '' }} value="youtube">Youtube</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Video Link</label>
                        <div class="col-md-8">
                            <input value="{{ $product ? $product->video_link : '' }}" type="text" class="form-control" name="video_link"
                                placeholder="Video Link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Variation</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Colors" disabled>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" data-live-search="true" name="colors[]"
                                data-selected-text-format="count" id="colors" multiple disabled>
                                                                <option value="#F0F8FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0F8FF'></span><span>AliceBlue</span></span>">
                                </option>
                                                                <option value="#9966CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9966CC'></span><span>Amethyst</span></span>">
                                </option>
                                                                <option value="#FAEBD7"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAEBD7'></span><span>AntiqueWhite</span></span>">
                                </option>
                                                                <option value="#00FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FFFF'></span><span>Aqua</span></span>">
                                </option>
                                                                <option value="#7FFFD4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7FFFD4'></span><span>Aquamarine</span></span>">
                                </option>
                                                                <option value="#F0FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0FFFF'></span><span>Azure</span></span>">
                                </option>
                                                                <option value="#F5F5DC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5F5DC'></span><span>Beige</span></span>">
                                </option>
                                                                <option value="#FFE4C4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4C4'></span><span>Bisque</span></span>">
                                </option>
                                                                <option value="#000000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#000000'></span><span>Black</span></span>">
                                </option>
                                                                <option value="#FFEBCD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFEBCD'></span><span>BlanchedAlmond</span></span>">
                                </option>
                                                                <option value="#0000FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#0000FF'></span><span>Blue</span></span>">
                                </option>
                                                                <option value="#8A2BE2"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8A2BE2'></span><span>BlueViolet</span></span>">
                                </option>
                                                                <option value="#A52A2A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A52A2A'></span><span>Brown</span></span>">
                                </option>
                                                                <option value="#DEB887"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DEB887'></span><span>BurlyWood</span></span>">
                                </option>
                                                                <option value="#5F9EA0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#5F9EA0'></span><span>CadetBlue</span></span>">
                                </option>
                                                                <option value="#7FFF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7FFF00'></span><span>Chartreuse</span></span>">
                                </option>
                                                                <option value="#D2691E"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D2691E'></span><span>Chocolate</span></span>">
                                </option>
                                                                <option value="#FF7F50"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF7F50'></span><span>Coral</span></span>">
                                </option>
                                                                <option value="#6495ED"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6495ED'></span><span>CornflowerBlue</span></span>">
                                </option>
                                                                <option value="#FFF8DC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF8DC'></span><span>Cornsilk</span></span>">
                                </option>
                                                                <option value="#DC143C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DC143C'></span><span>Crimson</span></span>">
                                </option>
                                                                <option value="#00FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FFFF'></span><span>Cyan</span></span>">
                                </option>
                                                                <option value="#00008B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00008B'></span><span>DarkBlue</span></span>">
                                </option>
                                                                <option value="#008B8B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008B8B'></span><span>DarkCyan</span></span>">
                                </option>
                                                                <option value="#B8860B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B8860B'></span><span>DarkGoldenrod</span></span>">
                                </option>
                                                                <option value="#A9A9A9"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A9A9A9'></span><span>DarkGray</span></span>">
                                </option>
                                                                <option value="#006400"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#006400'></span><span>DarkGreen</span></span>">
                                </option>
                                                                <option value="#BDB76B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BDB76B'></span><span>DarkKhaki</span></span>">
                                </option>
                                                                <option value="#8B008B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B008B'></span><span>DarkMagenta</span></span>">
                                </option>
                                                                <option value="#556B2F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#556B2F'></span><span>DarkOliveGreen</span></span>">
                                </option>
                                                                <option value="#FF8C00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF8C00'></span><span>DarkOrange</span></span>">
                                </option>
                                                                <option value="#9932CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9932CC'></span><span>DarkOrchid</span></span>">
                                </option>
                                                                <option value="#8B0000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B0000'></span><span>DarkRed</span></span>">
                                </option>
                                                                <option value="#E9967A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E9967A'></span><span>DarkSalmon</span></span>">
                                </option>
                                                                <option value="#8FBC8F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8FBC8F'></span><span>DarkSeaGreen</span></span>">
                                </option>
                                                                <option value="#483D8B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#483D8B'></span><span>DarkSlateBlue</span></span>">
                                </option>
                                                                <option value="#2F4F4F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#2F4F4F'></span><span>DarkSlateGray</span></span>">
                                </option>
                                                                <option value="#00CED1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00CED1'></span><span>DarkTurquoise</span></span>">
                                </option>
                                                                <option value="#9400D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9400D3'></span><span>DarkViolet</span></span>">
                                </option>
                                                                <option value="#FF1493"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF1493'></span><span>DeepPink</span></span>">
                                </option>
                                                                <option value="#00BFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00BFFF'></span><span>DeepSkyBlue</span></span>">
                                </option>
                                                                <option value="#696969"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#696969'></span><span>DimGray</span></span>">
                                </option>
                                                                <option value="#1E90FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#1E90FF'></span><span>DodgerBlue</span></span>">
                                </option>
                                                                <option value="#B22222"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B22222'></span><span>FireBrick</span></span>">
                                </option>
                                                                <option value="#FFFAF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFAF0'></span><span>FloralWhite</span></span>">
                                </option>
                                                                <option value="#228B22"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#228B22'></span><span>ForestGreen</span></span>">
                                </option>
                                                                <option value="#FF00FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF00FF'></span><span>Fuchsia</span></span>">
                                </option>
                                                                <option value="#DCDCDC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DCDCDC'></span><span>Gainsboro</span></span>">
                                </option>
                                                                <option value="#F8F8FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F8F8FF'></span><span>GhostWhite</span></span>">
                                </option>
                                                                <option value="#FFD700"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFD700'></span><span>Gold</span></span>">
                                </option>
                                                                <option value="#DAA520"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DAA520'></span><span>Goldenrod</span></span>">
                                </option>
                                                                <option value="#808080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#808080'></span><span>Gray</span></span>">
                                </option>
                                                                <option value="#008000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008000'></span><span>Green</span></span>">
                                </option>
                                                                <option value="#ADFF2F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#ADFF2F'></span><span>GreenYellow</span></span>">
                                </option>
                                                                <option value="#F0FFF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0FFF0'></span><span>Honeydew</span></span>">
                                </option>
                                                                <option value="#FF69B4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF69B4'></span><span>HotPink</span></span>">
                                </option>
                                                                <option value="#CD5C5C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#CD5C5C'></span><span>IndianRed</span></span>">
                                </option>
                                                                <option value="#4B0082"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4B0082'></span><span>Indigo</span></span>">
                                </option>
                                                                <option value="#FFFFF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFF0'></span><span>Ivory</span></span>">
                                </option>
                                                                <option value="#F0E68C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0E68C'></span><span>Khaki</span></span>">
                                </option>
                                                                <option value="#E6E6FA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E6E6FA'></span><span>Lavender</span></span>">
                                </option>
                                                                <option value="#FFF0F5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF0F5'></span><span>LavenderBlush</span></span>">
                                </option>
                                                                <option value="#7CFC00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7CFC00'></span><span>LawnGreen</span></span>">
                                </option>
                                                                <option value="#FFFACD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFACD'></span><span>LemonChiffon</span></span>">
                                </option>
                                                                <option value="#ADD8E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#ADD8E6'></span><span>LightBlue</span></span>">
                                </option>
                                                                <option value="#F08080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F08080'></span><span>LightCoral</span></span>">
                                </option>
                                                                <option value="#E0FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E0FFFF'></span><span>LightCyan</span></span>">
                                </option>
                                                                <option value="#FAFAD2"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAFAD2'></span><span>LightGoldenrodYellow</span></span>">
                                </option>
                                                                <option value="#90EE90"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#90EE90'></span><span>LightGreen</span></span>">
                                </option>
                                                                <option value="#D3D3D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D3D3D3'></span><span>LightGrey</span></span>">
                                </option>
                                                                <option value="#FFB6C1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFB6C1'></span><span>LightPink</span></span>">
                                </option>
                                                                <option value="#FFA07A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA07A'></span><span>LightSalmon</span></span>">
                                </option>
                                                                <option value="#FFA07A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA07A'></span><span>LightSalmon</span></span>">
                                </option>
                                                                <option value="#20B2AA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#20B2AA'></span><span>LightSeaGreen</span></span>">
                                </option>
                                                                <option value="#87CEFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#87CEFA'></span><span>LightSkyBlue</span></span>">
                                </option>
                                                                <option value="#778899"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#778899'></span><span>LightSlateGray</span></span>">
                                </option>
                                                                <option value="#B0C4DE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B0C4DE'></span><span>LightSteelBlue</span></span>">
                                </option>
                                                                <option value="#FFFFE0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFE0'></span><span>LightYellow</span></span>">
                                </option>
                                                                <option value="#00FF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FF00'></span><span>Lime</span></span>">
                                </option>
                                                                <option value="#32CD32"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#32CD32'></span><span>LimeGreen</span></span>">
                                </option>
                                                                <option value="#FAF0E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAF0E6'></span><span>Linen</span></span>">
                                </option>
                                                                <option value="#FF00FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF00FF'></span><span>Magenta</span></span>">
                                </option>
                                                                <option value="#800000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#800000'></span><span>Maroon</span></span>">
                                </option>
                                                                <option value="#66CDAA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#66CDAA'></span><span>MediumAquamarine</span></span>">
                                </option>
                                                                <option value="#0000CD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#0000CD'></span><span>MediumBlue</span></span>">
                                </option>
                                                                <option value="#BA55D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BA55D3'></span><span>MediumOrchid</span></span>">
                                </option>
                                                                <option value="#9370DB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9370DB'></span><span>MediumPurple</span></span>">
                                </option>
                                                                <option value="#3CB371"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#3CB371'></span><span>MediumSeaGreen</span></span>">
                                </option>
                                                                <option value="#7B68EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7B68EE'></span><span>MediumSlateBlue</span></span>">
                                </option>
                                                                <option value="#7B68EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7B68EE'></span><span>MediumSlateBlue</span></span>">
                                </option>
                                                                <option value="#00FA9A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FA9A'></span><span>MediumSpringGreen</span></span>">
                                </option>
                                                                <option value="#48D1CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#48D1CC'></span><span>MediumTurquoise</span></span>">
                                </option>
                                                                <option value="#C71585"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#C71585'></span><span>MediumVioletRed</span></span>">
                                </option>
                                                                <option value="#191970"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#191970'></span><span>MidnightBlue</span></span>">
                                </option>
                                                                <option value="#F5FFFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5FFFA'></span><span>MintCream</span></span>">
                                </option>
                                                                <option value="#FFE4E1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4E1'></span><span>MistyRose</span></span>">
                                </option>
                                                                <option value="#FFE4B5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4B5'></span><span>Moccasin</span></span>">
                                </option>
                                                                <option value="#FFDEAD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFDEAD'></span><span>NavajoWhite</span></span>">
                                </option>
                                                                <option value="#000080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#000080'></span><span>Navy</span></span>">
                                </option>
                                                                <option value="#FDF5E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FDF5E6'></span><span>OldLace</span></span>">
                                </option>
                                                                <option value="#808000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#808000'></span><span>Olive</span></span>">
                                </option>
                                                                <option value="#6B8E23"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6B8E23'></span><span>OliveDrab</span></span>">
                                </option>
                                                                <option value="#FFA500"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA500'></span><span>Orange</span></span>">
                                </option>
                                                                <option value="#FF4500"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF4500'></span><span>OrangeRed</span></span>">
                                </option>
                                                                <option value="#DA70D6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DA70D6'></span><span>Orchid</span></span>">
                                </option>
                                                                <option value="#EEE8AA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#EEE8AA'></span><span>PaleGoldenrod</span></span>">
                                </option>
                                                                <option value="#98FB98"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#98FB98'></span><span>PaleGreen</span></span>">
                                </option>
                                                                <option value="#AFEEEE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#AFEEEE'></span><span>PaleTurquoise</span></span>">
                                </option>
                                                                <option value="#DB7093"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DB7093'></span><span>PaleVioletRed</span></span>">
                                </option>
                                                                <option value="#FFEFD5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFEFD5'></span><span>PapayaWhip</span></span>">
                                </option>
                                                                <option value="#FFDAB9"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFDAB9'></span><span>PeachPuff</span></span>">
                                </option>
                                                                <option value="#CD853F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#CD853F'></span><span>Peru</span></span>">
                                </option>
                                                                <option value="#FFC0CB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFC0CB'></span><span>Pink</span></span>">
                                </option>
                                                                <option value="#DDA0DD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DDA0DD'></span><span>Plum</span></span>">
                                </option>
                                                                <option value="#B0E0E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B0E0E6'></span><span>PowderBlue</span></span>">
                                </option>
                                                                <option value="#800080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#800080'></span><span>Purple</span></span>">
                                </option>
                                                                <option value="#FF0000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF0000'></span><span>Red</span></span>">
                                </option>
                                                                <option value="#BC8F8F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BC8F8F'></span><span>RosyBrown</span></span>">
                                </option>
                                                                <option value="#4169E1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4169E1'></span><span>RoyalBlue</span></span>">
                                </option>
                                                                <option value="#8B4513"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B4513'></span><span>SaddleBrown</span></span>">
                                </option>
                                                                <option value="#FA8072"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FA8072'></span><span>Salmon</span></span>">
                                </option>
                                                                <option value="#F4A460"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F4A460'></span><span>SandyBrown</span></span>">
                                </option>
                                                                <option value="#2E8B57"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#2E8B57'></span><span>SeaGreen</span></span>">
                                </option>
                                                                <option value="#FFF5EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF5EE'></span><span>Seashell</span></span>">
                                </option>
                                                                <option value="#A0522D"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A0522D'></span><span>Sienna</span></span>">
                                </option>
                                                                <option value="#C0C0C0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#C0C0C0'></span><span>Silver</span></span>">
                                </option>
                                                                <option value="#87CEEB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#87CEEB'></span><span>SkyBlue</span></span>">
                                </option>
                                                                <option value="#6A5ACD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6A5ACD'></span><span>SlateBlue</span></span>">
                                </option>
                                                                <option value="#708090"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#708090'></span><span>SlateGray</span></span>">
                                </option>
                                                                <option value="#FFFAFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFAFA'></span><span>Snow</span></span>">
                                </option>
                                                                <option value="#00FF7F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FF7F'></span><span>SpringGreen</span></span>">
                                </option>
                                                                <option value="#4682B4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4682B4'></span><span>SteelBlue</span></span>">
                                </option>
                                                                <option value="#D2B48C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D2B48C'></span><span>Tan</span></span>">
                                </option>
                                                                <option value="#008080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008080'></span><span>Teal</span></span>">
                                </option>
                                                                <option value="#D8BFD8"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D8BFD8'></span><span>Thistle</span></span>">
                                </option>
                                                                <option value="#FF6347"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF6347'></span><span>Tomato</span></span>">
                                </option>
                                                                <option value="#40E0D0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#40E0D0'></span><span>Turquoise</span></span>">
                                </option>
                                                                <option value="#EE82EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#EE82EE'></span><span>Violet</span></span>">
                                </option>
                                                                <option value="#F5DEB3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5DEB3'></span><span>Wheat</span></span>">
                                </option>
                                                                <option value="#FFFFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFFF'></span><span>White</span></span>">
                                </option>
                                                                <option value="#F5F5F5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5F5F5'></span><span>WhiteSmoke</span></span>">
                                </option>
                                                                <option value="#FFFF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFF00'></span><span>Yellow</span></span>">
                                </option>
                                                                <option value="#9ACD32"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9ACD32'></span><span>YellowGreen</span></span>">
                                </option>
                                                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" type="checkbox" name="colors_active">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Attributes" disabled>
                        </div>
                        <div class="col-md-8">
                            <select name="choice_attributes[]" id="choice_attributes"
                                class="form-control aiz-selectpicker" data-live-search="true"
                                data-selected-text-format="count" multiple
                                data-placeholder="Choose Attributes">
                                                                <option value="1">Size</option>
                                                                <option value="2">Fabric</option>
                                                                <option value="4">Sleeve</option>
                                                                <option value="5">Wheel</option>
                                                                <option value="6">Liter</option>
                                                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Choose the attributes of this product and then input values of each attribute
                        </p>
                        <br>
                    </div>

                    <div class="customer_choice_options" id="customer_choice_options">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product price + stock</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Unit price</label>
                        <div class="col-md-6">
                            <input type="number" lang="en" min="0" value="{{ $product ? $product->price : '0' }}" step="0.01"
                                placeholder="Unit price" name="price" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 control-label" for="start_date">Discount Date Range</label>
                        <div class="col-md-9">
                          <input value="{{ $product ? $product->date_range : '' }}" type="text" class="form-control aiz-date-range" name="date_range" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Discount</label>
                        <div class="col-md-6">
                            <input type="number" lang="en" min="0" value="{{ $product ? $product->discount : '0' }}" step="0.01"
                                placeholder="Discount" name="discount" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control aiz-selectpicker" name="discount_type">
                                <option {{ $product && $product->discount_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                                <option {{ $product && $product->discount_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                            </select>
                        </div>
                    </div>

                    <div id="show-hide-div">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="{{ $product ? $product->quantity : '' }}" step="1"
                                    placeholder="Quantity" name="quantity" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                SKU
                            </label>
                            <div class="col-md-6">
                                <input value="{{ $product ? $product->sku : '' }}" type="text" placeholder="SKU" name="sku" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">
                            External link
                        </label>
                        <div class="col-md-9">
                            <input value="{{ $product ? $product->external_link : '' }}" type="text" placeholder="External link" name="external_link" class="form-control">
                            <small class="text-muted">Leave it blank if you do not use external site link</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">
                            External link button text
                        </label>
                        <div class="col-md-9">
                            <input value="{{ $product ? $product->external_link_btn : '' }}" type="text" placeholder="External link button text" name="external_link_btn" class="form-control">
                            <small class="text-muted">Leave it blank if you do not use external site link</small>
                        </div>
                    </div>
                    <br>
                    <div class="sku_combination" id="sku_combination">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Description</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Description</label>
                        <div class="col-md-8">
                            <textarea rows="8" class="form-control" name="detail">{{ $product ? $product->detail : '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">PDF Specification</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"
                            for="signinSrEmail">PDF Specification</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="document">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input value="{{ $product ? $product->pdf : '' }}" type="hidden" name="pdf" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">SEO Meta Tags</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Meta Title</label>
                        <div class="col-md-8">
                            <input value="{{ $product ? $product->meta_title : '' }}" type="text" class="form-control" name="meta_title"
                                placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Description</label>
                        <div class="col-md-8">
                            <textarea name="meta_description" rows="8" class="form-control">{{ $product ? $product->meta_description : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Meta Image</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input value="{{ $product ? $product->meta_img : '' }}" type="hidden" name="meta_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        Shipping Configuration
                    </h5>
                </div>

                <div class="card-body">
                                        <div class="form-group row">
                        <label class="col-md-6 col-from-label">Free Shipping</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="free" {{ $product && $product->shipping_type == 'free' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Flat Rate</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="flat_rate" {{ $product && $product->shipping_type == 'flat_rate' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="flat_rate_shipping_div" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Shipping cost</label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01"
                                    placeholder="Shipping cost" name="flat_shipping_cost"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>

                                    </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Low Stock Quantity Warning</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            Quantity
                        </label>
                        <input type="number" name="low_stock_quantity" value="{{ $product ? $product->low_stock_quantity : '1' }}" min="0" step="1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        Stock Visibility State
                    </h5>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Show Stock Quantity</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="quantity" {{ $product && $product->stock_visibility_state == 'quantity' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Show Stock With Text Only</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="text" {{ $product && $product->stock_visibility_state == 'text' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Hide Stock</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="hide" {{ $product && $product->stock_visibility_state == 'hide' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Cash On Delivery</h5>
                </div>
                <div class="card-body">
                                        <div class="form-group row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="cash_on_delivery" value="1" {{ $product && $product->cash_on_delivery ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>
                                    </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Estimate Shipping Time</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            Shipping Days
                        </label>
                        <div class="input-group">
                            <input value="{{ $product ? $product->est_shipping_days : '' }}" type="number" class="form-control" name="est_shipping_days" min="1" step="1"
                                placeholder="Shipping Days">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Days</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Vat &amp; TAX</h5>
                </div>
                <div class="card-body">
                                        <label for="name">
                        Tax
                    </label>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" lang="en" min="0" value="{{ $product ? $product->tax : 0 }}" step="0.01"
                                placeholder="Tax" name="tax" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" name="tax_type">
                                <option {{ $product && $product->tax_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                                <option {{ $product && $product->tax_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                                        <label for="name">
                        Vat
                    </label>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" lang="en" min="0" value="{{ $product ? $product->vat : '0' }}" step="0.01"
                                placeholder="Tax" name="vat" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" name="vat_type">
                                <option {{ $product && $product->vat_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                                <option {{ $product && $product->vat_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                                    </div>
            </div>

        </div>
        <div class="col-12">
            <div class="mar-all text-right mb-2">
                <button id="create-product-button" type="submit" name="button" value="publish"
                    class="btn btn-primary">{{ $product ? 'Update' : 'Upload' }} Product</button>
            </div>
        </div>
    </div>

</form>
@endsection





































@section('digital-product-form')
@if ($product)
<form class="" onsubmit="return submitForm(this, url = '/api/products/{{ $product->id }}', 'PUT', 'create-product-button')">
@else
<form class="" onsubmit="return submitForm(this, url = '/api/products', 'POST', 'create-product-button')">
@endif
    <input type="hidden" name="store_id" value="{{ $store->id }}">
    <input type="hidden" name="is_digital" value="1">

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">General</h5>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Product Name <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" value="{{ $product->name ?? '' }}" name="name" placeholder="Product Name" required>
                </div>
            </div>
            <div class="form-group row" id="category">
                <label class="col-lg-3 col-from-label">Category <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <select class="form-control aiz-selectpicker" name="category_id" id="category_id" required>
                        @foreach ($categories as $category)
                            <option 
                            {{ $product ? ($product->category_id == $category->id ? 'selected' : '' ) : '' }} 
                            value="{{ $category->id }}">{{ $category->name }}</option>
                            @foreach ($category->subCategories as $subCategory)
                                <option 
                                {{ $product ? ($product->sub_category_id == $subCategory->id ? 'selected' : '' ) : '' }} 
                                value="{{ $category->id }}_{{ $subCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $subCategory->name }}</option>
                                @foreach ($subCategory->sections as $section)
                                    <option 
                                    {{ $product ? ($product->section_id == $section->id ? 'selected' : '' ) : '' }}
                                    value="{{ $category->id }}_{{ $subCategory->id }}_{{ $section->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ "_ ".$section->name }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Product File <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <div class="input-group" data-toggle="aizuploader" data-multiple="false">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input type="hidden" name="files" value="{{ $product->files ?? '' }}" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Tags <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="text" class="form-control aiz-tag-input" name="tags" value="{{ $product->tags ?? '' }}" placeholder="Type and hit enter">
                    <small class="text-muted">This is used for search. Input those words by which customer can find this product.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Images</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="signinSrEmail">Gallery Images <small>(600x600)</small></label>
                <div class="col-lg-9">
                    <div onclick="openFileModal(this, 'digital-product-image')" class="input-group"  data-type="image" data-multiple="true">
                        <div class="input-group-prepend">
                            <div  class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input id="digital-product-image" value="{{ $product->photos ?? '' }}" type="hidden" name="photos" class="selected-files">
                    </div>
                    <div id="preview_digital-product-image" class="file-preview box sm">
                    @php
                        $product_photos_string = $product->photos ?? null;
                        $product_photos = $product_photos_string ? explode(',', $product_photos_string) : [];
                    @endphp
                    @foreach ($product_photos as $product_photo)
                        <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                            <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                <img src="/{{ $product_photo }}" class="img-fit">
                            </div>
                            <div class="remove">
                                <button class="btn btn-sm btn-link remove-attachment" type="button">
                                    <i class="la la-close"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <small class="text-muted">These images are visible in product details page gallery. Use 600x600 sizes images.</small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="signinSrEmail">Thumbnail Image <small>(300x300)</small></label>
                <div class="col-lg-9">
                    <div class="input-group" onclick="openFileModal(this, 'digital-product-thumb')" data-type="image" data-multiple="false">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input id="digital-product-thumb" value="{{ $product->thumbnail_img ?? '' }}" type="hidden" name="thumbnail_img" class="selected-files">
                    </div>
                    <div id="preview_digital-product-thumb" class="file-preview box sm">
                        @if ($product->thumbnail_img ?? null)
                        <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                            <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                <img src="/{{ $product->thumbnail_img }}" class="img-fit">
                            </div>
                            <div class="remove">
                                <button class="btn btn-sm btn-link remove-attachment" type="button">
                                    <i class="la la-close"></i>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <small class="text-muted">This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Meta Tags</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Meta Title</label>
                <div class="col-lg-9">
                    <input type="text" value="{{ $product->meta_title ?? '' }}" class="form-control" name="meta_title" placeholder="Meta Title">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Description</label>
                <div class="col-lg-9">
                    <textarea name="meta_description" rows="5" class="form-control">{{ $product->meta_description ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="signinSrEmail">Meta Image</label>
                <div class="col-lg-9">
                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input type="hidden" name="meta_img" value="{{ $product->meta_img ?? '' }}" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Price</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Unit price <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="number" lang="en" min="0" value="{{ $product->price ?? '0' }}" step="0.01" placeholder="Unit price" name="price" class="form-control" required>
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-lg-3 col-from-label">Purchase price <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="Purchase price" name="purchase_price" class="form-control" required>
                </div>
            </div> --}}
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">
                    Tax
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="number" lang="en" min="0" value="{{ $product->tax ?? '0' }}" step="0.01" placeholder="Tax" name="tax" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <select class="form-control aiz-selectpicker" name="tax_type">
                        <option {{ $product && $product->tax_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                        <option {{ $product && $product->tax_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">
                    Vat
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="number" lang="en" min="0" value="{{ $product->vat ?? '0' }}" step="0.01" placeholder="Vat" name="vat" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <select class="form-control aiz-selectpicker" name="vat_type">
                        <option {{ $product && $product->vat_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                        <option {{ $product && $product->vat_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Discount <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="number" lang="en" min="0" value="{{ $product->discount ?? '0' }}" step="0.01" placeholder="Discount" name="discount" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <select class="form-control aiz-selectpicker" name="discount_type">
                        <option {{ $product && $product->discount_type == 'amount' ? 'selected' : '' }} value="amount">Flat</option>
                        <option {{ $product && $product->discount_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Product Information</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-3 col-from-label">Description <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea rows="5" class="form-control" name="detail" required>{{ $product->detail ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mb-0 text-right mb-2">
        <button id="create-product-button" type="submit" class="btn btn-primary">Save Product</button>
    </div>
</form>
@endsection


































@section('product-form-temp')
<form class="" action="https://demo.activeitzone.com/ecommerce/seller/products/store" method="POST" enctype="multipart/form-data" id="choice_form">
    <div class="row gutters-5">
        <div class="col-lg-8">
            <input type="hidden" name="_token" value="fhzQaco5QQO6mzBDyCeb4egVwHwZwhHnaxHQxXoK">            <input type="hidden" name="added_by" value="seller">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Information</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Product Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name"
                                placeholder="Product Name" onchange="update_sku()" required>
                        </div>
                    </div>
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Category</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                data-live-search="true" required>
                                                                <option value="1">Women Clothing &amp; Fashion</option>
                                                                <option value="13">-- Hot Categories</option>
            <option value="59">---- Party Dress</option>
                <option value="60">---- Beauty &amp; Health</option>
                <option value="61">---- Women shoe</option>
                <option value="62">---- Sleeping Dress</option>
                <option value="63">---- Casual Dress</option>
                <option value="78">---- Hoodies &amp; Sweatshirts</option>
                <option value="79">---- Jackets</option>
                <option value="80">---- T-shirts</option>
                <option value="81">---- Shirts</option>
                <option value="82">---- Socks</option>
                                                                        <option value="14">-- Wedding &amp; events</option>
            <option value="64">---- Wedding Dresses</option>
                <option value="65">---- Evening Dresses</option>
                <option value="66">---- Prom Dresses</option>
                <option value="67">---- Bridesmaid Dresses</option>
                                                                        <option value="15">-- Bottom</option>
            <option value="68">---- Skirts</option>
                <option value="69">---- Leggings</option>
                <option value="70">---- Jeans</option>
                <option value="71">---- Pant &amp; caprices</option>
                <option value="72">---- Shorts</option>
                <option value="86">---- Formal Pants</option>
                <option value="87">---- Casual pants</option>
                <option value="88">---- Cargo pants</option>
                <option value="89">---- Jeans</option>
                                                                        <option value="16">-- Tops &amp; sets</option>
            <option value="73">---- Tank tops</option>
                <option value="74">---- Suit &amp; sets</option>
                                                                        <option value="17">-- Accessories</option>
            <option value="75">---- Eyewear &amp; accessories</option>
                <option value="76">---- Hats &amp; Caps</option>
                <option value="77">---- Gloves</option>
                <option value="93">---- Watch</option>
                <option value="94">---- Wallet</option>
                <option value="95">---- Belt</option>
                <option value="96">---- Hats &amp; Cap</option>
                                                                        <option value="244">-- Women Watch</option>
                                                                    <option value="245">-- Baby Dresses</option>
                                                                                                    <option value="2">Men Clothing &amp; Fashion</option>
                                                                <option value="18">-- Hot Categories</option>
                                                                    <option value="19">-- Outwear &amp; jackets</option>
            <option value="83">---- Genuine Leather</option>
                <option value="84">---- Suit &amp; Blazer</option>
                <option value="85">---- Wool &amp; Blends</option>
                                                                        <option value="20">-- Bottom</option>
                                                                    <option value="21">-- Underwear &amp; Loungewear Accessories</option>
            <option value="90">---- Shorts</option>
                <option value="91">---- Boxers</option>
                <option value="92">---- Men sleep &amp; lounge</option>
                                                                        <option value="22">-- Accessories</option>
                                                                    <option value="247">-- Men Formal Dress</option>
                                                                                                    <option value="3">Computer &amp; Accessories</option>
                                                                <option value="23">-- Laptop &amp; Accessories</option>
            <option value="97">---- Notebook</option>
                <option value="98">---- Netbook</option>
                <option value="99">---- Laptop Battery</option>
                <option value="100">---- Laptop Motherboard</option>
                <option value="101">---- Laptop Ram</option>
                <option value="102">---- Laptop bag</option>
                                                                        <option value="24">-- Gaming pc</option>
            <option value="103">---- Gaming casing</option>
                <option value="104">---- Brand PC</option>
                <option value="105">---- Gaming Motherboard</option>
                <option value="106">---- GPU</option>
                <option value="107">---- Gaming cooling system</option>
                <option value="108">---- Gaming mouse</option>
                <option value="109">---- Gaming keyboard</option>
                                                                        <option value="25">-- Official Equipment</option>
            <option value="110">---- Inkjet printer</option>
                <option value="111">---- Laser printer</option>
                <option value="112">---- 3D printer</option>
                <option value="113">---- Scanners</option>
                <option value="114">---- Photocopy machine</option>
                                                                        <option value="26">-- Components &amp; Peripherals</option>
            <option value="115">---- Processor</option>
                <option value="116">---- Motherboard</option>
                <option value="117">---- RAM</option>
                <option value="118">---- Graphics card</option>
                <option value="119">---- Cooling fan</option>
                <option value="120">---- Desktop casing</option>
                <option value="242">---- Spekar</option>
                                                                        <option value="250">-- TV $ Soundbox</option>
                                                                                                    <option value="4">Automobile &amp; Motorcycle</option>
                                                                <option value="27">-- Racing car</option>
            <option value="121">---- Formula Racing</option>
                <option value="122">---- Sports car racing</option>
                <option value="123">---- Stock car racing</option>
                <option value="124">---- Drag racing</option>
                <option value="125">---- Rallying</option>
                                                                        <option value="28">-- Four Seater sedan</option>
            <option value="126">---- Luxury car</option>
                <option value="127">---- Taxi</option>
                <option value="128">---- Hybrid car</option>
                <option value="129">---- Gasoline car</option>
                                                                        <option value="29">-- SUV</option>
            <option value="130">---- Luxury SUV</option>
                <option value="131">---- Off-road SUV</option>
                <option value="132">---- Midsize SUV</option>
                <option value="133">---- Mini SUV</option>
                                                                        <option value="30">-- Motor bike</option>
            <option value="134">---- Racing Bike</option>
                <option value="135">---- Adventure Touring Bikes</option>
                <option value="136">---- Choppers, Cruisers</option>
                <option value="137">---- Cruisers</option>
                <option value="138">---- Power Cruisers</option>
                <option value="139">---- Motocross Bikes</option>
                                                                                                        <option value="5">Kids &amp; toy</option>
                                                                <option value="31">-- Baby Clothing</option>
            <option value="140">---- Baby Dresses</option>
                <option value="141">---- Baby rompers</option>
                <option value="142">---- Baby pants</option>
                <option value="143">---- Baby outwear</option>
                <option value="147">---- Jeans</option>
                                                                        <option value="32">-- Boys Clothing</option>
            <option value="144">---- Clothing sets</option>
                <option value="145">---- T-shirts</option>
                <option value="146">---- Hoodies</option>
                                                                        <option value="33">-- Girls Clothing</option>
            <option value="148">---- Dresses</option>
                <option value="149">---- Clothing set</option>
                <option value="150">---- Tops</option>
                <option value="151">---- Sleeping wear</option>
                                                                        <option value="34">-- Shoes &amp; Bag</option>
            <option value="152">---- Babyâ™s first walker</option>
                <option value="153">---- Babyâ™s Shoe</option>
                <option value="154">---- Girlâs Shoe</option>
                <option value="155">---- School bag</option>
                <option value="156">---- Babyâ€s wallet</option>
                                                                        <option value="35">-- Baby &amp; Mother</option>
            <option value="157">---- Nappy Changing</option>
                <option value="158">---- Baby Care</option>
                <option value="159">---- Backpacks &amp; Carriers</option>
                <option value="160">---- Maternity</option>
                                                                        <option value="246">-- Baby Dress</option>
                                                                    <option value="248">-- Kids &amp; Toy</option>
                                                                                                    <option value="6">Sports &amp; outdoor</option>
                                                                <option value="36">-- Swimming</option>
            <option value="161">---- Bikini set</option>
                <option value="162">---- One piece suits</option>
                <option value="163">---- Two piece suits</option>
                <option value="164">---- Men€™s swimwear</option>
                <option value="165">---- Childrenâ€™s swimwear</option>
                                                                        <option value="37">-- Cycling</option>
            <option value="166">---- Bicycles</option>
                <option value="167">---- Bicycle Frames</option>
                <option value="168">---- Bicycle Lights</option>
                <option value="169">---- Bicycle Helmets</option>
                <option value="170">---- Cycling Jerseys</option>
                <option value="171">---- Cycling Eye wear</option>
                                                                        <option value="38">-- Sneakers</option>
            <option value="172">---- Running Shoes</option>
                <option value="173">---- Hiking Shoes</option>
                <option value="174">---- Soccer Shoes</option>
                <option value="175">---- Basketball Shoes</option>
                                                                        <option value="39">-- Fishing</option>
            <option value="176">---- Fishing Reels</option>
                <option value="177">---- Fishing Lures</option>
                <option value="178">---- Fishing Lines</option>
                <option value="179">---- Fishing Rods</option>
                                                                                                        <option value="7">Jewelry &amp; Watches</option>
                                                                <option value="40">-- Wedding &amp; Engagement</option>
            <option value="180">---- Bridal Jewelry Sets</option>
                <option value="181">---- Engagement Rings</option>
                <option value="182">---- Wedding Hair Jewelry</option>
                                                                        <option value="41">-- Menâ€™s watch</option>
            <option value="183">---- Smart watch</option>
                <option value="184">---- Mechanical watch</option>
                <option value="185">---- Digital watch</option>
                <option value="186">---- Sports watch</option>
                                                                        <option value="42">-- Women watch</option>
            <option value="187">---- Sports Watches</option>
                <option value="188">---- Women&#039;s Bracelet Watches</option>
                <option value="189">---- Dress Watches</option>
                                                                        <option value="43">-- Fashion Jewelry</option>
            <option value="190">---- Necklaces &amp; Pendants</option>
                <option value="191">---- Hot Rings</option>
                <option value="192">---- Trendy Earrings</option>
                <option value="193">---- Bracelets &amp; Bangles</option>
                                                                                                        <option value="8">Cellphones &amp; Tabs</option>
                                                                <option value="44">-- Mobile Phones</option>
            <option value="194">---- Basic phone</option>
                <option value="195">---- Android phone</option>
                <option value="196">---- iOS phone</option>
                <option value="197">---- Windows Phone</option>
                                                                        <option value="45">-- Mobile Phone Parts</option>
            <option value="198">---- Mobile Phone LCDs</option>
                <option value="199">---- Mobile Phone Batteries</option>
                <option value="200">---- Mobile Phone Touch, SIM Card &amp; Tools</option>
                <option value="201">---- SIM Card &amp; Tools</option>
                                                                        <option value="46">-- Mobile Phone Accessories</option>
            <option value="202">---- Power Bank</option>
                <option value="203">---- Screen Protectors</option>
                <option value="204">---- Mobile Phone Cables</option>
                <option value="205">---- Holders &amp; Stands</option>
                                                                        <option value="47">-- Tablets &amp; accessories</option>
            <option value="206">---- iOS Tablet</option>
                <option value="207">---- Android Tablet</option>
                <option value="208">---- Tablet accessories</option>
                                                                                                        <option value="9">Beauty, Health &amp; Hair</option>
                                                                <option value="48">-- Makeup</option>
            <option value="209">---- Eyes</option>
                <option value="210">---- Lips</option>
                <option value="211">---- Face</option>
                <option value="212">---- Makeup Tools</option>
                                                                        <option value="49">-- Skin Care</option>
            <option value="213">---- Face</option>
                <option value="214">---- Eyes</option>
                <option value="215">---- Body</option>
                <option value="216">---- Skin Care Tools</option>
                                                                        <option value="50">-- Nail Art &amp; Tools</option>
            <option value="217">---- Nail Gel</option>
                <option value="218">---- Nail Drill</option>
                <option value="219">---- Nail Dryer</option>
                <option value="220">---- Nail Glitter</option>
                                                                                                        <option value="10">Home Improvement &amp; Tools</option>
                                                                <option value="51">-- Indoor Lighting</option>
            <option value="221">---- Ceiling Lights</option>
                <option value="222">---- Wall Lamps</option>
                <option value="223">---- Night Lights</option>
                                                                        <option value="52">-- Outdoor Lighting</option>
            <option value="224">---- Flashlights &amp; Torches</option>
                <option value="225">---- Solar Lamps</option>
                <option value="226">---- Underwater Lights</option>
                                                                        <option value="53">-- LED Lighting</option>
            <option value="227">---- LED Strips</option>
                <option value="228">---- LED Downlights</option>
                <option value="229">---- LED Panel Lights</option>
                <option value="230">---- LED Spotlights</option>
                <option value="231">---- LED Bar Lights</option>
                                                                        <option value="249">-- Tools</option>
                                                                                                    <option value="11">Home decoration &amp; Appliance</option>
                                                                <option value="54">-- Home Decor</option>
            <option value="232">---- Painting &amp; Calligraphy</option>
                <option value="233">---- Wall Stickers</option>
                <option value="234">---- Wall Clock</option>
                                                                        <option value="55">-- Home Textile</option>
            <option value="235">---- Cushions</option>
                <option value="236">---- Bedding Set</option>
                <option value="237">---- Beach Towels</option>
                                                                        <option value="56">-- Furniture</option>
            <option value="238">---- Home Furniture</option>
                <option value="239">---- Office Furniture</option>
                <option value="240">---- Outdoor Furniture</option>
                <option value="241">---- Top Furniture Stores</option>
                                                                                                        <option value="12">Toy</option>
                                                                <option value="57">-- Baby Toy</option>
                                                                                                </select>
                        </div>
                    </div>
                    <div class="form-group row" id="brand">
                        <label class="col-md-3 col-from-label">Brand</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                data-live-search="true">
                                <option value="">Select Brand</option>
                                                                <option value="1">Ford</option>
                                                                <option value="2">Chevrolet</option>
                                                                <option value="3">Audi</option>
                                                                <option value="4">Hyundai</option>
                                                                <option value="5">Nissan</option>
                                                                <option value="6">BMW</option>
                                                                <option value="7">Mercedes-Benz</option>
                                                                <option value="8">Toyota</option>
                                                                <option value="9">Suzuki</option>
                                                                <option value="10">Mitsubishi</option>
                                                                <option value="11">Honda</option>
                                                                <option value="12">Volvo</option>
                                                                <option value="13">Yamaha</option>
                                                                <option value="14">Brighton</option>
                                                                <option value="15">Tanishq</option>
                                                                <option value="16">Victoria&#039;s Secret</option>
                                                                <option value="17">Dior</option>
                                                                <option value="18">Bucketfeet</option>
                                                                <option value="19">JLO</option>
                                                                <option value="20">En&#039;or</option>
                                                                <option value="21">Rolex</option>
                                                                <option value="22">Polo</option>
                                                                <option value="23">Aigner</option>
                                                                <option value="24">Omega</option>
                                                                <option value="25">Axe</option>
                                                                <option value="26">Addidas</option>
                                                                <option value="27">Nike</option>
                                                                <option value="28">Puma</option>
                                                                <option value="29">Reebok</option>
                                                                <option value="30">Samsung</option>
                                                                <option value="31">Apple</option>
                                                                <option value="32">Dell</option>
                                                                <option value="33">HP</option>
                                                                <option value="34">Acer</option>
                                                                <option value="35">Asus</option>
                                                                <option value="36">Sony</option>
                                                                <option value="37">Lenovo</option>
                                                                <option value="38">Corsair</option>
                                                                <option value="39">Microsoft</option>
                                                                <option value="40">Hitachi</option>
                                                                <option value="41">Lakme</option>
                                                                <option value="42">Logitech</option>
                                                                <option value="43">Calvin Klein</option>
                                                                <option value="44">Little live pets</option>
                                                                <option value="45">Baby TV</option>
                                                                <option value="46">Kickers</option>
                                                                <option value="47">lucky Brand</option>
                                                                <option value="48">Nihal</option>
                                                                <option value="49">ELLE</option>
                                                                <option value="50">The Crystal Bride</option>
                                                                <option value="51">DG</option>
                                                                <option value="52">Hudson</option>
                                                                <option value="53">Muratti</option>
                                                                <option value="54">Breitling</option>
                                                                <option value="55">Burberry</option>
                                                                <option value="56">Huwaei</option>
                                                                <option value="57">HTC</option>
                                                                <option value="58">Nokia</option>
                                                                <option value="59">Johnson&#039;s baby</option>
                                                                <option value="60">Cerelac</option>
                                                                <option value="61">Babies Outfits</option>
                                                                <option value="62">Pampers</option>
                                                                <option value="63">Toys Pino</option>
                                                                <option value="64">Belly Baby</option>
                                                                <option value="65">Baby Care</option>
                                                                <option value="66">Baby &amp; me</option>
                                                                <option value="67">Razer</option>
                                                                <option value="68">Loreal</option>
                                                                <option value="69">Dove</option>
                                                                <option value="70">NYX</option>
                                                                <option value="71">Guess</option>
                                                                <option value="72">Mac</option>
                                                                <option value="73">Flormar</option>
                                                                <option value="74">Sephora</option>
                                                                <option value="75">Urban Decay</option>
                                                                <option value="76">Maybeline</option>
                                                                <option value="77">Lexington</option>
                                                                <option value="78">Jade furniture</option>
                                                                <option value="80">Apato</option>
                                                                <option value="81">Brooks</option>
                                                                <option value="82">Decor</option>
                                                                <option value="83">IFD</option>
                                                                <option value="84">Interno</option>
                                                                <option value="85">Hilsdale</option>
                                                                <option value="86">Nicoletti</option>
                                                                <option value="87">Rolls royce</option>
                                                                <option value="88">Joules</option>
                                                                <option value="89">Alosa</option>
                                                                <option value="90">Denim</option>
                                                                <option value="91">One Plus</option>
                                                                <option value="92">Mercedes</option>
                                                                <option value="93">BAS Vampire</option>
                                                                <option value="94">WOODWORM</option>
                                                                <option value="95">Google</option>
                                                                <option value="96">Xiaomi</option>
                                                                <option value="97">Riyal Enfield</option>
                                                                <option value="98">Royal Enfield</option>
                                                                <option value="99">Philipps</option>
                                                                <option value="100">LOUIS-VUITTON</option>
                                                                <option value="101">Canon</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Unit</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="unit"
                                placeholder="Unit (e.g. KG, Pc etc)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Weight <small>(In Kg)</small></label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="weight" step="0.01" value="0.00" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Minimum Purchase Qty</label>
                        <div class="col-md-8">
                            <input type="number" lang="en" class="form-control" name="min_qty" value="1" min="1"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Tags</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control aiz-tag-input" name="tags[]"
                                placeholder="Type and hit enter to add a tag">
                        </div>
                    </div>
                                        <div class="form-group row">
                        <label class="col-md-3 col-from-label">Barcode</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="barcode"
                                placeholder="Barcode">
                        </div>
                    </div>
                                                            <div class="form-group row">
                        <label class="col-md-3 col-from-label">Refundable</label>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="refundable" checked value="1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                                    </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Images</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"
                            for="signinSrEmail">Gallery Images</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input type="hidden" name="photos" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Thumbnail Image
                            <small>(290x300)</small></label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input type="hidden" name="thumbnail_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Videos</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Video Provider</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
                                <option value="youtube">Youtube</option>
                                <option value="dailymotion">Dailymotion</option>
                                <option value="vimeo">Vimeo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Video Link</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="video_link"
                                placeholder="Video Link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Variation</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Colors" disabled>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" data-live-search="true" name="colors[]"
                                data-selected-text-format="count" id="colors" multiple disabled>
                                                                <option value="#F0F8FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0F8FF'></span><span>AliceBlue</span></span>">
                                </option>
                                                                <option value="#9966CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9966CC'></span><span>Amethyst</span></span>">
                                </option>
                                                                <option value="#FAEBD7"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAEBD7'></span><span>AntiqueWhite</span></span>">
                                </option>
                                                                <option value="#00FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FFFF'></span><span>Aqua</span></span>">
                                </option>
                                                                <option value="#7FFFD4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7FFFD4'></span><span>Aquamarine</span></span>">
                                </option>
                                                                <option value="#F0FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0FFFF'></span><span>Azure</span></span>">
                                </option>
                                                                <option value="#F5F5DC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5F5DC'></span><span>Beige</span></span>">
                                </option>
                                                                <option value="#FFE4C4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4C4'></span><span>Bisque</span></span>">
                                </option>
                                                                <option value="#000000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#000000'></span><span>Black</span></span>">
                                </option>
                                                                <option value="#FFEBCD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFEBCD'></span><span>BlanchedAlmond</span></span>">
                                </option>
                                                                <option value="#0000FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#0000FF'></span><span>Blue</span></span>">
                                </option>
                                                                <option value="#8A2BE2"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8A2BE2'></span><span>BlueViolet</span></span>">
                                </option>
                                                                <option value="#A52A2A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A52A2A'></span><span>Brown</span></span>">
                                </option>
                                                                <option value="#DEB887"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DEB887'></span><span>BurlyWood</span></span>">
                                </option>
                                                                <option value="#5F9EA0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#5F9EA0'></span><span>CadetBlue</span></span>">
                                </option>
                                                                <option value="#7FFF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7FFF00'></span><span>Chartreuse</span></span>">
                                </option>
                                                                <option value="#D2691E"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D2691E'></span><span>Chocolate</span></span>">
                                </option>
                                                                <option value="#FF7F50"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF7F50'></span><span>Coral</span></span>">
                                </option>
                                                                <option value="#6495ED"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6495ED'></span><span>CornflowerBlue</span></span>">
                                </option>
                                                                <option value="#FFF8DC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF8DC'></span><span>Cornsilk</span></span>">
                                </option>
                                                                <option value="#DC143C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DC143C'></span><span>Crimson</span></span>">
                                </option>
                                                                <option value="#00FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FFFF'></span><span>Cyan</span></span>">
                                </option>
                                                                <option value="#00008B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00008B'></span><span>DarkBlue</span></span>">
                                </option>
                                                                <option value="#008B8B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008B8B'></span><span>DarkCyan</span></span>">
                                </option>
                                                                <option value="#B8860B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B8860B'></span><span>DarkGoldenrod</span></span>">
                                </option>
                                                                <option value="#A9A9A9"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A9A9A9'></span><span>DarkGray</span></span>">
                                </option>
                                                                <option value="#006400"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#006400'></span><span>DarkGreen</span></span>">
                                </option>
                                                                <option value="#BDB76B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BDB76B'></span><span>DarkKhaki</span></span>">
                                </option>
                                                                <option value="#8B008B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B008B'></span><span>DarkMagenta</span></span>">
                                </option>
                                                                <option value="#556B2F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#556B2F'></span><span>DarkOliveGreen</span></span>">
                                </option>
                                                                <option value="#FF8C00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF8C00'></span><span>DarkOrange</span></span>">
                                </option>
                                                                <option value="#9932CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9932CC'></span><span>DarkOrchid</span></span>">
                                </option>
                                                                <option value="#8B0000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B0000'></span><span>DarkRed</span></span>">
                                </option>
                                                                <option value="#E9967A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E9967A'></span><span>DarkSalmon</span></span>">
                                </option>
                                                                <option value="#8FBC8F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8FBC8F'></span><span>DarkSeaGreen</span></span>">
                                </option>
                                                                <option value="#483D8B"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#483D8B'></span><span>DarkSlateBlue</span></span>">
                                </option>
                                                                <option value="#2F4F4F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#2F4F4F'></span><span>DarkSlateGray</span></span>">
                                </option>
                                                                <option value="#00CED1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00CED1'></span><span>DarkTurquoise</span></span>">
                                </option>
                                                                <option value="#9400D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9400D3'></span><span>DarkViolet</span></span>">
                                </option>
                                                                <option value="#FF1493"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF1493'></span><span>DeepPink</span></span>">
                                </option>
                                                                <option value="#00BFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00BFFF'></span><span>DeepSkyBlue</span></span>">
                                </option>
                                                                <option value="#696969"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#696969'></span><span>DimGray</span></span>">
                                </option>
                                                                <option value="#1E90FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#1E90FF'></span><span>DodgerBlue</span></span>">
                                </option>
                                                                <option value="#B22222"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B22222'></span><span>FireBrick</span></span>">
                                </option>
                                                                <option value="#FFFAF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFAF0'></span><span>FloralWhite</span></span>">
                                </option>
                                                                <option value="#228B22"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#228B22'></span><span>ForestGreen</span></span>">
                                </option>
                                                                <option value="#FF00FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF00FF'></span><span>Fuchsia</span></span>">
                                </option>
                                                                <option value="#DCDCDC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DCDCDC'></span><span>Gainsboro</span></span>">
                                </option>
                                                                <option value="#F8F8FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F8F8FF'></span><span>GhostWhite</span></span>">
                                </option>
                                                                <option value="#FFD700"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFD700'></span><span>Gold</span></span>">
                                </option>
                                                                <option value="#DAA520"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DAA520'></span><span>Goldenrod</span></span>">
                                </option>
                                                                <option value="#808080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#808080'></span><span>Gray</span></span>">
                                </option>
                                                                <option value="#008000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008000'></span><span>Green</span></span>">
                                </option>
                                                                <option value="#ADFF2F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#ADFF2F'></span><span>GreenYellow</span></span>">
                                </option>
                                                                <option value="#F0FFF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0FFF0'></span><span>Honeydew</span></span>">
                                </option>
                                                                <option value="#FF69B4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF69B4'></span><span>HotPink</span></span>">
                                </option>
                                                                <option value="#CD5C5C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#CD5C5C'></span><span>IndianRed</span></span>">
                                </option>
                                                                <option value="#4B0082"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4B0082'></span><span>Indigo</span></span>">
                                </option>
                                                                <option value="#FFFFF0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFF0'></span><span>Ivory</span></span>">
                                </option>
                                                                <option value="#F0E68C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F0E68C'></span><span>Khaki</span></span>">
                                </option>
                                                                <option value="#E6E6FA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E6E6FA'></span><span>Lavender</span></span>">
                                </option>
                                                                <option value="#FFF0F5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF0F5'></span><span>LavenderBlush</span></span>">
                                </option>
                                                                <option value="#7CFC00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7CFC00'></span><span>LawnGreen</span></span>">
                                </option>
                                                                <option value="#FFFACD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFACD'></span><span>LemonChiffon</span></span>">
                                </option>
                                                                <option value="#ADD8E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#ADD8E6'></span><span>LightBlue</span></span>">
                                </option>
                                                                <option value="#F08080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F08080'></span><span>LightCoral</span></span>">
                                </option>
                                                                <option value="#E0FFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#E0FFFF'></span><span>LightCyan</span></span>">
                                </option>
                                                                <option value="#FAFAD2"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAFAD2'></span><span>LightGoldenrodYellow</span></span>">
                                </option>
                                                                <option value="#90EE90"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#90EE90'></span><span>LightGreen</span></span>">
                                </option>
                                                                <option value="#D3D3D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D3D3D3'></span><span>LightGrey</span></span>">
                                </option>
                                                                <option value="#FFB6C1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFB6C1'></span><span>LightPink</span></span>">
                                </option>
                                                                <option value="#FFA07A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA07A'></span><span>LightSalmon</span></span>">
                                </option>
                                                                <option value="#FFA07A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA07A'></span><span>LightSalmon</span></span>">
                                </option>
                                                                <option value="#20B2AA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#20B2AA'></span><span>LightSeaGreen</span></span>">
                                </option>
                                                                <option value="#87CEFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#87CEFA'></span><span>LightSkyBlue</span></span>">
                                </option>
                                                                <option value="#778899"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#778899'></span><span>LightSlateGray</span></span>">
                                </option>
                                                                <option value="#B0C4DE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B0C4DE'></span><span>LightSteelBlue</span></span>">
                                </option>
                                                                <option value="#FFFFE0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFE0'></span><span>LightYellow</span></span>">
                                </option>
                                                                <option value="#00FF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FF00'></span><span>Lime</span></span>">
                                </option>
                                                                <option value="#32CD32"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#32CD32'></span><span>LimeGreen</span></span>">
                                </option>
                                                                <option value="#FAF0E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FAF0E6'></span><span>Linen</span></span>">
                                </option>
                                                                <option value="#FF00FF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF00FF'></span><span>Magenta</span></span>">
                                </option>
                                                                <option value="#800000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#800000'></span><span>Maroon</span></span>">
                                </option>
                                                                <option value="#66CDAA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#66CDAA'></span><span>MediumAquamarine</span></span>">
                                </option>
                                                                <option value="#0000CD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#0000CD'></span><span>MediumBlue</span></span>">
                                </option>
                                                                <option value="#BA55D3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BA55D3'></span><span>MediumOrchid</span></span>">
                                </option>
                                                                <option value="#9370DB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9370DB'></span><span>MediumPurple</span></span>">
                                </option>
                                                                <option value="#3CB371"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#3CB371'></span><span>MediumSeaGreen</span></span>">
                                </option>
                                                                <option value="#7B68EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7B68EE'></span><span>MediumSlateBlue</span></span>">
                                </option>
                                                                <option value="#7B68EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#7B68EE'></span><span>MediumSlateBlue</span></span>">
                                </option>
                                                                <option value="#00FA9A"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FA9A'></span><span>MediumSpringGreen</span></span>">
                                </option>
                                                                <option value="#48D1CC"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#48D1CC'></span><span>MediumTurquoise</span></span>">
                                </option>
                                                                <option value="#C71585"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#C71585'></span><span>MediumVioletRed</span></span>">
                                </option>
                                                                <option value="#191970"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#191970'></span><span>MidnightBlue</span></span>">
                                </option>
                                                                <option value="#F5FFFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5FFFA'></span><span>MintCream</span></span>">
                                </option>
                                                                <option value="#FFE4E1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4E1'></span><span>MistyRose</span></span>">
                                </option>
                                                                <option value="#FFE4B5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFE4B5'></span><span>Moccasin</span></span>">
                                </option>
                                                                <option value="#FFDEAD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFDEAD'></span><span>NavajoWhite</span></span>">
                                </option>
                                                                <option value="#000080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#000080'></span><span>Navy</span></span>">
                                </option>
                                                                <option value="#FDF5E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FDF5E6'></span><span>OldLace</span></span>">
                                </option>
                                                                <option value="#808000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#808000'></span><span>Olive</span></span>">
                                </option>
                                                                <option value="#6B8E23"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6B8E23'></span><span>OliveDrab</span></span>">
                                </option>
                                                                <option value="#FFA500"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFA500'></span><span>Orange</span></span>">
                                </option>
                                                                <option value="#FF4500"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF4500'></span><span>OrangeRed</span></span>">
                                </option>
                                                                <option value="#DA70D6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DA70D6'></span><span>Orchid</span></span>">
                                </option>
                                                                <option value="#EEE8AA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#EEE8AA'></span><span>PaleGoldenrod</span></span>">
                                </option>
                                                                <option value="#98FB98"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#98FB98'></span><span>PaleGreen</span></span>">
                                </option>
                                                                <option value="#AFEEEE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#AFEEEE'></span><span>PaleTurquoise</span></span>">
                                </option>
                                                                <option value="#DB7093"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DB7093'></span><span>PaleVioletRed</span></span>">
                                </option>
                                                                <option value="#FFEFD5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFEFD5'></span><span>PapayaWhip</span></span>">
                                </option>
                                                                <option value="#FFDAB9"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFDAB9'></span><span>PeachPuff</span></span>">
                                </option>
                                                                <option value="#CD853F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#CD853F'></span><span>Peru</span></span>">
                                </option>
                                                                <option value="#FFC0CB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFC0CB'></span><span>Pink</span></span>">
                                </option>
                                                                <option value="#DDA0DD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#DDA0DD'></span><span>Plum</span></span>">
                                </option>
                                                                <option value="#B0E0E6"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#B0E0E6'></span><span>PowderBlue</span></span>">
                                </option>
                                                                <option value="#800080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#800080'></span><span>Purple</span></span>">
                                </option>
                                                                <option value="#FF0000"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF0000'></span><span>Red</span></span>">
                                </option>
                                                                <option value="#BC8F8F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#BC8F8F'></span><span>RosyBrown</span></span>">
                                </option>
                                                                <option value="#4169E1"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4169E1'></span><span>RoyalBlue</span></span>">
                                </option>
                                                                <option value="#8B4513"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#8B4513'></span><span>SaddleBrown</span></span>">
                                </option>
                                                                <option value="#FA8072"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FA8072'></span><span>Salmon</span></span>">
                                </option>
                                                                <option value="#F4A460"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F4A460'></span><span>SandyBrown</span></span>">
                                </option>
                                                                <option value="#2E8B57"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#2E8B57'></span><span>SeaGreen</span></span>">
                                </option>
                                                                <option value="#FFF5EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFF5EE'></span><span>Seashell</span></span>">
                                </option>
                                                                <option value="#A0522D"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#A0522D'></span><span>Sienna</span></span>">
                                </option>
                                                                <option value="#C0C0C0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#C0C0C0'></span><span>Silver</span></span>">
                                </option>
                                                                <option value="#87CEEB"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#87CEEB'></span><span>SkyBlue</span></span>">
                                </option>
                                                                <option value="#6A5ACD"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#6A5ACD'></span><span>SlateBlue</span></span>">
                                </option>
                                                                <option value="#708090"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#708090'></span><span>SlateGray</span></span>">
                                </option>
                                                                <option value="#FFFAFA"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFAFA'></span><span>Snow</span></span>">
                                </option>
                                                                <option value="#00FF7F"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#00FF7F'></span><span>SpringGreen</span></span>">
                                </option>
                                                                <option value="#4682B4"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#4682B4'></span><span>SteelBlue</span></span>">
                                </option>
                                                                <option value="#D2B48C"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D2B48C'></span><span>Tan</span></span>">
                                </option>
                                                                <option value="#008080"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#008080'></span><span>Teal</span></span>">
                                </option>
                                                                <option value="#D8BFD8"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#D8BFD8'></span><span>Thistle</span></span>">
                                </option>
                                                                <option value="#FF6347"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FF6347'></span><span>Tomato</span></span>">
                                </option>
                                                                <option value="#40E0D0"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#40E0D0'></span><span>Turquoise</span></span>">
                                </option>
                                                                <option value="#EE82EE"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#EE82EE'></span><span>Violet</span></span>">
                                </option>
                                                                <option value="#F5DEB3"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5DEB3'></span><span>Wheat</span></span>">
                                </option>
                                                                <option value="#FFFFFF"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFFFF'></span><span>White</span></span>">
                                </option>
                                                                <option value="#F5F5F5"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#F5F5F5'></span><span>WhiteSmoke</span></span>">
                                </option>
                                                                <option value="#FFFF00"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#FFFF00'></span><span>Yellow</span></span>">
                                </option>
                                                                <option value="#9ACD32"
                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:#9ACD32'></span><span>YellowGreen</span></span>">
                                </option>
                                                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" type="checkbox" name="colors_active">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Attributes" disabled>
                        </div>
                        <div class="col-md-8">
                            <select name="choice_attributes[]" id="choice_attributes"
                                class="form-control aiz-selectpicker" data-live-search="true"
                                data-selected-text-format="count" multiple
                                data-placeholder="Choose Attributes">
                                                                <option value="1">Size</option>
                                                                <option value="2">Fabric</option>
                                                                <option value="4">Sleeve</option>
                                                                <option value="5">Wheel</option>
                                                                <option value="6">Liter</option>
                                                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Choose the attributes of this product and then input values of each attribute
                        </p>
                        <br>
                    </div>

                    <div class="customer_choice_options" id="customer_choice_options">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product price + stock</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Unit price</label>
                        <div class="col-md-6">
                            <input type="number" lang="en" min="0" value="0" step="0.01"
                                placeholder="Unit price" name="unit_price" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 control-label" for="start_date">Discount Date Range</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control aiz-date-range" name="date_range" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Discount</label>
                        <div class="col-md-6">
                            <input type="number" lang="en" min="0" value="0" step="0.01"
                                placeholder="Discount" name="discount" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control aiz-selectpicker" name="discount_type">
                                <option value="amount">Flat</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                    </div>

                    <div id="show-hide-div">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="1"
                                    placeholder="Quantity" name="current_stock" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                SKU
                            </label>
                            <div class="col-md-6">
                                <input type="text" placeholder="SKU" name="sku" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">
                            External link
                        </label>
                        <div class="col-md-9">
                            <input type="text" placeholder="External link" name="external_link" class="form-control">
                            <small class="text-muted">Leave it blank if you do not use external site link</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">
                            External link button text
                        </label>
                        <div class="col-md-9">
                            <input type="text" placeholder="External link button text" name="external_link_btn" class="form-control">
                            <small class="text-muted">Leave it blank if you do not use external site link</small>
                        </div>
                    </div>
                    <br>
                    <div class="sku_combination" id="sku_combination">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Description</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="aiz-text-editor" name="detail"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">PDF Specification</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"
                            for="signinSrEmail">PDF Specification</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="document">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input type="hidden" name="pdf" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">SEO Meta Tags</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Meta Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="meta_title"
                                placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Description</label>
                        <div class="col-md-8">
                            <textarea name="meta_description" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Meta Image</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input type="hidden" name="meta_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        Shipping Configuration
                    </h5>
                </div>

                <div class="card-body">
                                        <div class="form-group row">
                        <label class="col-md-6 col-from-label">Free Shipping</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="free" checked>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Flat Rate</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="flat_rate">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="flat_rate_shipping_div" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Shipping cost</label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01"
                                    placeholder="Shipping cost" name="flat_shipping_cost"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>

                                    </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Low Stock Quantity Warning</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            Quantity
                        </label>
                        <input type="number" name="low_stock_quantity" value="1" min="0" step="1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        Stock Visibility State
                    </h5>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Show Stock Quantity</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="quantity" checked>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Show Stock With Text Only</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="text">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Hide Stock</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="hide">
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Cash On Delivery</h5>
                </div>
                <div class="card-body">
                                        <div class="form-group row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="cash_on_delivery" value="1" checked="">
                                <span></span>
                            </label>
                        </div>
                    </div>
                                    </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Estimate Shipping Time</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            Shipping Days
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="est_shipping_days" min="1" step="1"
                                placeholder="Shipping Days">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Days</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Vat &amp; TAX</h5>
                </div>
                <div class="card-body">
                                        <label for="name">
                        Tax
                        <input type="hidden" value="3" name="tax_id[]">
                    </label>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" lang="en" min="0" value="0" step="0.01"
                                placeholder="Tax" name="tax[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" name="tax_type[]">
                                <option value="amount">Flat</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                                        <label for="name">
                        Vat
                        <input type="hidden" value="4" name="tax_id[]">
                    </label>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" lang="en" min="0" value="0" step="0.01"
                                placeholder="Tax" name="tax[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" name="tax_type[]">
                                <option value="amount">Flat</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                                    </div>
            </div>

        </div>
        <div class="col-12">
            <div class="mar-all text-right mb-2">
                <button type="submit" name="button" value="publish"
                    class="btn btn-primary">Upload Product</button>
            </div>
        </div>
    </div>

</form>
@endsection