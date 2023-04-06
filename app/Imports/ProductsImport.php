<?php

namespace App\Imports;

use Illuminate\Validation\Rule;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'detail' => $row['description'],
            'store_id' => $_SESSION['vendor_current_store_id'],
            'category_id' => $_SESSION['category_array'][strtolower($row['category'])],
            'sub_category_id' => isset($row['sub_category']) && $row['sub_category'] != '' ? $_SESSION['sub_category_array'][strtolower($row['sub_category'])] : null,
            'section_id' => isset($row['section']) && $row['section'] != '' ? $_SESSION['section'][strtolower($row['section'])] : null,
            'quantity' => $row['current_stock'],
            'brand_id' => isset($row['brand']) && $row['brand'] != '' ? ($_SESSION['brand_array'][strtolower($row['brand'])] ?? null) : null,
            'unit' => $row['unit'],
            'video_provider' => $row['video_provider'],
            'video_link ' => $row['video_link'],
            'price' => $row['unit_price'],
            'sku' => $row['sku'], 
            'meta_title' => $row['meta_title'], 
            'meta_description' => $row['meta_description'],
            'user_id' => $_SESSION['logged_in']->id,
            'tags' => $row['tags'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'category' => Rule::exists('categories', 'name'),
            'sub_category' => 'nullable',
            'section' => 'nullable',
            'current_stock' => 'required|integer',
            'brand' => 'nullable',
            'unit' => 'required',
            'video_provider' => 'nullable|in:youtube,Youtube',
            'video_link ' => 'nullable|string',
            'unit_price' => 'required|numeric|gt:0',
            'sku' => 'nullable|string',
            'meta_title' => 'nullable|string', 
            'meta_description' =>'nullable|string', 
            'tags' => 'nullable|string',
        ];
    }
}
