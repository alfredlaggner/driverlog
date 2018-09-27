<?php

	namespace App\Http\Controllers;

    use App\DriverLog;
    use App\SaleInvoice;
	use App\User;
	use App\Product;
	use Freshbitsweb\Laratables\Laratables;

	class DataTableController extends Controller
	{
		/**
		 * Show the datatables examples.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			return view('log.action');
		}

		/**
		 * return data of the simple datatables.
		 *
		 * @return Json
		 */
		public function getListDatatablesData()
		{
			return Laratables::recordsof(DriverLog::class);
		}

		/**
		 * return data of the Custom columns datatables.
		 *
		 * @return Json
		 */
		public function getCustomColumnDatatablesData()
		{
			return Laratables::recordsof(DriverLog::class);
		}

		/**
		 * return data of the relation columns datatables.
		 *
		 * @return Json
		 */
		public function getRelationshipColumnDatatablesData()
		{
			return Laratables::recordsof(DriverLog::class);
		}

		/**
		 * return data of the Extra data datatables attribute data.
		 *
		 * @return Json
		 */
		public function getExtraDataDatatablesAttributesData()
		{
			return Laratables::recordsof(DriverLog::class);
		}
	}
