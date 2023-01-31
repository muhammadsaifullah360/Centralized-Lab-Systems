<div size="A4">
    <div class="invoice-container" id="html">
        <table style="width:100%; height:auto;  text-align:center; ">
            <thead style="background:#dc4c64; padding:8px;">
            <tr style="font-size: 18px; color: white">
                <td style="padding:10px; display: flex; justify-content: space-between">
                    <h2>{{ $appointment->lab->name }}</h2>
                    <h4>#{{ rand(11111,99999) }}</h4>
                </td>
            </tr>
            </thead>
            <tbody style=" padding:20px;margin-bottom: 10px;">
            <tr>
                <td colspan="4"
                    style="padding:20px 0px 0px 20px;text-align:left;font-size: 16px; font-weight: bold;color:#000;">
                    <p style="text-decoration: underline;color: #3b71ca">Patient,</p>
                    <h2>{{ $appointment->user->name }}</h2>
                    <p>{{ $appointment->address }}</p><br>
                    Abington MA 2351,
                    <p>Contact: {{ $appointment->phone}}</p>
                </td>
            </tr>
            </tbody>
        </table>
        <table
            style="width:100%; height:auto; background-color:#fff;text-align:center; padding:10px; background:#3b71ca">
            <tbody>
            <tr style="color:white; font-size: 20px;">
                <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;">
                    Tests
                </td>
                <td style="width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;">
                    Normal Value
                </td>
                <td style="width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;">
                    Resulted Value
                </td>
                <td style="width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;">
                    Price
                </td>
            </tr>
            </tbody>
        </table>
        <table
            style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
            <tbody>
            <tr>
                <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center">{{ $appointment->test }}</td>
                <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center"> {{ $appointment->report->normal_value }}</td>
                <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center">{{ $appointment->report->resulted_value }}</td>
                <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center">
                    <table style="width:100%;">
                        <tr>
                            <td style=" width:25%;font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center">{{ $appointment->price}}
                                pkr
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px;">
            <tbody>
            <td style=" font-size:17px;font-weight:700;padding: 0px 0px 10px 0px;text-align: center">
                <table style="width:100%;">
                    <tr>
                        <td style=" width:25%;font-size:17px;font-weight:700;padding-top: 13px;text-align: center">
                            Total {{ $appointment->price  }}
                            pkr
                        </td>
                    </tr>
                </table>
            </td>

            <tr>
                <td colspan="2" style="font-weight:bold;"><span
                        style="color:#c61932;font-weight: bold;">THANK YOU</span>
                </td>
            </tr>
            </tbody>
            <tfoot style="padding-top:20px;font-weight: bold;margin-bottom: 10px">
            <tr>
                <td style="padding-top:20px; font-size: 15px">Need help? Contact us <span
                        style="color:#c61932"><i class="fas fa-envelope"></i> {{ $appointment->lab->user->email }}/ <i
                            class="fas fa-mobile-alt"> </i> {{ $appointment->lab->contact }}</span>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


