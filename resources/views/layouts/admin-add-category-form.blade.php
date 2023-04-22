@section('add-category-form')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Category Information</h5>
            </div>
            <div class="card-body">
                @php
                    $subCategoryId = null;
                    $categoryId = null;
                    $sectionId = null;
                    $category = null;
                @endphp
                @if ($category_id)
                    @if (is_numeric($category_id))
                        @php
                            $category = $categories->where('id', $category_id)->first();
                        @endphp
                    @else
                        @php
                            $cat_ids =  explode('_',$category_id);
                            $categoryId = $cat_ids[0];
                            $cat = $categories->where('id', $categoryId)->first();
                            $subCategoryId = $cat_ids[1];
                            $sub = $cat->subCategories()->where('id', $subCategoryId)->first();
                            $sectionId = $cat_ids[2] ?? null;
                            if ($sectionId) {
                                $category = $sub->sections()->where('id', $sectionId)->first();
                            } else {
                                $category = $sub;
                            }
                        @endphp
                        
                    @endif
                
                    
                @endif
                <form class="form-horizontal" onsubmit="return submitForm(this, url = '/api/create-category', 'POST', 'add-category')">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input value="{{ optional($category)->name }}" type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Parent Category</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">No Parent</option>
                                @foreach ($categories as $category_)
                                    <option {{ $categoryId && $subCategoryId && is_null($sectionId) && $categoryId == $category_->id ? 'selected' : ''   }} value="{{ $category_->id }}">{{ $category_->name }}</option>
                                    @foreach ($category_->subCategories as $sub_category)
                                    <option {{ $categoryId && $subCategoryId && $sectionId && $categoryId == $category_->id && $subCategoryId == $sub_category->id ? 'selected' : ''  }} value="{{ $category_->id }}_{{ $sub_category->id }}">----{{ $sub_category->name }}</option>  
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Banner <small>(200x200)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" onclick="openFileModal(this, 'category_banner_input')" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input id="category_banner_input" type="hidden" name="banner" class="selected-files" alue="{{ optional($category)->banner }}">
                            </div>
                            <div id="preview_category_banner_input" class="file-preview box sm">
                                @if (optional($category)->banner)
                                <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                    <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                        <img src="/{{ optional($category)->banner }}" class="img-fit">
                                    </div>
                                    <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div>
                                    <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Icon <small>(32x32)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" onclick="openFileModal(this, 'category_icon_input')" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose file</div>
                                <input id="category_icon_input" type="hidden" name="icon" class="selected-files" value="{{ optional($category)->icon }}">
                            </div>
                            <div id="preview_category_icon_input" class="file-preview box sm">
                                @if (optional($category)->icon)
                                <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                    <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                        <img src="/{{ optional($category)->icon }}" class="img-fit">
                                    </div>
                                    <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div>
                                    <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" rows="5" class="form-control">{{ optional($category)->description }}</textarea>
                        </div>
                    </div>

                    
                    <div class="form-group mb-0 text-right">
                        <button  id="add-category" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection