<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Borrowing Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .filters {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        .filters p {
            margin: 3px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background-color: #4a5568;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:nth-child(even) {
            background-color: #f7fafc;
        }
        .status {
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            text-transform: uppercase;
        }
        .status-pending { background-color: #fef3c7; color: #92400e; }
        .status-approved { background-color: #dbeafe; color: #1e40af; }
        .status-rejected { background-color: #fee2e2; color: #991b1b; }
        .status-returned { background-color: #d1fae5; color: #065f46; }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
        .summary {
            margin: 15px 0;
            padding: 10px;
            background-color: #edf2f7;
            border-radius: 4px;
        }
        .summary table {
            margin-top: 0;
        }
        .summary td {
            border: none;
            padding: 4px 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>School Equipment Management</h1>
        <p>Borrowing Report</p>
        <p>Generated: {{ date('F d, Y H:i') }}</p>
    </div>

    @if(array_filter($filters))
    <div class="filters">
        <strong>Filters Applied:</strong>
        @if(!empty($filters['status']))
        <p>Status: {{ ucfirst($filters['status']) }}</p>
        @endif
        @if(!empty($filters['date_from']))
        <p>From Date: {{ date('M d, Y', strtotime($filters['date_from'])) }}</p>
        @endif
        @if(!empty($filters['date_to']))
        <p>To Date: {{ date('M d, Y', strtotime($filters['date_to'])) }}</p>
        @endif
    </div>
    @endif

    <div class="summary">
        <strong>Summary:</strong>
        <table>
            <tr>
                <td>Total Records:</td>
                <td><strong>{{ $borrowings->count() }}</strong></td>
            </tr>
            <tr>
                <td>Pending:</td>
                <td>{{ $borrowings->where('status', 'pending')->count() }}</td>
            </tr>
            <tr>
                <td>Approved:</td>
                <td>{{ $borrowings->where('status', 'approved')->count() }}</td>
            </tr>
            <tr>
                <td>Returned:</td>
                <td>{{ $borrowings->where('status', 'returned')->count() }}</td>
            </tr>
            <tr>
                <td>Rejected:</td>
                <td>{{ $borrowings->where('status', 'rejected')->count() }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Tool</th>
                <th>Borrower</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->date->format('M d, Y') }}</td>
                <td>{{ $borrowing->tool->name }}</td>
                <td>{{ $borrowing->user->name }}</td>
                <td>{{ date('H:i', strtotime($borrowing->start_time)) }} - {{ date('H:i', strtotime($borrowing->end_time)) }}</td>
                <td>
                    <span class="status status-{{ $borrowing->status }}">
                        {{ ucfirst($borrowing->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">No records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>This report was generated automatically by the School Equipment Management System.</p>
    </div>
</body>
</html>
