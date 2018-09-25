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

    public function Start(Request $request)
    {
        $old_driver = '';
        $old_vehicle = '';
        if ($request->session()->exists('driver')) {
            $old_driver = $request->session()->get('driver');
        }
        if ($request->session()->exists('vehicle')) {
            $old_vehicle = $request->session()->get('vehicle');
        }
        return view('print_manifest', [
            'old_driver' => $old_driver,
            'old_vehicle' => $old_vehicle,
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all()
        ]);
    }

    public function makeManifest(Request $request)
    {
        if (!$this->importInvoiceIntoDB()) {
            dd('no fresh import');
        };
        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'enable_html5_parser' => true, 'orientation' => 'landscape']);

        $productCount = SaleInvoice::count();
        /*
                $firstPageLines = 10;
                $pageLines = 20;
                $morePageCount = 0;

                if ($productCount > $firstPageLines) {
                    $morePageCount = 1;
                }

                $morePageLines = $productCount - $firstPageLines;
                if ($morePageCount or $morePageLines >= $pageLines) {
                    $morePageCount = (int)($morePageLines / $pageLines);
                    if ($pageLines % $morePageLines) {
                        $morePageCount++;
                    }
                }
        dd($morePageCount);*/


        echo $productCount . "<br>";
        $pageTotal = 0;
        $printed = 0;
        $firstPageLines = 7;
        $attachedPageLines = 30;
        $pageLines = 0;
        $morePageCount = 0;

        $pageLines = 0;
        $morePageCount = 0;
        $isSamePageFirst = false;
        $isSamePageAttached = false;

        if ($productCount > $firstPageLines) {
            $pageTotal = 1;
        }
        $morePageLines = $productCount - $firstPageLines;
        echo $morePageLines;
        if ($pageTotal or $morePageLines >= $attachedPageLines) {
            $pageTotal = ( int )($morePageLines / $attachedPageLines);
            if ($attachedPageLines % $morePageLines) {
                $pageTotal++;
            }
        }

        $totalLines = $productCount;
        echo 'totalLines= ' . $totalLines . '<br>' . '<br>';
        $footerPageLines = 15;
        echo 'firstPageLines=' . $firstPageLines;
        $leftover = 0;
        $onePageMore = 0;
        $firstPageTotal = $firstPageLines + $footerPageLines;
        $pageLines = $firstPageTotal;

        echo 'firstPageTotal=' . $firstPageTotal . '<br>';
        $attachedPageTotal = $attachedPageLines + $footerPageLines;
        echo 'attachedPageTotal= ' . $attachedPageTotal . '<br>';
        $remainingLines = $totalLines - $firstPageTotal;
        echo 'remainingLines1=' . $remainingLines . '<br>';


        //   $isAttachedPages = $totalLines > $remainingLines ? true : false;
        $isAttachedPages = $remainingLines > 0 ? 1 : 0;
        $attachedPages = 1 + intval($remainingLines / $attachedPageTotal);
        echo '$attachedPages ? ' . $attachedPages . '<br>';
        echo '$isAttachedPages ? ' . $isAttachedPages . '<br>';
        if (!$isAttachedPages) {
            $isSamePageFirst = $totalLines <= $firstPageLines ? 'yes' : 'no';
            echo 'isSamePageFirst = ' . $isSamePageFirst;
        } else {
            $isSamePageAttached = $remainingLines <= $attachedPageLines ? 'yes' : 'no';
            echo 'isSamePageAttached = ' . $isSamePageAttached;
        }
        //  dd($remainingLines);
        /*        $moreAttachedPages = $isAttachedPages ? intval($totalLines / $attachedPageLines) : 0;
                echo 'moreAttachedPages = ' . $moreAttachedPages . '<br>';

                    $leftover = $isAttachedPages ? ($moreAttachedPages * $attachedPageTotal) - $totalLines - $firstPageTotal : 0;
                    echo 'leftover =' . $leftover . '<br>';

                    $isSamePage = $leftover <= $attachedPageLines ? true : false;
                    $onePageMore = $leftover ? 1 : 0;
                    $extraPages = $leftover > $firstPageLines ? 2 : $onePageMore;

                    echo 'extraPages =' . $extraPages . '<br>';
                    $extraPages = $extraPages + $moreAttachedPages;
                    echo 'extraPages =' . $extraPages . '<br>';
        */
        session(['driver' =>  $request->get('user')]);
        session(['vehicle' =>  $request->get('vehicle')]);
        $data = [
            'test' => env('app_testing'),
            'products' => SaleInvoice::all(),
            'invoice' => SaleInvoice::first(),
            'business' => Business::first(),
            'driver' => Driver::find($request->get('driver')),
            'vehicle' => Vehicle::find($request->get('vehicle')),
            'productCount' => $productCount,
            'pageCount' => 0,
            'pageTotal' => $pageTotal,
            'attachedPageLines' => $attachedPageLines,
            //          'pageLines' => $pageLines,
            'pageAttached' => 0,
            'offset' => 0,
            'newoffset' => 0,
            'printed' => 0,
            'remainingLines' => $productCount,
            'footerLines' => 15,
            'firstPageTotal' => $firstPageTotal,
            'firstPageLines' => $firstPageLines,
            'attachedPageTotal' => $attachedPageTotal,
            'remainingLines' => $remainingLines,
            'isAttachedPages' => $isAttachedPages,
            'attachedPages' => $attachedPages,
            //          'leftover' => $leftover,
            //         'extraPages' => $extraPages,
            //         'onePageMore' => $onePageMore,
                      'totalLines' => $totalLines,
            'isSamePageFirst' => $isSamePageFirst,
            'isSamePageAttached' => $isSamePageAttached,
            //       'moreAttachedPages' => $moreAttachedPages,
        ];
//dd($data);
 //       return view('main_manifest', $data);
        $pdf = \PDF::loadView('main_manifest', $data);
        return $pdf->download('manifest.pdf');

    }

    public
    function importInvoiceIntoDB()
    {
        $path = storage_path('app/public/sale.order.csv');
        $data = \Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $order_date = ($value->date_order == true) ? date_format(date_create($value->date_order), "Y-m-d") : NULL;
                $arr[] = [
                    'ext_id_shipping' => $value->partner_idid,
                    'order_date' => $order_date,
                    'invoice_number' => $value->name,
                    'name' => $value->order_linename,
                    'quantity' => $value->order_lineproduct_uom_qty,
                    'ext_id_unit' => $value->order_lineproduct_uomid,
                    'unit_price' => $value->order_lineprice_unit,
                ];

            }
            if (!empty($arr)) {
                \
                DB::table('sale_invoices')->delete();
                \
                DB::table('sale_invoices')->insert($arr);
                //         Storage::delete('/public/sale.order.csv');
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

        $path = storage_path('app/public/res.partner.csv');
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
    public function additional()
    {
        return view('print_manifest_edit');
    }

}