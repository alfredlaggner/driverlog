

<table class="table table-bordered"  style="width: 100%">
    <tbody>
    <tr>
        <th>STATE LICENSE #</th>
        <td>{{ $invoice->customer->license }}</td>
    </tr>
    <tr>
        <th>TYPE OF LICENSE</th>
        <td>Retailer License</td>
    </tr>
    <tr>
        <th> BUSINESS NAME</th>
        <td>{{ $invoice->customer->name }}</td>
    </tr>
    <tr>
        <th>BUSINESS ADDRESS</th>
        <td>{{ $invoice->customer->street }}</td>
    </tr>
    <tr>
        <th> CITY, STATE, ZIP CODE</th>
        <td>{{  $invoice->customer->city }}, CA {{  $invoice->customer->zip }}</td>
    </tr>
    <tr>
        <th>PHONE NUMBER</th>
        <td>{{ $invoice->customer->phone }}</td>
    </tr>
    <tr>
        <th>CONTACT NAME</th>
        <td>{{''}}</td>
    </tr>
    </tbody>
</table>
