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
use App\ DriverLog;
use View;
use File;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

class FileController extends Controller
{
    public function importExportExcelORCSV()
    {
        return view('file_import_export');
    }

    public function Start(Request $request)
    {
        $old_driver = '';
        $old_vehicle = '';
        $old_so = '';
        if ($request->session()->exists('driver')) {
            $old_driver = $request->session()->get('driver');
        }
        if ($request->session()->exists('vehicle')) {
            $old_vehicle = $request->session()->get('vehicle');
        }
        if ($request->session()->exists('so')) {
            $old_so = $request->session()->get('sales_orders');
        }
        return view('print_manifest', [
            'old_driver' => $old_driver,
            'old_vehicle' => $old_vehicle,
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all(),
            'sales_orders' => $old_so,
        ]);
    }

    public function makeManifests(Request $request)
    {
        $driver = Driver::find($request->get('driver'));
        $vehicle = Vehicle::find($request->get('vehicle'));
        //      $business = Business::first();

        $validatedData = $request->validate([
            'sale_orders' => 'required|numeric',
        ]);


        session(['driver' => $request->get('user')]);
        session(['vehicle' => $request->get('vehicle')]);
        session(['sale_orders' => $request->get('sale_orders')]);

        $sale_orders = explode(" ", $validatedData['sale_orders']);
        //	dd($sale_orders);
        //	$sale_orders = [0 => "1006"];
        if (count($sale_orders)) {

            foreach ($sale_orders as $sale_order) {
                $this->getSaleOrder($id = $sale_order);
                $this->driver_log($driver, $vehicle, $sale_order);
                $driver_logs = DriverLog::where('saleinvoice_id', '=', $sale_order)->limit(1)->get();
                return view('log.action')->with('logs', $driver_logs);
            }
            /*
                                dd(" end driver log here");
                                $data = $this->printManifest($driver, $vehicle);

                                \PDF::setOptions(['dpi' => 150, 'defaultMediaType' => 'screen', 'defaultFont' => 'sans-serif', 'enable_html5_parser' => true, 'orientation' => 'landscape']);
                                return (\PDF::loadView('main_manifest', $data)->download('manifest.pdf'));
                                // return ($pdf->stream('manifest.pdf'));*/

        }
        return redirect()->route('make_manifest');
    }

    public function driver_log($driver, $vehicle, $order_id)
    {
        //		dd($order);
        $sale_invoices = SaleInvoice::where('ext_id', '=', $order_id)->limit(1)->get();
        foreach ($sale_invoices as $sale_invoice) {
            $sales_person_id = $sale_invoice->sales_person_id;
            $customer_id = $sale_invoice->ext_id_shipping;
        }

        $driver_log = new DriverLog;
        $driver_log->vehicle_id = $vehicle->id;
        $driver_log->driver_id = $driver->id;
        $driver_log->saleinvoice_id = $order_id;
        $driver_log->salesperson_id = $sales_person_id;
        $driver_log->customer_id = $customer_id;
        $driver_log->save();


    }

    public function messages()
    {
        return [
            'sale_orders.required' => 'Enter a valid sales order number',
        ];
    }

    public function printManifest($driver, $vehicle)
    {

        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'enable_html5_parser' => true, 'orientation' => 'landscape']);

        $productCount = SaleInvoice::count();
        $test = env('app_testing');

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
        if ($pageTotal or $morePageLines >= $attachedPageLines) {
            $pageTotal = ( int )($morePageLines / $attachedPageLines);
            if ($attachedPageLines % $morePageLines) {
                $pageTotal++;
            }
        }

        $totalLines = $productCount;
        $footerPageLines = 15;
        $leftover = 0;
        $onePageMore = 0;
        $firstPageTotal = $firstPageLines + $footerPageLines;
        $pageLines = $firstPageTotal;

        $attachedPageTotal = $attachedPageLines + $footerPageLines;
        $remainingLines = $totalLines - $firstPageTotal;
        $isAttachedPages = $remainingLines > 0 ? 1 : 0;
        $attachedPages = 1 + intval($remainingLines / $attachedPageTotal);
        if (!$isAttachedPages) {
            $isSamePageFirst = $totalLines <= $firstPageLines ? 'yes' : 'no';
        } else {
            $isSamePageAttached = $remainingLines <= $attachedPageLines ? 'yes' : 'no';
        }

        $data = [
            'test' => env('app_testing'),
            'products' => SaleInvoice::all(),
            'invoice' => SaleInvoice::first(),
            'business' => Business::first(),
            'driver' => $driver,
            'vehicle' => $vehicle,
            'productCount' => $productCount,
            'pageCount' => 0,
            'pageTotal' => $pageTotal,
            'attachedPageLines' => $attachedPageLines,
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
            'totalLines' => $totalLines,
            'isSamePageFirst' => $isSamePageFirst,
            'isSamePageAttached' => $isSamePageAttached,
        ];
        return ($data);
    }

    public function getSaleOrder($id = '')
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $id = (int)$id;

        $users = $odoo
            ->fields(
                'id',
                'name',
                'email',
                'date_order'
            )
            ->get('res.users');
//dd($users);
        $this->importUsersIntoDB($users);

        //	$odoo = new \Edujugon\Laradoo\Odoo();
        //	$odoo = $odoo->connect();
        $id = (int)$id;
        //      dd($id);
        $order = $odoo->where('id', '=', $id)
            ->limit(1)
            ->fields(
                'display_name',
                'date_order',
                'partner_id',
                'user_id',
                'order_partner_id'
            )
            ->get('sale.order');
        $this->importSalesOrderIntoDB($order, $odoo);

        //	  dd($order);

        if (count($order) == 0) {
            dd("Order " . $id . " not found.");
        }

        $partner_id = $order[0]['partner_id'][0];
        $customer = $odoo->where('id', '=', $partner_id)
            ->limit(1)
            ->fields(
                'display_name',
                'name',
                'street',
                'street2',
                'city',
                'zip',
                'phone',
                'user_id',
                'x_studio_field_mu5dT')
            ->get('res.partner');

        $this->importCustomersIntoDB($customer);

        $order_lines = $odoo->where('order_id', '=', $id)
            ->fields(
                'name',
                'price_subtotal',
                'product_uom_qty',
                'price_unit',
                'product_uom',
                'create_date',
                'order_partner_id',
                'product_id'
            )
            ->get('sale.order.line');

        $product_id = $order_lines[0]['product_id'][0];
        $product = $odoo->where('id', '=', $product_id)
            ->fields(
                'code',
                'display_name',
                'product_id'
            )
            ->get('product.product');


        $this->importOrderLinesIntoDB($order_lines, $order, $odoo);

    }


    public function importSalesOrderIntoDB($order, $odoo)
    {
        //      dd($order_lines);
        $arrlen = count($order);
        //	echo $arrlen;
        for ($i = 0; $i < $arrlen; $i++) {
            //  echo $i;
            //   $product_id = $order_lines[$i]['product_id'][0];
            //    echo $product_id . "<br>";         //   dd($product_id);
            //  $product = $odoo->where('id', '=', $product_id)->fields('code')->get('product.product');

            //   dd($product);
            //  dd("Not a valid sale order!");

            $order_date = ($order[0]['date_order'] == true) ? date_format(date_create($order[0]['date_order']), "Y-m-d") : NULL;
            $arr[] = [
                'order_date' => $order_date,
                'salesperson_id' => $order[0]['user_id'][0],
                'sales_order' => $order[0]['display_name'],
           //     'customer_id' => $order[0]['order_partner_id'],
                'sales_order_id' => substr($order[0]['display_name'], 2),
            ];
        }
//dd($arr);

        if (!empty($arr)) {
            \
            DB::table('salesorders')->delete();
            \
            DB::table('salesorders')->insert($arr);
            //         Storage::delete('/public/sale.order.csv');
            return true;
        }
        return false();
    }


    public function importOrderLinesIntoDB($order_lines, $order, $odoo)
    {
        //      dd($order_lines);
        $arrlen = count($order_lines);
        //	echo $arrlen;
        for ($i = 0; $i < $arrlen; $i++) {
            //  echo $i;
            $product_id = $order_lines[$i]['product_id'][0];
            //    echo $product_id . "<br>";         //   dd($product_id);
            $product = $odoo->where('id', '=', $product_id)->fields('code')->get('product.product');

            //   dd($product);
            if (!$product->isEmpty()) {
                //  dd("Not a valid sale order!");

                $order_date = ($order_lines[0]['create_date'] == true) ? date_format(date_create($order_lines[0]['create_date']), "Y-m-d") : NULL;
                $arr[] = [
                    'ext_id_shipping' => $order_lines[$i]['order_partner_id'][0],
                    'order_date' => $order_date,
                    'sales_person_id' => $order[0]['user_id'][0],
                    'invoice_number' => $order[0]['display_name'],
                    'ext_id' => substr($order[0]['display_name'], 2),
                    'code' => $product[0]['code'],
                    'name' => $order_lines[$i]['name'],
                    'quantity' => $order_lines[$i]['product_uom_qty'],
                    'ext_id_unit' => $order_lines[$i]['product_uom'][1],
                    'unit_price' => $order_lines[$i]['price_unit'],
                ];
            }
        }
//dd($arr);

        if (!empty($arr)) {
            \
            DB::table('saleinvoices')->delete();
            \
            DB::table('saleinvoices')->insert($arr);
            //         Storage::delete('/public/sale.order.csv');
            return true;
        }
        return false();
    }


    public function importUsersIntoDB($users)
    {
        $arrlen = count($users);
//			echo $arrlen;
        for ($i = 0; $i < $arrlen; $i++) {
            if (!$users->isEmpty()) {
                $arr[] = [
                    'sales_person_id' => $users[$i]['id'],
                    'name' => $users[$i]['name'],
                    'email' => $users[$i]['email'],
                ];
            }
        }
        //		dd($arr);

        if (!empty($arr)) {
            \
            DB::table('salespersons')->delete();
            \
            DB::table('salespersons')->insert($arr);
            //         Storage::delete('/public/sale.order.csv');
            return true;
        }
        return false();
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

    public function importCustomersIntoDB($customer)
    {

        if (!$customer[0]['street2']) {
            $street2 = NULL;
        } else {
            $street2 = $customer[0]['street2'];
        }

        if ($customer) {
            $arr[] = [
                'ext_id' => $customer[0]['id'],
                'ext_id_contact' => $customer[0]['id'],
                'name' => preg_replace("/[^a-zA-Z0-9\s]/", " ", $customer[0]['display_name']),
                'street' => $customer[0]['street'],
                'street2' => $street2,
                'city' => $customer[0]['city'],
                'zip' => $customer[0]['zip'],
                'phone' => $customer[0]['phone'],
                'license' => substr($customer[0]['x_studio_field_mu5dT'], 0, 20),
            ];
        }
        //    dd($arr);
        if (!empty($arr)) {
            \DB::table('customers')->delete();
            \DB::table('customers')->insert($arr);
            //        dd('Insert Customers Records successfully.');
            return true;
        }
        //    dd('Request data does not have any files to import.');
        return false;
    }

    public function ximportCustomersIntoDB()
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
                //         dd('Insert Customers Records successfully.');
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