<p>{!! $data['subject'] !!}</p>
<p>{!! $data['description'] !!}</p>
<p>{!! date('F j, Y', strtotime(date('Y-m-d', strtotime($data['date'])))) !!}</p>