@section('add-category-form')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Category Information</h5>
            </div>
            <div class="card-body">
                @if ($category_id)
                    @if (is_numeric($category_id))
                        
                    @else
                        @php
                            $cat_ids =  explode('_',$category_id);
                        @endphp
                        
                    @endif
                
                    
                @endif
                <form class="form-horizontal" onsubmit="return submitForm(this, url = '/api/create-category', 'POST', 'add-category')">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Parent Category</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">No Parent</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->subCategories as $sub_category)
                                    <option value="{{ $category->id }}_{{ $sub_category->name }}">----{{ $sub_category->name }}</option>  
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
                                <input id="category_banner_input" type="hidden" name="banner" class="selected-files">
                            </div>
                            <div id="preview_category_banner_input" class="file-preview box sm">
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
                                <input id="category_icon_input" type="hidden" name="icon" class="selected-files">
                            </div>
                            <div id="preview_category_icon_input" class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" rows="5" class="form-control"></textarea>
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