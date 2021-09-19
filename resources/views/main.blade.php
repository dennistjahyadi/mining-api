
<style>
    table, th, td {
      border:1px solid black;
    }
    </style>
@php
    function jsonToTable ($data)
    {
        $table = '
        <table class="json-table" width="50%">
        ';
        foreach ($data as $key => $value) {
            $table .= '
            <tr valign="top">
            ';
            if (is_object($value) || is_array($value)) {
                $table .= jsonToTable($value);
            } else {
                $table .= $value;
            }
            $table .= '
                </td>
            </tr>
            ';
        }
        $table .= '
        </table>
        ';
        return $table;
    }
    $data = json_decode($monitors)
@endphp
@foreach($monitors as $monitor)
    @php
        $data = json_decode($monitor["data"]);
        $diffInSeconds =  $monitor->updated_at->diffInSeconds(Carbon\Carbon::now());
        $status = $diffInSeconds<20? 'on': 'off'
    @endphp
    <table>
    <tr style="background: {{ $status=="off" ? 'red': 'green'}}" colspan="2">
      <th>{{$monitor["name"]}}</th>
      <th>status: {{$status}}</th>
    </tr>
    @php
        echo jsonToTable($data)
    @endphp 
  </table> 
  <br/><br/><br/>
@endforeach