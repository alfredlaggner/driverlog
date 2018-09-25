<?php

namespace App\Http\Controllers;

use Illuminate\ Http\ Request;
use App\ Http\ Controllers\ Controller;
use Illuminate\ Database\ Eloquent\ Model;
use Illuminate\ Support\ Facades\ Store;
use Illuminate\ Support\ Facades\ Storage;
use App\ Product;
use App\ SaleInvoice;
use App\ Customer;
use App\ Unit;
use App\ Contact;
use App\ Business;
use App\ Driver;
use App\ Vehicle;
use View;
use File;

class odooController extends Controller
{
    //

    public function index($id = 0)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $id = 855;


        $order = $odoo->where('id', '=', $id)
            ->limit(1)
            ->fields(
                'display_name',
                'date_order',
                'partner_id'
            )
            ->get('sale.order');
        $partner_id = $order[0]['partner_id'][0];
        $customer = $odoo->where('id', '=', $partner_id)
            ->limit(1)
            ->fields(
                'display_name',
                'street',
                'street2',
                'city',
                'zip',
                'phone',
                'x_studio_field_mu5dT')
            ->get('res.partner');

     //   $this->importCustomersIntoDB($customer);
        //    dd($customer);

        $order_lines = $odoo->where('order_id', '=', $id)
            ->fields(
                'display_name',
                'price_subtotal',
                'product_uom_qty',
                'price_unit',
                'product_uom',
                'create_date'
            )
            ->get('sale.order.line');

        $this->importInvoiceIntoDB($order_lines);
dd('x');

        $models = $odoo->where('customer', true)
            ->limit(3)
            ->fields('name')
            ->get('res.partner');


        $ids = $odoo->where('customer', '=', true)
            ->search('res.partner');


        $models = $odoo->where('customer', true)
            ->limit(3)
            ->fields('name')
            ->get('res.partner');

        $structure = $odoo->fieldsOf('res.partner');
        dd($structure);


    }

    public function importCustomersIntoDB($customer)
    {

        //   dd($customer);
        if (!$customer[0]['street2']) {
            $street2 = NULL;
        } else {
            $street2 = $customer[0]['street2'];
        }

        if ($customer) {
            $arr[] = [
                'ext_id' => $customer[0]['id'],
                'ext_id_contact' => $customer[0]['id'],
                'name' => $customer[0]['display_name'],
                'street' => $customer[0]['street'],
                'street2' => $street2,
                'city' => $customer[0]['city'],
                'zip' => $customer[0]['zip'],
                'phone' => $customer[0]['phone'],
                'license' => $customer[0]['x_studio_field_mu5dT']
            ];
//dd($arr);
        }
        if (!empty($arr)) {
            //     \DB::table('customers')->delete();
            \DB::table('customers')->insert($arr);
            dd('Insert Customers Records successfully.');
        }
        dd('Request data does not have any files to import.');
    }


    public function importInvoiceIntoDB($order_lines)
    {
   //     dd($order_lines);

        $arrlen = count($order_lines);

        for ($i = 0; $i < $arrlen; $i++) {
            $order_date = ($order_lines[0]['create_date'] == true) ? date_format(date_create($order_lines[0]['create_date']), "Y-m-d") : NULL;
            $arr[] = [
                'ext_id_shipping' => 0,
                'order_date' => $order_date,
                'invoice_number' => 0,
                'name' => $order_lines[$i]['display_name'],
                'quantity' => $order_lines[$i]['product_uom_qty'],
                'ext_id_unit' => $order_lines[$i]['product_uom'][1],
                'unit_price' => $order_lines[$i]['price_unit'],
            ];

        }
//dd($arr);

        if (!empty($arr)) {
            \
            DB::table('saleinvoices')->delete();
            \
            DB::table('saleinvoices')->insert($arr);
            //         Storage::delete('/public/sale.order.csv');
            return true;

            /*                        dd('Insert Invoice Records successfully.');*/
        }
        return false();
        /*                dd('Request data does not have any files to import.');*/
    }

    function strip_tags_content($text, $tags = '', $invert = FALSE)
    {

        preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
        $tags = array_unique($tags[1]);

        if (is_array($tags) AND count($tags) > 0) {
            if ($invert == FALSE) {
                return preg_replace('@<(?!(?:' . implode('|', $tags) . ')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
            } else {
                return preg_replace('@<(' . implode('|', $tags) . ')\b.*?>.*?</\1>@si', '', $text);
            }
        } elseif ($invert == FALSE) {
            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
        }
        return $text;
    }

    public

    function importUnitsIntoDB()
    {

        $path = storage_path('app/public/product.uom.csv');
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = [
                    'ext_id' => $value->id,
                    'name' => $value->name,
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('units')->delete();
                \
                DB::table('units')->insert($arr);
                dd('Insert Units Records successfully.');
            }
        }
        dd('Request data does not have any files to import.');
    }

    public

    function importContactsIntoDB()
    {
        $path = storage_path('app/public/res.partner.csv');
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = [
                    'ext_id' => $value->id,
                    'name' => $value->name,
                    'phone' => $value->phone,
                    'customer_id' => $value->parent_idid,
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('contacts')->delete();
                \
                DB::table('contacts')->insert($arr);
                dd('Insert Contacts Records successfully.');
            }
        }
        dd('Request data does not have any files to import.');
    }

    public

    function importProductsIntoDB()
    {

        $path = storage_path('app/public/product.template.csv');
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = [
                    'ext_id' => $value->id,
                    'name' => $value->name,
                    'description' => $value->name,
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('products')->delete();
                \
                DB::table('products')->insert($arr);
                dd('Inserted Product Records successfully.');
            }
        }
        dd('Request data does not have any files to import.');
    }


}
