<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail', 'store_id', 'category_id', 'sub_category_id', 'section_id', 'price',
        'quantity','brand_id',
            'unit',
            'min_qty',
            'refundable',
            'photos',
            'thumbnail_img',
            'date_range',
            'video_provider',
            'video_link',
            'price',
            'discount',
            'discount_type',
            'sku', 
            'external_link', 
            'external_link_btn',
            'files', 
            'pdf', 
            'meta_title', 
            'meta_description', 
            'meta_img', 
            'shipping_type',
            'low_stock_quantity',
            'stock_visibility_state',
            'cash_on_delivery',
            'est_shipping_days',
            'tax',
            'tax_type',
            'vat',
            'vat_type',
            'user_id',
            'featured',
            'published',
            'is_digital',
    ];

    protected $casts = [
        'approved' => 'boolean',
        'featured' => 'boolean',
        'published' => 'boolean',
        'is_digital' => 'boolean',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}