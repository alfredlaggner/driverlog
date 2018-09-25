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
<table class="table-sm table-bordered">
    <tbody>
    <tr>
        <th> ACTUAL DATE AND TIME OF DEPARTURE</th>
        <td><?php date("m/d/Y") ?> <?php date("h")?></td>
    </tr>
    <th> ESTIMATED DATE AND TIME OF ARRIVAL</th>
    <td>@php
            date("m/d/Y")." ".date("h:I")
        @endphp</td>
    </tr>
    </tbody>
</table>
