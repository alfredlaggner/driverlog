<?php

namespace App\ Http\ Controllers;

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

class FileController extends Controller
{
    public

    function importExportExcelORCSV()
    {

        return view('file_import_export');
    }

    public function start()
    {
        dd('in start');
        return view('print_manifest');
    }

    public function xmakeManifest()
    {
        if (!$this->importInvoiceIntoDB()) {
            dd('no fresh import');
        } else {
        };
        \
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'enable_html5_parser' => true, 'orientation' => 'landscape']);

        $productCount = SaleInvoice::count();

        $footerLines = 15;

        $firstPageLines = 30;
        $morePageLines = 50;
        $pageLines = 0;
        $morePageCount = 0;


        if ($productCount > $firstPageLines) {
            $morePageCount = 1;
        }

        $morePageLines = $productCount - $firstPageLines;
        if ($morePageCount or $morePageLines >= $pageLines) {
            $morePageCount = ( int )($morePageLines / $pageLines);
            if ($pageLines % $morePageLines) {
                $morePageCount++;
            }
        }

        $morePageLines = 50;
        $productCount = 200;
        $pages = 1;
        $firstPageLines = 30;
        $offset = 0;
        $newoffset = 0;
        $remainingLines = $productCount;
        $pageLines = $firstPageLines;
        $footerLines = 15;
        $printed = 0;
        while ($remainingLines <= 300) {
            echo "page = " . $pages . "<br>";
            echo "offset = " . $offset . "<br>";
            echo "remainingRecords = " . $remainingLines . "<br>";
            if ($remainingLines > $pageLines) {
                echo "printing all " . $pageLines . " lines <br><br>";
                $printed = $printed + $pageLines;
                echo "printed =" . $printed . "<br>";
                $newoffset = $newoffset + $pageLines;
            } else {
                /*                echo $pageLines;
                                echo $footerLines;*/
                $fewerLines = $pageLines - $footerLines;
                echo "printing fewer " . $fewerLines . " lines <br><br>";
                $printed = $printed + $productCount - $printed;
                $newoffset = $newoffset + $fewerLines;
                echo "xxremainingRecords = " . $remainingLines . "<br>";
                echo "total printed =" . $printed . "<br>";

                break;
            }
            echo "xpages= " . $pages . "<br>";
            echo "xpageLines = " . $pageLines . "<br>";
            $offset = $pageLines + (($pages - 1) * $pageLines) - $firstPageLines;
            echo "xoffset =" . $offset . "<br>";
            echo "newoffset =" . $newoffset . "<br>";

            $pageLines = $morePageLines;
            $remainingLines = $productCount - $offset;
            $pages = $pages + 1;
        };
        dd();

        //       dd('extra pages=' . $morePageCount . 'products=' . $productCount);
        $data = [
            'products' => SaleInvoice::all(),
            'invoice' => SaleInvoice::first(),
            'business' => Business::first(),
            'driver' => Driver::first(),
            'vehicle' => Vehicle::first(),
            'productCount' => $productCount,
            'pageCount' => $morePageCount,
            'firstPageLines' => $firstPageLines,
            'pageLines' => $pageLines,
        ];

        /*        return view('main_manifest',$data);*/
        $pdf = \PDF::loadView('main_manifest', $data);
        return $pdf->download('manifest.pdf');

    }

    public

    function importInvoiceIntoDB()
    {
        $path = storage_path('app/public/winscp/sale.order.csv');
        //dd($path);
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = [
                    'ext_id_shipping' => $value->partner_shipping_idid,
                    'order_date' => date_format(date_create($value->date_order), "Y-m-d"),
                    'invoice_number' => $value->name,
                    'name' => $value->order_linename,
                    'quantity' => $value->order_lineproduct_uom_qty,
                    'ext_id_unit' => $value->order_lineproduct_uomid,
                    'unit_price' => $value->order_lineprice_unit,
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('saleinvoices')->delete();
                \
                DB::table('saleinvoices')->insert($arr);
                //         Storage::delete('/public/winscp/sale.order.csv');
                return true;

                /*                        dd('Insert Invoice Records successfully.');*/
            }
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

    function importCustomersIntoDB()
    {

        $path = storage_path('app/public/winscp/res.partner.csv');
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = [
                    'ext_id' => $value->id,
                    'ext_id_contact' => $value->child_idsid,
                    'name' => $value->name,
                    'street' => $value->street,
                    'street2' => $value->street2,
                    'city' => $value->city,
                    'zip' => $value->zip,
                    'phone' => $value->phone,
                    'license' => $value->x_studio_field_mu5dt
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('customers')->delete();
                \
                DB::table('customers')->insert($arr);
                dd('Insert Customers Records successfully.');
            }
        }
        dd('Request data does not have any files to import.');
    }

    public

    function importContactsIntoDB()
    {
        $path = storage_path('app/public/winscp/res.partner.csv');
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

        $path = storage_path('app/public/winscp/product.template.csv');
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


    public

    function downloadExcelFile($type)
    {
        $products = Product::get()->toArray();
        return \ Excel::create('expertphp_demo', function ($excel) use ($products) {
            $excel->sheet('sheet name', function ($sheet) use ($products) {
                $sheet->fromArray($products);
            });
        })->download($type);
    }
}