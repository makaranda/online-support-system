<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pending Ticket List for the Date {{date('d-M-Y')}}</title>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0;
            color: #4a4a4d;
            font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        th,
        td {
            padding: 10px 15px;
            vertical-align: middle;
        }
        thead {
            background: #395870;
            background: linear-gradient(#49708f, #293f50);
            color: #fff;
            font-size: 12px;
            text-transform: uppercase;
        }
        th:first-child {
            border-top-left-radius: 5px;
            text-align: left;
        }
        th:last-child {
            border-top-right-radius: 5px;
        }
        tbody tr:nth-child(even) {
            background: #f0f0f2;
        }
        td {
            border-bottom: 1px solid #cecfd5;
            border-right: 1px solid #cecfd5;
        }
        td:first-child {
            border-left: 1px solid #cecfd5;
        }
        .book-title {
            color: #395870;
            display: block;
        }
        .text-offset {
            color: #7c7c80;
            font-size: 15px;
        }
        .item-stock,
        .item-qty {
            text-align: center;
        }
        .item-price {
            text-align: right;
        }
        .item-multiple {
            display: block;
        }
        tfoot {
            text-align: right;
        }
        tfoot tr:last-child {
            background: #395870;
            color: #f0f0f2;
            font-weight: bold;
        }
        tfoot tr:last-child td:first-child {
            border-bottom-left-radius: 0px;
        }
        tfoot tr:last-child td:last-child {
            border-bottom-right-radius: 0px;
        }

    </style>
</head>

<body>
<table>
    <thead>
        <tr>
            <th scope="col">Ticket No & Customer Name</th>
            <th scope="col">Date & Time</th>
            <th scope="col">Subject (Heading)</th>
            <th scope="col">Branch</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Priority</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pending_tickets as $pending_ticket)
            <tr style="background-color: {{$pending_ticket->color}}">
                <td class="col">
                    <strong class="book-title">{{$pending_ticket->no}}</strong>
                    <strong><span class="text-offset" >Customer : {{$pending_ticket->customer}}</span></strong>
                </td>
                <td class="col">{{$pending_ticket->date}}</td>
                <td class="col">{{$pending_ticket->subject}}</td>
                <td class="col">{{$pending_ticket->brnach_name}}</td>
                <td class="col">{{$pending_ticket->assigned_user}}</td>
                <td class="col">
                    @switch($pending_ticket->priority)
                        @case('Low')
                            <strong style="color:yellow;">{{$pending_ticket->priority}}</strong>
                        @break
                        @case('Normal')
                            <strong style="color:green;">{{$pending_ticket->priority}}</strong>
                        @break
                        @case('High')
                            <strong style="color:red;">{{$pending_ticket->priority}}</strong>
                        @break
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
    <tr style="background: #395870;background: linear-gradient(#49708f, #293f50);color: #fff;font-size: 12px;text-transform: uppercase;font-weight: bold;">
        <td class="col">Ticket No & Customer Name</td>
        <td class="col">Date & Time</td>
        <td class="col">Subject (Heading)</td>
        <td class="col">Branch</td>
        <td class="col">Assigned To</td>
        <td class="col">Priority</td>
    </tr>
</table>
</body>
</html>
