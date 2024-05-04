<!DOCTYPE html>
<html>
<head>
    <title>Subscription Success</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="{{ asset('frontend/img/logo.png')}}" alt="Know Your Inventory" width="100">
                <hr>
            </td>
            <td>
                <h1>Hi, {{ $data['user']->name }}!</h1>
                <p>Your subscription to "{{ $data['plan']->name }}" was successful.</p>
                <p>Plan Price: ${{ $data['plan']->price * 0.01 }}</p>
                <br>
                <br>
                <p>Thank You,</p>
                <p>Know Your Inventory</p>
                <!-- Include any additional information you want to show in the email -->
            </td>
        </tr>
    </table>
</body>
</html>
