<style>
</style>

<table class="table table-bordered" style="width: 100%">
    <tbody>
    <tr>
        <th>STATE LICENSE #</th>
        <td>{{ $business->adult_license_number }}</td>
    </tr>
    <tr>
        <th>TYPE OF LICENSE</th>
        <td>{{ $business->adult_license_name }}</td>
    </tr>
    <tr>
        <th> BUSINESS NAME</th>
        <td>{{ $business->name }}</td>
    </tr>
    <tr>
        <th>BUSINESS ADDRESS</th>
        <td>{{ $business->street }}</td>
    </tr>
    <tr>
        <th> CITY, STATE, ZIP CODE</th>
        <td>{{ $business->city }}, CA <br>{{ $business->zip }}</td>
    </tr>
    <tr>
        <th>PHONE NUMBER</th>
        <td>{{ $business->phone }}</td>
    </tr>
    <tr>
        <th>CONTACT NAME</th>
        <td>{{ $business->contact }}</td>
    </tr>
    </tbody>
</table>
