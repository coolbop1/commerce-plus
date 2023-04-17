<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $data;
    public function __construct($collection)
    {
        $this->data = $collection;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return array_keys($this->data->first()->toArray());
        //return ['name', 'detail', 'store_id', 'category_id', 'sub_category_id', 'section_id', 'price',    'quantity','brand_id','unit','min_qty','refundable','photos','thumbnail_img','date_range','video_provider','video_link','price','discount','discount_type','sku', 'external_link', 'external_link_btn','files', 'pdf', 'meta_title', 'meta_description', 'meta_img', 'shipping_type','low_stock_quantity','stock_visibility_state','cash_on_delivery','est_shipping_days','tax','tax_type','vat','vat_type','user_id','featured','published','is_digital'];
    }
}
