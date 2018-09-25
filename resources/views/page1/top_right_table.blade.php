<style>
    th {
        vertical-align: center;
        width: 30mm;
    }

    td {
        vertical-align: center;
        width: 60mm;
    }
</style>
<table class="table table-bordered" style="width: 100%">
    <tbody>
    <tr>
        <th> ACTUAL DATE AND TIME OF DEPARTURE</th>
        <td>@php
                date_default_timezone_set("America/Los_Angeles");
                    echo   date("m/d/Y h:i A")
            @endphp</td>
    </tr>
    <th> ESTIMATED DATE AND TIME OF ARRIVAL</th>
    <td>
    </td>
    </tr>
    </tbody>
</table>
