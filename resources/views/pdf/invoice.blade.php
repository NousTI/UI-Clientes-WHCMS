<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #1B254B;
            margin: 0;
            padding: 0;
            font-size: 12px;
            line-height: 1.5;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
        }
        table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        table td {
            padding: 8px;
            vertical-align: top;
        }
        .header-table td {
            padding: 0;
        }
        .title {
            font-size: 24px;
            font-weight: 900;
            color: #4318FF;
            letter-spacing: -1px;
        }
        .subtitle {
            font-size: 9px;
            font-weight: bold;
            color: #A3AED0;
            letter-spacing: 1px;
            margin-top: 2px;
        }
        .invoice-details {
            text-align: right;
            font-size: 11px;
        }
        .invoice-details h2 {
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 800;
            color: #1B254B;
        }
        .invoice-details p {
            margin: 2px 0;
            color: #707EAE;
        }
        .divider {
            border-bottom: 2px solid #F4F7FE;
            margin: 25px 0;
        }
        .billing-info {
            margin-bottom: 30px;
        }
        .billing-title {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            color: #A3AED0;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .billing-name {
            font-size: 13px;
            font-weight: 800;
            color: #1B254B;
            margin: 0 0 4px 0;
        }
        .billing-detail {
            color: #707EAE;
            margin: 2px 0;
        }
        .items-table {
            margin-top: 20px;
        }
        .items-table th {
            background-color: #F4F7FE;
            color: #A3AED0;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 10px;
            text-align: left;
        }
        .items-table th.right, .items-table td.right {
            text-align: right;
        }
        .items-table td {
            padding: 15px 10px;
            border-bottom: 1px solid #F4F7FE;
            font-size: 11px;
        }
        .item-desc {
            font-weight: 700;
            color: #1B254B;
        }
        .item-sub {
            font-size: 10px;
            color: #A3AED0;
            margin-top: 2px;
        }
        .totals-table {
            width: 40%;
            margin-left: auto;
            margin-top: 30px;
        }
        .totals-table td {
            padding: 6px 10px;
        }
        .totals-label {
            color: #707EAE;
            font-weight: 600;
        }
        .totals-value {
            text-align: right;
            font-weight: 700;
            color: #1B254B;
        }
        .total-row td {
            border-top: 2px solid #F4F7FE;
            padding-top: 12px;
        }
        .total-row .totals-label {
            font-size: 13px;
            font-weight: 800;
            color: #1B254B;
        }
        .total-row .totals-value {
            font-size: 16px;
            font-weight: 900;
            color: #4318FF;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 15px;
        }
        .status-paid {
            background-color: #E8F7F0;
            color: #10B981;
        }
        .status-unpaid {
            background-color: #FFF8E6;
            color: #F59E0B;
        }
        .footer-note {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #A3AED0;
            border-top: 1px dashed #E0E5F2;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td>
                    <div class="title">NOUS</div>
                    <div class="subtitle">TECHNOLOGIES</div>
                </td>
                <td class="invoice-details">
                    <h2>FACTURA</h2>
                    <p><strong>Nº:</strong> {{ $invoice->invoice_number }}</p>
                    <p><strong>Fecha Emisión:</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
                    <p><strong>Fecha Vencimiento:</strong> {{ $invoice->due_at->format('d/m/Y') }}</p>
                    @if($invoice->status === 'paid' && $invoice->paid_at)
                        <p><strong>Fecha Pago:</strong> {{ $invoice->paid_at->format('d/m/Y') }}</p>
                        <div class="status-badge status-paid">PAGADA</div>
                    @else
                        <div class="status-badge status-unpaid">PENDIENTE</div>
                    @endif
                </td>
            </tr>
        </table>

        <div class="divider"></div>

        <!-- Billing Info -->
        <table class="header-table billing-info">
            <tr>
                <td style="width: 50%;">
                    <div class="billing-title">Emitido por</div>
                    <div class="billing-name">Nous Technologies S.A.</div>
                    <p class="billing-detail">RFC: NTE090824K92</p>
                    <p class="billing-detail">Av. de la Constitución 1205</p>
                    <p class="billing-detail">Monterrey, NL, México</p>
                    <p class="billing-detail">soporte@nous.tech</p>
                </td>
                <td style="width: 50%; padding-left: 40px;">
                    <div class="billing-title">Facturado a</div>
                    <div class="billing-name">{{ $user->name }}</div>
                    <p class="billing-detail">{{ $user->email }}</p>
                    @if($user->company)
                        <p class="billing-detail">{{ $user->company }}</p>
                    @endif
                </td>
            </tr>
        </table>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Descripción del Concepto</th>
                    <th class="right" style="width: 120px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="item-desc">{{ $invoice->description }}</div>
                        <div class="item-sub">Servicio activo en la plataforma Nous Cloud</div>
                    </td>
                    <td class="right" style="font-weight: 700;">
                        ${{ number_format($invoice->amount, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Totals -->
        <table class="totals-table">
            <tr>
                <td class="totals-label">Subtotal</td>
                <td class="totals-value">${{ number_format($invoice->amount, 2) }}</td>
            </tr>
            <tr>
                <td class="totals-label">Impuestos (0%)</td>
                <td class="totals-value">$0.00</td>
            </tr>
            <tr class="total-row">
                <td class="totals-label">Total</td>
                <td class="totals-value">${{ number_format($invoice->amount, 2) }} USD</td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer-note">
            <p>Gracias por tu preferencia y por confiar en nosotros.</p>
            <p>Esta es una factura digital emitida automáticamente. Si tienes preguntas o necesitas asistencia, por favor abre un ticket de soporte técnico desde tu área de cliente.</p>
        </div>
    </div>
</body>
</html>
