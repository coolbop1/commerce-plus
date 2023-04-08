@section('terms-section')
<section class="mb-4">
    <div class="container">
        <div id="terms-container" class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            <?php
                echo str_replace('Website Name', $website->name, $website->terms);
            ?>
        </div>
    </div>
</section>
@endsection

@section('return-policy-section')
<section class="mb-4">
    <div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            <?php
                echo str_replace('Website Name', $website->name, $website->return_policy);
            ?>
        </div>
    </div>
</section>
@endsection 

@section('support-policy-section')
<section class="mb-4">
    <div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            <?php
                echo str_replace('Website Name', $website->name, $website->support_policy);
            ?>
        </div>
    </div>
</section>
@endsection

@section('privacy-policy-section')
<section class="mb-4">
    <div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            <?php
                echo str_replace('Website Name', $website->name, $website->privacy_policy);
            ?>
        </div>
    </div>
</section>
@endsection