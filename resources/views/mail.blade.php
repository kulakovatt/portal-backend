<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
</head>
<body>
<table style="max-width: 600px; width: 100%; background-color:#a4f565; font: 18px Verdana;">
    <tr>
        <td colspan="2">
            <table style="width: 100%; background-color: #151515; color: #d7d7d7; padding: 10px 20px;">
                <tr>
                    <td width="80%">
                        <table width="100%" style="font-size: 26px; text-transform: uppercase;">
                            <tr>
                                <td style="font-size: 16px; font-weight: bold; color: #d7d7d7;">Получатель</td>
                            </tr>
                            <tr>
                                <td>{{ $lastname . ' ' . $firstname }}</td>
                            </tr>
                        </table>
                    </td>
                    <td width="10%">
                        <table width="100%">
                            <tr>
                                <td>
                                    <img src="{{ asset('images/logo.png') }}" alt="" width="100%" style="display: block;" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">
            <table style="text-transform: uppercase; padding: 10px 20px;">
                <tr>
                    <td style="font-weight: bold; font-size: 16px;">Тур на:</td>
                </tr>
                <tr>
                    <td style="font-size: 22px;">{{ $tour }}</td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table style="text-transform: uppercase; padding: 10px 20px;">
                <tr>
                    <td style="font-weight: bold; font-size: 16px;">Длительность полета</td>
                </tr>
                <tr>
                    <td style="font-size: 22px;">{{ $duration }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">
            <table style="text-transform: uppercase; padding: 10px 20px;">
                <tr>
                    <td style="font-weight: bold; font-size: 16px;">Дата отправления:</td>
                </tr>
                <tr>
                    <td style="font-size: 22px;">{{ $date_flight }}</td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table style="text-transform: uppercase; padding: 10px 20px;">
                <tr>
                    <td style="font-weight: bold; font-size: 16px;">Длительность пребывания:</td>
                </tr>
                <tr>
                    <td style="font-size: 22px;">{{ $residence }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="text-transform: uppercase; padding: 10px 20px; background-color:#efefef; color: #151515; width: 100%;">
                <tr>
                    <td style="font-weight: bold; font-size: 16px;">Стоимость:</td>
                </tr>
                <tr>
                    <td style="font-size: 28px;">$ {{ number_format($price, 0, '', ' ') }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
