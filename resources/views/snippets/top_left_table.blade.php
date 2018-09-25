<style>
    th {
        vertical-align: center;
        width: 30mm;
    }
</style>

<table class="table-sm table-bordered">
    <tbody>
    <tr>
        <th>INVOICE/MANIFEST #</th>
        <td>{{ $invoice->invoice_number }}</td>
    </tr>
    <tr>
        <th>ATTACHED PAGES</th>
        @if ($isAttachedPages)
        <td>Yes</td>
        @else
            <td>No</td>
        @endif
    </tr>
    </tbody>
</table>
