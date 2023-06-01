
<table class="table table-dark text-center">
    <thead>
        <tr>
            <td>ID</td>
            <td>Date</td>
            <td>Employee</td>
            <td>Patient</td>
            <td>Confirmed</td>
        </tr>
    </thead>
    <tbody>
        @if (is_array($array) && $array != null)
            @foreach ($array as $row)
                <tr>
                    @php
                        $i=0;
                    @endphp                    
                    @foreach ($row as $column)
                    <td>
                        @php
                        $column;
                        @endphp                                        
                    </td>
                    @php
                        if ($i == 0) {
                            $id=$column;
                        }
                        $i++;
                    @endphp
                    @endforeach
                    <td>
                        <form action="">
                            @csrf                    
                        <input type="hidden" name="id" value={{ $id }} />
                        <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr><td colspan="5"> -- No Data -- </td></tr>
        @endif
    </tbody>
</table>