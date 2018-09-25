<style>
/*
    th {
        vertical-align: center;
        width: 100px;
    }
    td {
        vertical-align: center;
        width: 200px;
    }
*/
</style>

<table class="table table-bordered">
    <tbody>
    <tr>
        <th>STATE LICENSE #</th>
        <td>{{ strstr($invoice->customer->license,',', true) }}</td>
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
        <td>contact</td>
    </tr>
    </tbody>
</table>
